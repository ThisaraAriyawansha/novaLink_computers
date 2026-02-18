import pandas as pd
import numpy as np
import pickle
from sklearn.ensemble import RandomForestClassifier
from sklearn.preprocessing import LabelEncoder
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score, classification_report

# ─────────────────────────────────────────────
# STEP 1: Load Data
# ─────────────────────────────────────────────
df = pd.read_csv('data/responses.csv', on_bad_lines='skip')

# Remove duplicate header rows
df = df[df.iloc[:, 1] != 'What is your primary job role/category?']
df = df.dropna(subset=[df.columns[1]])

print(f"✅ Loaded {len(df)} clean responses")

# ─────────────────────────────────────────────
# STEP 2: Feature Engineering Functions
# ─────────────────────────────────────────────

def normalize_workload(w):
    w = str(w).lower()
    if '5' in w or 'very heavy' in w: return 5
    if '4' in w or 'heavy' in w: return 4
    if '3' in w or 'moderate' in w: return 3
    if '2' in w or 'light' in w: return 2
    return 1

def normalize_ram(r):
    r = str(r)
    if '128' in r: return 128
    if '64' in r: return 64
    if '32' in r: return 32
    if '16' in r: return 16
    if '8' in r: return 8
    return 4

def normalize_budget(b):
    b = str(b).lower()
    if 'above lkr 500' in b or 'above lkr 450' in b or 'above lkr 400' in b: return 450000
    if 'above lkr 350' in b or '320' in b or '350' in b: return 375000
    if 'above lkr 300' in b or '300' in b: return 325000
    if '280' in b or '250' in b: return 275000
    if '200' in b or '220' in b: return 225000
    if '180' in b or '150' in b or '140' in b or '120' in b: return 175000
    if 'under' in b or '100' in b: return 90000
    return 200000

def normalize_gpu(g):
    g = str(g).lower()
    if 'high-end' in g or 'high end' in g: return 3
    if 'mid-range' in g or 'mid range' in g: return 2
    if 'entry' in g: return 1
    return 0  # integrated

def normalize_cpu(c):
    c = str(c).lower()
    if 'enthusiast' in c or 'workstation' in c or 'i9' in c or 'xeon' in c: return 4
    if 'high' in c or 'i7' in c or 'ryzen 7' in c: return 3
    if 'mid' in c or 'i5' in c or 'ryzen 5' in c: return 2
    return 1

def normalize_storage(s):
    s = str(s).lower()
    if 'nvme' in s: return 2
    if 'sata' in s or 'ssd' in s: return 1
    return 0  # HDD/eMMC

def categorize_job(j):
    j = str(j).lower()
    if any(x in j for x in ['developer', 'engineer', 'programmer', 'software', 'devops', 'full stack', 'backend', 'frontend']): return 'developer'
    if any(x in j for x in ['data', 'analyst', 'scientist', 'ml', 'ai', 'machine learning']): return 'data_analyst'
    if any(x in j for x in ['designer', 'graphic', 'ui', 'ux', 'creative', 'illustrat']): return 'designer'
    if any(x in j for x in ['video', 'editor', 'multimedia', '3d', 'animator', 'content creator']): return 'media'
    if any(x in j for x in ['student', 'undergraduate', 'msc', 'research']): return 'student'
    if any(x in j for x in ['manager', 'admin', 'office', 'accountant', 'finance', 'business', 'marketing', 'hr', 'customer']): return 'office'
    if any(x in j for x in ['network', 'cyber', 'security', 'sysadmin', 'it support', 'helpdesk', 'database']): return 'it_admin'
    return 'other'

def recommend_tier(row):
    workload = normalize_workload(row.iloc[28])
    ram      = normalize_ram(row.iloc[8])
    gpu      = normalize_gpu(row.iloc[16])
    cpu      = normalize_cpu(row.iloc[10])
    budget   = normalize_budget(row.iloc[24])
    score = workload + (ram / 16) + gpu + cpu + (budget / 100000)
    if score >= 12: return 3   # workstation
    if score >= 8:  return 2   # high-end
    if score >= 5:  return 1   # mid-range
    return 0                   # budget

def normalize_hours(h):
    h = str(h)
    if 'more' in h.lower() or '8' in h: return 9
    if '7' in h or '6' in h: return 7
    if '5' in h or '4' in h: return 5
    return 2

def normalize_multiapp(m):
    m = str(m).lower()
    if 'very' in m: return 3
    if 'frequently' in m: return 2
    if 'sometimes' in m: return 1
    return 0

# ─────────────────────────────────────────────
# STEP 3: Apply Features
# ─────────────────────────────────────────────
df['job_cat']      = df.iloc[:, 1].apply(categorize_job)
df['workload']     = df.iloc[:, 28].apply(normalize_workload)
df['ram']          = df.iloc[:, 8].apply(normalize_ram)
df['budget']       = df.iloc[:, 24].apply(normalize_budget)
df['gpu_tier']     = df.iloc[:, 16].apply(normalize_gpu)
df['cpu_tier']     = df.iloc[:, 10].apply(normalize_cpu)
df['storage_tier'] = df.iloc[:, 14].apply(normalize_storage)
df['hours']        = df.iloc[:, 26].apply(normalize_hours)
df['multi_app']    = df.iloc[:, 27].apply(normalize_multiapp)
df['target']       = df.apply(recommend_tier, axis=1)

# Encode job category
le = LabelEncoder()
df['job_encoded'] = le.fit_transform(df['job_cat'])

print(f"\n📊 Target distribution:")
print(df['target'].value_counts().rename({0:'Budget',1:'Mid-Range',2:'High-End',3:'Workstation'}))

# ─────────────────────────────────────────────
# STEP 4: Train Model
# ─────────────────────────────────────────────
features = ['job_encoded', 'workload', 'ram', 'budget',
            'gpu_tier', 'cpu_tier', 'storage_tier', 'hours', 'multi_app']

X = df[features]
y = df['target']

X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42
)

model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X_train, y_train)

y_pred = model.predict(X_test)
acc = accuracy_score(y_test, y_pred)

print(f"\n✅ Model Accuracy: {acc:.2%}")
print("\n📋 Classification Report:")
from sklearn.preprocessing import LabelBinarizer
labels = sorted(y_test.unique())
label_names = {0:'Budget', 1:'Mid-Range', 2:'High-End', 3:'Workstation'}
target_names = [label_names[l] for l in labels]
print(classification_report(y_test, y_pred,
      labels=labels, target_names=target_names))

print("\n🔍 Feature Importance:")
fi = zip(features, model.feature_importances_)
for name, score in sorted(fi, key=lambda x: -x[1]):
    bar = '█' * int(score * 40)
    print(f"  {name:<15} {bar} {score:.3f}")

# ─────────────────────────────────────────────
# STEP 5: Save Model
# ─────────────────────────────────────────────
with open('model/model.pkl', 'wb') as f:
    pickle.dump(model, f)

with open('model/encoder.pkl', 'wb') as f:
    pickle.dump(le, f)

print("\n💾 Model saved to model/model.pkl")
print("💾 Encoder saved to model/encoder.pkl")
print("\n🚀 Ready! Now run: python app.py")