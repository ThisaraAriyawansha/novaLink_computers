import tensorflow as tf
import numpy as np
import pickle
from flask import Flask, request, jsonify, send_from_directory
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

# ─────────────────────────────────────────────
# Load model and artifacts
# ─────────────────────────────────────────────
model = tf.keras.models.load_model('model/model.keras', compile=False)

with open('model/gb_models.pkl', 'rb') as f:
    gb_models = pickle.load(f)
with open('model/rf_models.pkl', 'rb') as f:
    rf_models = pickle.load(f)
with open('model/job_encoder.pkl', 'rb') as f:
    job_le = pickle.load(f)
with open('model/activity_encoder.pkl', 'rb') as f:
    activity_le = pickle.load(f)
with open('model/software_encoder.pkl', 'rb') as f:
    software_le = pickle.load(f)
with open('model/scaler.pkl', 'rb') as f:
    scaler = pickle.load(f)
with open('model/label_maps.pkl', 'rb') as f:
    label_maps = pickle.load(f)

# ─────────────────────────────────────────────
# Dropdown options returned to the frontend
# ─────────────────────────────────────────────
JOB_OPTIONS = [
    {'key': 'game_dev',     'label': 'Game Developer'},
    {'key': 'mobile_dev',   'label': 'Mobile App Developer'},
    {'key': 'data_ml',      'label': 'Data Scientist / AI / ML Engineer'},
    {'key': 'cad_3d',       'label': 'Architect / Civil / 3D Artist / CAD'},
    {'key': 'designer',     'label': 'Graphic Designer / UI-UX'},
    {'key': 'student',      'label': 'Student / Researcher'},
    {'key': 'office',       'label': 'Business / Finance / Office / Admin'},
    {'key': 'it_admin',     'label': 'IT Support / Network / Security / QA'},
    {'key': 'software_dev', 'label': 'Software Developer / DevOps / Backend / Frontend'},
    {'key': 'other',        'label': 'Other'},
]

ACTIVITY_OPTIONS = [
    {'key': 'heavy_graphics', 'label': 'Game Dev / 3D Rendering / CAD / Physics Simulation'},
    {'key': 'data_ml',        'label': 'Machine Learning / Data Analysis / AI Modeling'},
    {'key': 'media',          'label': 'Video Editing / Motion Graphics / VFX'},
    {'key': 'mobile_dev',     'label': 'Mobile App Development'},
    {'key': 'software_dev',   'label': 'Web / Backend / DevOps / Cloud Development'},
    {'key': 'qa',             'label': 'Testing / QA / Bug Reporting'},
    {'key': 'it_admin',       'label': 'Network / Security / Server Administration'},
    {'key': 'design',         'label': 'Graphic Design / UI Mockups / Branding'},
    {'key': 'office',         'label': 'Documents / Spreadsheets / Email / Office Work'},
    {'key': 'student',        'label': 'Assignments / Online Classes / Research'},
    {'key': 'general',        'label': 'General / Browsing / Light Tasks'},
]

WORKLOAD_OPTIONS = [
    {'key': 1, 'label': 'Very Light  (email, web browsing)'},
    {'key': 2, 'label': 'Light  (document editing, presentations)'},
    {'key': 3, 'label': 'Moderate  (programming, data analysis, photo editing)'},
    {'key': 4, 'label': 'Heavy  (video editing, 3D rendering, VMs)'},
    {'key': 5, 'label': 'Very Heavy  (ML training, scientific computing, simulations)'},
]

HOURS_OPTIONS = [
    {'key': 3,  'label': 'Less than 4 hours'},
    {'key': 5,  'label': '4 - 6 hours'},
    {'key': 7,  'label': '6 - 8 hours'},
    {'key': 10, 'label': '8+ hours'},
]

MULTIAPP_OPTIONS = [
    {'key': 1, 'label': 'Rarely  (1-2 apps)'},
    {'key': 2, 'label': 'Occasionally  (2-3 apps)'},
    {'key': 3, 'label': 'Moderately  (3-5 apps)'},
    {'key': 4, 'label': 'Frequently  (6+ apps)'},
]

BUDGET_OPTIONS = [
    {'key': 1, 'label': 'Under LKR 100,000'},
    {'key': 2, 'label': 'LKR 100,000 - 150,000'},
    {'key': 3, 'label': 'LKR 150,000 - 200,000'},
    {'key': 4, 'label': 'LKR 200,000 - 250,000'},
    {'key': 5, 'label': 'LKR 250,000 - 300,000'},
    {'key': 6, 'label': 'Above LKR 300,000'},
]

SOFTWARE_OPTIONS = [
    {'key': 'ml_heavy',    'label': 'Python / TensorFlow / PyTorch / CUDA  (ML & AI)'},
    {'key': 'game_dev',    'label': 'Unity / Unreal Engine / Blender / C++  (Game Dev)'},
    {'key': 'cad_3d',      'label': 'AutoCAD / Revit / 3ds Max / STAAD Pro  (CAD & 3D)'},
    {'key': 'media',       'label': 'Premiere Pro / After Effects / Photoshop  (Media)'},
    {'key': 'mobile_dev',  'label': 'Android Studio / Flutter / Xcode  (Mobile)'},
    {'key': 'dev_tools',   'label': 'VS Code / Docker / Git / IntelliJ  (Dev & DevOps)'},
    {'key': 'qa_tools',    'label': 'Selenium / JIRA / Postman / JMeter  (QA & Testing)'},
    {'key': 'it_tools',    'label': 'Wireshark / VMware / Active Directory  (IT & Security)'},
    {'key': 'office_tools','label': 'Microsoft Office / Excel / Teams / Zoom  (Office)'},
    {'key': 'general',     'label': 'General / Mixed / Other'},
]

FILE_SIZE_OPTIONS = [
    {'key': 1, 'label': 'Small  (under 10 MB  —  documents, code, emails)'},
    {'key': 2, 'label': 'Medium  (10 MB – 100 MB  —  images, light projects)'},
    {'key': 3, 'label': 'Large  (100 MB – 1 GB  —  videos, datasets, CAD files)'},
    {'key': 4, 'label': 'Very Large  (1 GB+  —  ML datasets, 4K video, simulations)'},
]

# ─────────────────────────────────────────────
# Component name lookup tables
# ─────────────────────────────────────────────
CPU_NAMES = {
    0: {  # Entry-level
        1: 'Intel Core i3-12100 / AMD Ryzen 3 5300G',
        2: 'Intel Core i3-12100 / AMD Ryzen 3 5300G',
        3: 'Intel Core i5-1235U / AMD Ryzen 5 5500U',
        4: 'Intel Core i5-13420H / AMD Ryzen 5 7530U',
        5: 'Intel Core i5-13420H / AMD Ryzen 5 7530U',
        6: 'Intel Core i5-13500H / AMD Ryzen 5 7600',
    },
    1: {  # Mid-range
        1: 'Intel Core i5-12400 / AMD Ryzen 5 5600',
        2: 'Intel Core i5-12400 / AMD Ryzen 5 5600',
        3: 'Intel Core i5-13500H / AMD Ryzen 5 7600',
        4: 'Intel Core i5-13500H / AMD Ryzen 5 7600',
        5: 'Intel Core i7-12700H / AMD Ryzen 7 7745HX',
        6: 'Intel Core i7-13700H / AMD Ryzen 7 7800H',
    },
    2: {  # High-end / Enthusiast (merged)
        1: 'Intel Core i7-12700 / AMD Ryzen 7 5700X',
        2: 'Intel Core i7-12700 / AMD Ryzen 7 5700X',
        3: 'Intel Core i9-13900H / AMD Ryzen 9 7945HX',
        4: 'Intel Core i9-13900HX / AMD Ryzen 9 7945HX',
        5: 'Intel Core i9-14900HX / AMD Ryzen 9 7945HX',
        6: 'Intel Xeon W / AMD Threadripper PRO',
    },
}

RAM_NAMES = {
    0: '8GB DDR4 3200MHz',
    1: '16GB DDR4/DDR5',
    2: '32GB+ DDR4/DDR5',
}

STORAGE_TYPE_NAMES = {
    0: 'HDD  (7200RPM)',
    1: 'eMMC 5.1',
    2: 'SSD',   # sub-type (SATA vs NVMe) determined by budget in predict route
}

STORAGE_SIZE_NAMES = {
    0: '512GB or less',
    1: '1TB – 2TB',
    2: '4TB or more',
}

GPU_NAMES = {
    0: {  # Integrated
        1: 'Intel UHD Graphics / AMD Radeon Integrated',
        2: 'Intel UHD Graphics / AMD Radeon Integrated',
        3: 'Intel Iris Xe / AMD Radeon 780M',
        4: 'Intel Iris Xe / AMD Radeon 780M',
        5: 'Intel Iris Xe / AMD Radeon 780M',
        6: 'Intel Iris Xe / AMD Radeon 780M',
    },
    1: {  # Discrete GPU  (Entry → Mid range, budget-scaled)
        1: 'NVIDIA GeForce GTX 1650 4GB / AMD RX 6500 XT 4GB',
        2: 'NVIDIA GeForce RTX 3050 6GB / AMD RX 6600 8GB',
        3: 'NVIDIA GeForce RTX 3060 12GB / AMD RX 6700 XT 12GB',
        4: 'NVIDIA GeForce RTX 4060 8GB / AMD RX 7700 XT 12GB',
        5: 'NVIDIA GeForce RTX 4060 Ti 16GB / AMD RX 7800 XT 16GB',
        6: 'NVIDIA GeForce RTX 4060 Ti 16GB / AMD RX 7800 XT 16GB',
    },
    2: {  # High-end GPU
        1: 'NVIDIA GeForce RTX 3080 10GB / AMD RX 6800 XT 16GB',
        2: 'NVIDIA GeForce RTX 3080 10GB / AMD RX 6800 XT 16GB',
        3: 'NVIDIA GeForce RTX 4070 12GB / AMD RX 7900 GRE 16GB',
        4: 'NVIDIA GeForce RTX 4070 Ti Super 16GB / AMD RX 7900 XTX 24GB',
        5: 'NVIDIA GeForce RTX 4080 16GB / AMD RX 7900 XTX 24GB',
        6: 'NVIDIA GeForce RTX 4090 24GB / AMD Radeon Pro W7900',
    },
}

# ─────────────────────────────────────────────
# Helper: encode a string key safely
# ─────────────────────────────────────────────
def safe_encode(encoder, value, fallback):
    if value in encoder.classes_:
        return int(encoder.transform([value])[0])
    return int(encoder.transform([fallback])[0])

# ─────────────────────────────────────────────
# Routes
# ─────────────────────────────────────────────
@app.route('/')
def index():
    return send_from_directory('.', 'index.html')

@app.route('/questions', methods=['GET'])
def get_questions():
    """Returns all dropdown options for the frontend form."""
    return jsonify({
        'job':       JOB_OPTIONS,
        'activity':  ACTIVITY_OPTIONS,
        'workload':  WORKLOAD_OPTIONS,
        'hours':     HOURS_OPTIONS,
        'multiApp':  MULTIAPP_OPTIONS,
        'budget':    BUDGET_OPTIONS,
        'software':  SOFTWARE_OPTIONS,
        'fileSize':  FILE_SIZE_OPTIONS,
    })

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()

    try:
        job      = str(data.get('job', 'other'))
        activity = str(data.get('activity', 'general'))
        software = str(data.get('software', 'general'))
        workload = int(data.get('workload', 3))
        hours    = int(data.get('hours', 5))
        multi    = int(data.get('multiApp', 2))
        budget   = int(data.get('budget', 3))
        filesize = int(data.get('fileSize', 1))

        job_enc      = safe_encode(job_le,      job,      'other')
        activity_enc = safe_encode(activity_le, activity, 'general')
        software_enc = safe_encode(software_le, software, 'general')

        # Interaction features — must match model.py feature order exactly
        workload_x_budget   = workload      * budget
        activity_x_software = activity_enc  * software_enc
        filesize_x_workload = filesize       * workload
        hours_x_multiapp    = hours          * multi
        workload_x_hours    = workload       * hours
        budget_x_filesize   = budget         * filesize
        ram_demand          = workload * 2 + multi * 1.5 + budget * 0.5 + hours * 0.3
        job_x_activity      = job_enc        * activity_enc
        ram_intensity       = workload       * filesize * multi

        raw = np.array([[job_enc, activity_enc, software_enc,
                         workload, hours, multi, budget, filesize,
                         workload_x_budget, activity_x_software,
                         filesize_x_workload, hours_x_multiapp,
                         workload_x_hours, budget_x_filesize,
                         ram_demand, job_x_activity, ram_intensity]])
        X   = scaler.transform(raw)

        # Neural network probabilities
        nn_preds = model.predict(X, verbose=0)
        nn_p_cpu, nn_p_ram, nn_p_stype, nn_p_ssize, nn_p_gpu = nn_preds

        # Gradient Boosting probabilities
        gb_p_cpu   = gb_models['cpu'].predict_proba(X)
        gb_p_ram   = gb_models['ram'].predict_proba(X)
        gb_p_stype = gb_models['storage_type'].predict_proba(X)
        gb_p_ssize = gb_models['storage_size'].predict_proba(X)
        gb_p_gpu   = gb_models['gpu'].predict_proba(X)

        # Random Forest probabilities
        rf_p_cpu   = rf_models['cpu'].predict_proba(X)
        rf_p_ram   = rf_models['ram'].predict_proba(X)
        rf_p_stype = rf_models['storage_type'].predict_proba(X)
        rf_p_ssize = rf_models['storage_size'].predict_proba(X)
        rf_p_gpu   = rf_models['gpu'].predict_proba(X)

        # 3-way ensemble: average probabilities from NN + GB + RF
        # RAM: GB and RF are stronger; use only those two to avoid NN dragging accuracy down
        p_cpu   = (nn_p_cpu   + gb_p_cpu   + rf_p_cpu)   / 3.0
        p_ram   = (gb_p_ram   + rf_p_ram)                / 2.0
        p_stype = (nn_p_stype + gb_p_stype + rf_p_stype) / 3.0
        p_ssize = (nn_p_ssize + gb_p_ssize + rf_p_ssize) / 3.0
        p_gpu   = (nn_p_gpu   + gb_p_gpu   + rf_p_gpu)   / 3.0

        cpu_idx   = int(np.argmax(p_cpu[0]))
        ram_idx   = int(np.argmax(p_ram[0]))
        stype_idx = int(np.argmax(p_stype[0]))
        ssize_idx = int(np.argmax(p_ssize[0]))
        gpu_idx   = int(np.argmax(p_gpu[0]))

        def conf(proba):
            return round(float(np.max(proba)) * 100, 1)

        # Refine SSD recommendation using budget (SATA vs NVMe)
        stype_label = label_maps['storage_type'][stype_idx]
        if stype_idx == 2:   # SSD
            stype_rec = ('NVMe PCIe 4.0 SSD  (up to 7000 MB/s)'
                         if budget >= 4 else
                         'SATA SSD  (up to 560 MB/s)')
        else:
            stype_rec = STORAGE_TYPE_NAMES[stype_idx]

        return jsonify({
            'cpu': {
                'tier':           label_maps['cpu'][cpu_idx],
                'recommendation': CPU_NAMES[cpu_idx][budget],
                'confidence':     conf(p_cpu[0]),
            },
            'ram': {
                'amount':         label_maps['ram'][ram_idx],
                'recommendation': RAM_NAMES[ram_idx],
                'confidence':     conf(p_ram[0]),
            },
            'storage_type': {
                'type':           stype_label,
                'recommendation': stype_rec,
                'confidence':     conf(p_stype[0]),
            },
            'storage_size': {
                'size':           label_maps['storage_size'][ssize_idx],
                'recommendation': STORAGE_SIZE_NAMES[ssize_idx],
                'confidence':     conf(p_ssize[0]),
            },
            'gpu': {
                'tier':           label_maps['gpu'][gpu_idx],
                'recommendation': GPU_NAMES[gpu_idx][budget],
                'confidence':     conf(p_gpu[0]),
            },
        })

    except Exception as e:
        return jsonify({'error': str(e)}), 400

# ─────────────────────────────────────────────
if __name__ == '__main__':
    print("PC Recommender V3 running at http://localhost:5000")
    app.run(debug=True, host='0.0.0.0', port=5000)
