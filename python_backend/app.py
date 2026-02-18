from flask import Flask, request, jsonify, send_from_directory
from flask_cors import CORS
import pickle
import numpy as np
import os

app = Flask(__name__)
CORS(app)

# ─── Load model and encoder ───────────────────────────────────────────────────
with open('model/model.pkl', 'rb') as f:
    model = pickle.load(f)

with open('model/encoder.pkl', 'rb') as f:
    le = pickle.load(f)

# ─── Job category mapping ─────────────────────────────────────────────────────
JOB_CATEGORIES = {
    'developer':    'developer',
    'data_analyst': 'data_analyst',
    'designer':     'designer',
    'media':        'media',
    'student':      'student',
    'office':       'office',
    'it_admin':     'it_admin',
    'other':        'other'
}

# ─── Serve the frontend ───────────────────────────────────────────────────────
@app.route('/')
def index():
    return send_from_directory('.', 'index.html')

# ─── Prediction endpoint ──────────────────────────────────────────────────────
@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()

    try:
        job_cat   = data.get('job', 'other')
        workload  = float(data.get('workload', 3))
        ram       = float(data.get('ram', 8))
        budget    = float(data.get('budget', 150000))
        gpu       = float(data.get('gpu', 0))
        multi_app = float(data.get('multiApp', 1))
        hours     = float(data.get('hours', 5))
        cpu_tier  = float(data.get('cpuTier', 2))
        storage   = float(data.get('storage', 1))

        # Encode job category
        if job_cat in le.classes_:
            job_encoded = le.transform([job_cat])[0]
        else:
            job_encoded = le.transform(['other'])[0]

        # Build feature array
        features = np.array([[
            job_encoded, workload, ram, budget,
            gpu, cpu_tier, storage, hours, multi_app
        ]])

        # Predict
        tier = int(model.predict(features)[0])
        proba = model.predict_proba(features)[0]
        confidence = round(float(max(proba)) * 100, 1)

        tier_names = {
            0: 'Budget Build',
            1: 'Mid-Range Build',
            2: 'High-End Build',
            3: 'Workstation'
        }

        return jsonify({
            'tier': tier,
            'tierName': tier_names[tier],
            'confidence': confidence,
            'probabilities': {
                'budget':      round(float(proba[0]) * 100, 1),
                'midRange':    round(float(proba[1]) * 100, 1),
                'highEnd':     round(float(proba[2]) * 100, 1),
                'workstation': round(float(proba[3]) * 100, 1)
            }
        })

    except Exception as e:
        return jsonify({'error': str(e)}), 400


# ─── Run server ───────────────────────────────────────────────────────────────
if __name__ == '__main__':
    print("🚀 PC Recommender running at http://localhost:5000")
    app.run(debug=True, host='0.0.0.0', port=5000)