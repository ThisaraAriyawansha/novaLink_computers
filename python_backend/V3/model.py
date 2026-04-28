import tensorflow as tf
import pandas as pd
import numpy as np
import pickle
from sklearn.preprocessing import LabelEncoder, StandardScaler
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score, classification_report
from sklearn.utils.class_weight import compute_class_weight
from sklearn.ensemble import HistGradientBoostingClassifier, RandomForestClassifier
from sklearn.utils.class_weight import compute_sample_weight

# ─────────────────────────────────────────────
# STEP 1: Load Data
# ─────────────────────────────────────────────
df = pd.read_csv('data/responses.csv', on_bad_lines='skip')
df = df[df.iloc[:, 1] != 'What is your primary job role/category?']
df = df.dropna(subset=[df.columns[1]])
print(f"Loaded {len(df)} clean responses")

# ─────────────────────────────────────────────
# STEP 2: Feature Engineering
# ─────────────────────────────────────────────

def categorize_job(j):
    j = str(j).lower()
    if any(x in j for x in ['game developer', 'game dev']): return 'game_dev'
    if any(x in j for x in ['mobile app', 'mobile developer']): return 'mobile_dev'
    if any(x in j for x in ['data scientist', 'data analyst', 'machine learning', 'ai engineer', 'ml engineer']): return 'data_ml'
    if any(x in j for x in ['architect', 'civil', '3d', 'animator', 'cad']): return 'cad_3d'
    if any(x in j for x in ['graphic', 'designer', 'ui', 'ux', 'video editor', 'creative']): return 'designer'
    if any(x in j for x in ['student', 'undergraduate', 'msc', 'research']): return 'student'
    if any(x in j for x in ['manager', 'accountant', 'finance', 'business', 'marketing', 'hr', 'customer', 'admin']): return 'office'
    if any(x in j for x in ['network', 'cyber', 'security', 'sysadmin', 'it support', 'helpdesk', 'qa', 'test']): return 'it_admin'
    if any(x in j for x in ['developer', 'engineer', 'programmer', 'software', 'devops', 'full stack', 'backend', 'frontend']): return 'software_dev'
    return 'other'

def categorize_activity(a):
    a = str(a).lower()
    if any(x in a for x in ['shader', 'physics simulation', 'game dev', 'level design', '3d animation', 'vfx', 'cad', 'bim', 'structural', 'engineering simulation']): return 'heavy_graphics'
    if any(x in a for x in ['machine learning', 'model training', 'deep learning', 'data analysis', 'statistical', 'predictive', 'nlp', 'computer vision', 'hpc', 'data pipeline', 'data warehouse']): return 'data_ml'
    if any(x in a for x in ['video editing', 'color grading', 'motion graphics', 'rendering', '3d model', 'animation']): return 'media'
    if any(x in a for x in ['mobile app', 'cross-platform', 'flutter', 'android', 'ios']): return 'mobile_dev'
    if any(x in a for x in ['backend', 'frontend', 'full-stack', 'api', 'web develop', 'ci/cd', 'cloud', 'infrastructure', 'devops', 'containerization', 'server management']): return 'software_dev'
    if any(x in a for x in ['test', 'qa', 'bug report', 'regression']): return 'qa'
    if any(x in a for x in ['network', 'firewall', 'vpn', 'siem', 'penetration', 'security audit']): return 'it_admin'
    if any(x in a for x in ['graphic design', 'ui mockup', 'branding', 'logo', 'wireframe', 'prototyping']): return 'design'
    if any(x in a for x in ['document', 'spreadsheet', 'scheduling', 'invoice', 'accounting', 'payroll', 'crm', 'email']): return 'office'
    if any(x in a for x in ['assignment', 'coursework', 'online learning', 'thesis', 'online classes', 'homework', 'research']): return 'student'
    return 'general'

def categorize_software(s):
    s = str(s).lower()
    if any(x in s for x in ['tensorflow', 'pytorch', 'cuda', 'keras', 'scikit', 'jupyter']): return 'ml_heavy'
    if any(x in s for x in ['unity', 'unreal', 'blender', 'maya', 'substance', 'perforce', 'c#', 'c++']): return 'game_dev'
    if any(x in s for x in ['autocad', 'revit', 'sketchup', 'lumion', '3ds max', 'staad', 'etabs', 'archicad', 'rhino']): return 'cad_3d'
    if any(x in s for x in ['premiere', 'after effects', 'photoshop', 'illustrator', 'davinci', 'final cut', 'lightroom']): return 'media'
    if any(x in s for x in ['android studio', 'flutter', 'xcode', 'react native', 'expo', 'firebase']): return 'mobile_dev'
    if any(x in s for x in ['selenium', 'jira', 'testrail', 'cypress', 'robot framework', 'jmeter', 'testng']): return 'qa_tools'
    if any(x in s for x in ['wireshark', 'kali', 'splunk', 'vmware', 'cisco', 'active directory', 'teamviewer']): return 'it_tools'
    if any(x in s for x in ['docker', 'git', 'intellij', 'vs code', 'postman', 'kubernetes', 'jenkins']): return 'dev_tools'
    if any(x in s for x in ['office', 'excel', 'outlook', 'teams', 'quickbooks', 'zoom', 'google meet']): return 'office_tools'
    return 'general'

def normalize_file_size(s):
    s = str(s).lower()
    if 'very large' in s or '1 gb+' in s or 'over 1 gb' in s or '>1 gb' in s: return 4
    if 'large' in s or '100 mb' in s: return 3
    if 'medium' in s or '10 mb' in s: return 2
    return 1

def normalize_workload(w):
    w = str(w).lower()
    if '5' in w or 'very heavy' in w: return 5
    if '4' in w or ('heavy' in w and 'very' not in w): return 4
    if '3' in w or 'moderate' in w: return 3
    if '2' in w or ('light' in w and 'very' not in w): return 2
    return 1

def normalize_hours(h):
    h = str(h).lower()
    if '10+' in h or '8-10' in h: return 10
    if '7-9' in h or '6-8' in h: return 7
    if '5-7' in h or '4-6' in h: return 5
    if '2-4' in h: return 3
    return 5

def normalize_multiapp(m):
    m = str(m).lower()
    if 'frequently' in m or '6-10' in m: return 4
    if 'moderately' in m or '3-5' in m: return 3
    if 'occasionally' in m or '2-3' in m: return 2
    return 1

def normalize_budget(b):
    b = str(b).lower()
    if 'above' in b: return 6
    if '280' in b and '350' in b: return 5
    if '250' in b and '300' in b: return 5
    if '180' in b and '250' in b: return 4
    if '200' in b and ('250' in b or '280' in b): return 4
    if '150' in b and '200' in b: return 3
    if '100' in b and '150' in b: return 2
    if 'under' in b: return 1
    return 3

# ─────────────────────────────────────────────
# STEP 3: Target Engineering
#
# MERGED CLASSES for better accuracy:
#   CPU:          4 -> 3  (Entry / Mid / High+Enthusiast)
#   RAM:          4 -> 3  (8GB- / 16-32GB / 64GB+)
#   Storage Size: 4 -> 3  (512GB- / 1-2TB / 4TB+)
#   Storage Type: 4       (HDD / eMMC / SATA / NVMe)  unchanged
#   GPU:          4       (Integrated / Entry / Mid / High)  unchanged
# ─────────────────────────────────────────────

def encode_cpu(c):
    c = str(c).lower()
    if 'enthusiast' in c or 'workstation' in c: return 2   # merged with High-end
    if 'high' in c: return 2
    if 'mid' in c: return 1
    if 'entry' in c: return 0
    return -1

def encode_ram(r):
    r = str(r)
    if '128' in r: return 2   # 32GB+ (32 merged with 64/128)
    if '64' in r:  return 2
    if '32' in r:  return 2
    if '16' in r:  return 1   # 16GB sits alone — cleaner boundary
    if '8' in r:   return 0
    if '4' in r:   return 0
    return -1

def encode_storage_type(s):
    # Merge SATA SSD + NVMe SSD into one "SSD" class.
    # SATA vs NVMe is distinguished by budget in app.py, not the ML model.
    s = str(s).lower()
    if 'nvme' in s: return 2
    if 'sata' in s: return 2
    if 'ssd'  in s: return 2
    if 'emmc' in s: return 1
    if 'hdd'  in s or 'hard disk' in s or 'mechanical' in s: return 0
    return -1

def encode_storage_size(s):
    s = str(s).lower()
    if '4 tb' in s or '4tb' in s: return 2
    if '2 tb' in s or '2tb' in s: return 1   # merged 1 + 2 TB
    if '1 tb' in s or '1tb' in s: return 1
    if '500' in s or '512' in s:  return 0   # merged 512 + 256
    if '256' in s: return 0
    if '128' in s: return 0
    if '64' in s or '32' in s: return 0
    return -1

def encode_gpu(g):
    # Merge Entry-level + Mid-range → "Discrete GPU" (class 1)
    g = str(g).lower()
    if 'high' in g: return 2
    if 'mid'  in g: return 1
    if 'entry' in g: return 1
    if 'integrated' in g: return 0
    return -1

# ─────────────────────────────────────────────
# STEP 4: Apply to DataFrame
# ─────────────────────────────────────────────
df['job_cat']      = df.iloc[:, 1].apply(categorize_job)
df['activity_cat'] = df.iloc[:, 25].apply(categorize_activity)
df['software_cat'] = df.iloc[:, 22].apply(categorize_software)
df['workload']     = df.iloc[:, 28].apply(normalize_workload)
df['hours']        = df.iloc[:, 26].apply(normalize_hours)
df['multi_app']    = df.iloc[:, 27].apply(normalize_multiapp)
df['budget']       = df.iloc[:, 24].apply(normalize_budget)
df['file_size']    = df.iloc[:, 23].apply(normalize_file_size)

df['y_cpu']          = df.iloc[:, 10].apply(encode_cpu)
df['y_ram']          = df.iloc[:, 8].apply(encode_ram)
df['y_storage_type'] = df.iloc[:, 14].apply(encode_storage_type)
df['y_storage_size'] = df.iloc[:, 15].apply(encode_storage_size)
df['y_gpu']          = df.iloc[:, 16].apply(encode_gpu)

before = len(df)
df = df[
    (df['y_cpu'] >= 0) &
    (df['y_ram'] >= 0) &
    (df['y_storage_type'] >= 0) &
    (df['y_storage_size'] >= 0) &
    (df['y_gpu'] >= 0)
]
print(f"Dropped {before - len(df)} dirty rows -> {len(df)} usable rows")

job_le      = LabelEncoder()
activity_le = LabelEncoder()
software_le = LabelEncoder()
df['job_encoded']      = job_le.fit_transform(df['job_cat'])
df['activity_encoded'] = activity_le.fit_transform(df['activity_cat'])
df['software_encoded'] = software_le.fit_transform(df['software_cat'])

# ─────────────────────────────────────────────
# Interaction features
# ─────────────────────────────────────────────
df['workload_x_budget']   = df['workload']         * df['budget']
df['activity_x_software'] = df['activity_encoded'] * df['software_encoded']
df['filesize_x_workload'] = df['file_size']         * df['workload']
df['hours_x_multiapp']    = df['hours']             * df['multi_app']
df['workload_x_hours']    = df['workload']          * df['hours']
df['budget_x_filesize']   = df['budget']            * df['file_size']
df['ram_demand']          = (df['workload'] * 2 + df['multi_app'] * 1.5
                              + df['budget'] * 0.5 + df['hours'] * 0.3)
df['job_x_activity']      = df['job_encoded']       * df['activity_encoded']
df['ram_intensity']       = df['workload'] * df['file_size'] * df['multi_app']

cpu_labels   = {0: 'Entry-level', 1: 'Mid-range', 2: 'High-end / Enthusiast'}
ram_labels   = {0: '8GB or less', 1: '16GB',      2: '32GB or more'}
stype_labels = {0: 'HDD', 1: 'eMMC', 2: 'SSD'}
ssize_labels = {0: '512GB or less', 1: '1TB - 2TB', 2: '4TB or more'}
gpu_labels   = {0: 'Integrated', 1: 'Discrete GPU', 2: 'High-end GPU'}

print("\n--- Target Distributions (merged classes) ---")
for col, lbl in [('y_cpu', cpu_labels), ('y_ram', ram_labels),
                  ('y_storage_type', stype_labels), ('y_storage_size', ssize_labels),
                  ('y_gpu', gpu_labels)]:
    print(f"\n{col}:")
    print(df[col].value_counts().rename(lbl))

# ─────────────────────────────────────────────
# STEP 5: Prepare Data  (14 features)
# ─────────────────────────────────────────────
features = [
    'job_encoded', 'activity_encoded', 'software_encoded',
    'workload', 'hours', 'multi_app', 'budget', 'file_size',
    'workload_x_budget', 'activity_x_software',
    'filesize_x_workload', 'hours_x_multiapp',
    'workload_x_hours', 'budget_x_filesize',
    'ram_demand', 'job_x_activity', 'ram_intensity',
]

X       = df[features].values
y_cpu   = df['y_cpu'].values.astype(int)
y_ram   = df['y_ram'].values.astype(int)
y_stype = df['y_storage_type'].values.astype(int)
y_ssize = df['y_storage_size'].values.astype(int)
y_gpu   = df['y_gpu'].values.astype(int)

(X_train, X_test,
 yc_train, yc_test,
 yr_train, yr_test,
 yst_train, yst_test,
 yss_train, yss_test,
 yg_train, yg_test) = train_test_split(
    X, y_cpu, y_ram, y_stype, y_ssize, y_gpu,
    test_size=0.2, random_state=42
)

scaler  = StandardScaler()
X_train = scaler.fit_transform(X_train)
X_test  = scaler.transform(X_test)

# ─────────────────────────────────────────────
# Class weights via custom losses
# ─────────────────────────────────────────────
def get_class_weights(y):
    classes = np.unique(y)
    w = compute_class_weight('balanced', classes=classes, y=y)
    return dict(zip(classes, w))

cw_cpu   = get_class_weights(yc_train)
cw_ram   = get_class_weights(yr_train)
cw_stype = get_class_weights(yst_train)
cw_ssize = get_class_weights(yss_train)
cw_gpu   = get_class_weights(yg_train)

def make_weighted_loss(cw):
    w = tf.constant([cw.get(i, 1.0) for i in range(max(cw) + 1)], dtype=tf.float32)
    def loss(y_true, y_pred):
        y_int = tf.cast(tf.reshape(y_true, [-1]), tf.int32)
        per_sample = tf.keras.losses.sparse_categorical_crossentropy(y_int, y_pred)
        return tf.reduce_mean(per_sample * tf.gather(w, y_int))
    return loss

wloss_cpu   = make_weighted_loss(cw_cpu)
wloss_ram   = make_weighted_loss(cw_ram)
wloss_stype = make_weighted_loss(cw_stype)
wloss_ssize = make_weighted_loss(cw_ssize)
wloss_gpu   = make_weighted_loss(cw_gpu)

print("\nClass weights computed.")

# ─────────────────────────────────────────────
# STEP 6: Neural Network — shared backbone + task branches
# All 5 heads: Dense(3)  (merged classes)
# ─────────────────────────────────────────────
inputs = tf.keras.Input(shape=(len(features),))

x = tf.keras.layers.Dense(512, activation='relu')(inputs)
x = tf.keras.layers.BatchNormalization()(x)
x = tf.keras.layers.Dropout(0.3)(x)
x = tf.keras.layers.Dense(256, activation='relu')(x)
x = tf.keras.layers.BatchNormalization()(x)
x = tf.keras.layers.Dropout(0.25)(x)
shared = tf.keras.layers.Dense(128, activation='relu')(x)
shared = tf.keras.layers.BatchNormalization()(shared)
shared = tf.keras.layers.Dropout(0.2)(shared)

def task_branch(inp, name, n_out):
    h = tf.keras.layers.Dense(64, activation='relu')(inp)
    h = tf.keras.layers.Dense(32, activation='relu')(h)
    return tf.keras.layers.Dense(n_out, activation='softmax', name=name)(h)

def wide_branch(inp, name, n_out):
    h = tf.keras.layers.Dense(128, activation='relu')(inp)
    h = tf.keras.layers.BatchNormalization()(h)
    h = tf.keras.layers.Dropout(0.2)(h)
    h = tf.keras.layers.Dense(64, activation='relu')(h)
    h = tf.keras.layers.Dense(32, activation='relu')(h)
    return tf.keras.layers.Dense(n_out, activation='softmax', name=name)(h)

cpu_out   = task_branch(shared, 'cpu',          3)
ram_out   = wide_branch(shared, 'ram',          3)   # RAM gets more capacity
stype_out = task_branch(shared, 'storage_type', 3)
ssize_out = task_branch(shared, 'storage_size', 3)
gpu_out   = task_branch(shared, 'gpu',          3)

model = tf.keras.Model(inputs=inputs,
                        outputs=[cpu_out, ram_out, stype_out, ssize_out, gpu_out])

model.compile(
    optimizer=tf.keras.optimizers.Adam(learning_rate=0.001),
    loss={
        'cpu':          wloss_cpu,
        'ram':          wloss_ram,
        'storage_type': wloss_stype,
        'storage_size': wloss_ssize,
        'gpu':          wloss_gpu,
    },
    loss_weights={'cpu': 1.2, 'ram': 2.0, 'storage_type': 1.0,
                  'storage_size': 1.0, 'gpu': 1.0},
    metrics={
        'cpu': 'accuracy', 'ram': 'accuracy',
        'storage_type': 'accuracy', 'storage_size': 'accuracy', 'gpu': 'accuracy',
    }
)

model.summary()

# ─────────────────────────────────────────────
# STEP 7: Train Neural Network
# ─────────────────────────────────────────────
callbacks = [
    tf.keras.callbacks.EarlyStopping(
        monitor='val_loss', patience=25, restore_best_weights=True
    ),
    tf.keras.callbacks.ReduceLROnPlateau(
        monitor='val_loss', factor=0.5, patience=10, min_lr=1e-6, verbose=0
    ),
]

model.fit(
    X_train,
    {'cpu': yc_train, 'ram': yr_train,
     'storage_type': yst_train, 'storage_size': yss_train, 'gpu': yg_train},
    epochs=300,
    batch_size=32,
    validation_split=0.15,
    callbacks=callbacks,
    verbose=1
)

# ─────────────────────────────────────────────
# STEP 8: Train HistGradientBoosting + RandomForest per output
# ─────────────────────────────────────────────
print("\nBuilding custom sample weights...")

def custom_sw(y, boosts):
    # Start from balanced weights, then multiply per-class boost factor
    base = compute_sample_weight('balanced', y)
    return base * np.array([boosts[c] for c in y])

# RAM: reduce 16GB weight below balanced to fix its over-prediction (low precision)
sw_ram = custom_sw(yr_train, {0: 1.2, 1: 0.6, 2: 0.9})

# GPU: merged to 3 classes (Integrated / Discrete / High-end); use balanced weights
sw_gpu = compute_sample_weight('balanced', yg_train)

# Others: standard balanced
sw_cpu   = compute_sample_weight('balanced', yc_train)
sw_stype = compute_sample_weight('balanced', yst_train)
sw_ssize = compute_sample_weight('balanced', yss_train)

print("Training Gradient Boosting classifiers...")
hgb_base = dict(max_iter=1000, max_depth=8, learning_rate=0.02,
                min_samples_leaf=8, random_state=42)
hgb_ram  = dict(max_iter=2000, max_depth=10, learning_rate=0.01,
                min_samples_leaf=5, random_state=42)

clf_hgb_cpu   = HistGradientBoostingClassifier(**hgb_base)
clf_hgb_ram   = HistGradientBoostingClassifier(**hgb_ram)   # stronger for RAM
clf_hgb_stype = HistGradientBoostingClassifier(**hgb_base)
clf_hgb_ssize = HistGradientBoostingClassifier(**hgb_base)
clf_hgb_gpu   = HistGradientBoostingClassifier(**hgb_base)

clf_hgb_cpu.fit(X_train,   yc_train, sample_weight=sw_cpu)
clf_hgb_ram.fit(X_train,   yr_train, sample_weight=sw_ram)
clf_hgb_stype.fit(X_train, yst_train, sample_weight=sw_stype)
clf_hgb_ssize.fit(X_train, yss_train, sample_weight=sw_ssize)
clf_hgb_gpu.fit(X_train,   yg_train, sample_weight=sw_gpu)
print("Gradient Boosting done.")

print("Training Random Forest classifiers...")
rf_base = dict(n_estimators=500, max_depth=20, min_samples_leaf=5,
               random_state=42, n_jobs=-1)

clf_rf_cpu   = RandomForestClassifier(**rf_base)
clf_rf_ram   = RandomForestClassifier(**rf_base)
clf_rf_stype = RandomForestClassifier(**rf_base)
clf_rf_ssize = RandomForestClassifier(**rf_base)
clf_rf_gpu   = RandomForestClassifier(**rf_base)

clf_rf_cpu.fit(X_train,   yc_train, sample_weight=sw_cpu)
clf_rf_ram.fit(X_train,   yr_train, sample_weight=sw_ram)
clf_rf_stype.fit(X_train, yst_train, sample_weight=sw_stype)
clf_rf_ssize.fit(X_train, yss_train, sample_weight=sw_ssize)
clf_rf_gpu.fit(X_train,   yg_train, sample_weight=sw_gpu)
print("Random Forest done.")

# ─────────────────────────────────────────────
# STEP 9: Evaluate — NN, HGB, RF, and 3-way Ensemble
# ─────────────────────────────────────────────
nn_preds = model.predict(X_test, verbose=0)
nn_probs = list(nn_preds)

hgb_probs = [
    clf_hgb_cpu.predict_proba(X_test),
    clf_hgb_ram.predict_proba(X_test),
    clf_hgb_stype.predict_proba(X_test),
    clf_hgb_ssize.predict_proba(X_test),
    clf_hgb_gpu.predict_proba(X_test),
]

rf_probs = [
    clf_rf_cpu.predict_proba(X_test),
    clf_rf_ram.predict_proba(X_test),
    clf_rf_stype.predict_proba(X_test),
    clf_rf_ssize.predict_proba(X_test),
    clf_rf_gpu.predict_proba(X_test),
]

# RAM (index 1): use GB+RF only — NN is weaker for RAM and drags ensemble down
ens_probs = [(nn_probs[i] + hgb_probs[i] + rf_probs[i]) / 3.0 for i in range(5)]
ens_probs[1] = (hgb_probs[1] + rf_probs[1]) / 2.0

targets = [yc_test, yr_test, yst_test, yss_test, yg_test]
names   = ['CPU Tier', 'RAM', 'Storage Type', 'Storage Size', 'GPU']
labels  = [cpu_labels, ram_labels, stype_labels, ssize_labels, gpu_labels]

print("\n" + "="*60)
print("MODEL COMPARISON")
print("="*60)

for i, (name, y_true, label_map) in enumerate(zip(names, targets, labels)):
    nn_acc  = accuracy_score(y_true, np.argmax(nn_probs[i],  axis=1))
    hgb_acc = accuracy_score(y_true, np.argmax(hgb_probs[i], axis=1))
    rf_acc  = accuracy_score(y_true, np.argmax(rf_probs[i],  axis=1))
    ens_acc = accuracy_score(y_true, np.argmax(ens_probs[i], axis=1))

    print(f"\n{name}:")
    print(f"  Neural Network      : {nn_acc:.2%}")
    print(f"  Gradient Boosting   : {hgb_acc:.2%}")
    print(f"  Random Forest       : {rf_acc:.2%}")
    print(f"  Ensemble (3-way)    : {ens_acc:.2%}  <-- used for predictions")

    ens_pred = np.argmax(ens_probs[i], axis=1)
    present  = sorted(np.unique(np.concatenate([y_true, ens_pred])))
    cls_names = [label_map[j] for j in present]
    print(classification_report(y_true, ens_pred, labels=present, target_names=cls_names))

# ─────────────────────────────────────────────
# STEP 10: Save all artifacts
# ─────────────────────────────────────────────
model.save('model/model.keras')
print("\nNeural network saved -> model/model.keras")

gb_models = {
    'cpu': clf_hgb_cpu, 'ram': clf_hgb_ram,
    'storage_type': clf_hgb_stype, 'storage_size': clf_hgb_ssize, 'gpu': clf_hgb_gpu,
}
with open('model/gb_models.pkl', 'wb') as f:
    pickle.dump(gb_models, f)

rf_models = {
    'cpu': clf_rf_cpu, 'ram': clf_rf_ram,
    'storage_type': clf_rf_stype, 'storage_size': clf_rf_ssize, 'gpu': clf_rf_gpu,
}
with open('model/rf_models.pkl', 'wb') as f:
    pickle.dump(rf_models, f)

with open('model/job_encoder.pkl', 'wb') as f:      pickle.dump(job_le, f)
with open('model/activity_encoder.pkl', 'wb') as f: pickle.dump(activity_le, f)
with open('model/software_encoder.pkl', 'wb') as f: pickle.dump(software_le, f)
with open('model/scaler.pkl', 'wb') as f:            pickle.dump(scaler, f)

label_maps = {
    'cpu':          cpu_labels,
    'ram':          ram_labels,
    'storage_type': stype_labels,
    'storage_size': ssize_labels,
    'gpu':          gpu_labels,
}
with open('model/label_maps.pkl', 'wb') as f:
    pickle.dump(label_maps, f)

with open('model/features.pkl', 'wb') as f:
    pickle.dump(features, f)

print("All artifacts saved.")
print("\nReady! Now run: python app.py")
