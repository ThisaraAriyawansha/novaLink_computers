"""
Synthetic data generator for responses.csv
Generates realistic rows using the exact same column structure.
Focuses extra rows on underrepresented classes:
  - 128 GB RAM  (currently 34 rows)
  - eMMC storage (currently 97 rows)
  - 4 TB storage  (currently 39 rows)
  - Entry-level GPU (currently 210 rows)
Run: python generate_data.py
"""

import pandas as pd
import numpy as np
import random
from datetime import datetime, timedelta

random.seed(42)
np.random.seed(42)

# ── Shared option pools (match exact CSV values) ──────────────────────────────
INDUSTRIES = [
    'Information Technology (IT)', 'Creative Arts/Media', 'Retail/E-commerce',
    'Education - University', 'Engineering/Manufacturing', 'Finance/Banking',
    'Healthcare', 'Telecommunications', 'Government/Public Sector',
]
COMPANY_SIZES = [
    '1-10 (Small business/Startup)', '11-50 (Small to medium)',
    '51-200 (Medium-sized business)', '201-500 (Large organization)',
    '501-1000 (Large organization)', '1000+ (Enterprise)',
]
EXPERIENCES = [
    'Less than 1 year', '1-3 years', '2-3 years',
    '4-6 years', '7-10 years', '10+ years',
]
ARRANGEMENTS = ['Hybrid', 'On-site (at campus/office)', 'Remote/Work from home']
OS_OPTIONS   = ['Windows 11', 'Windows 11 Home', 'Windows 10', 'macOS']
MONITORS     = ['Single monitor/screen only', 'Dual monitors', 'Triple monitors']
PC_SUFFICIENT = [
    'Yes, fully meets my needs',
    'Partially (some tasks are slow or require workarounds)',
    'No (insufficient for my needs)',
]
SLOWDOWN = [
    'Never', 'Rarely (once a week or less)',
    'Occasionally (2-3 times per week)', 'Frequently (multiple times daily)',
]
POWER = [
    'Never', 'Rarely (1-2 hours/month)',
    'Occasionally (1-2 hours/week)', 'Frequently (3-4 hours/week)',
]
UPS_OPTIONS = ['Yes (UPS)', 'No (no backup power)', 'Not needed', 'Yes (Generator)']
INTERNET    = [
    'Fiber broadband (SLT, Dialog Fiber, etc.)', 'ADSL broadband',
    'Mobile broadband (4G/5G dongle)', 'Fiber broadband (University network)',
]
PC_AGE = [
    'Less than 1 year ago', '1-2 years ago',
    '2-3 years ago', 'More than 3 years ago',
]
PORTABILITY = [
    'No, can be stationary',
    'Must be portable (travel frequently for work)',
    'Preferred portable but not critical',
]

# ── Component value maps ──────────────────────────────────────────────────────
CPU_TIERS = {
    'entry':       'Entry-level (i3, Ryzen 3, M1)',
    'mid':         'Mid-range (i5, Ryzen 5, M1/M2)',
    'high':        'High-end (i7, Ryzen 7, M2/M3)',
    'enthusiast':  'Enthusiast/Workstation (i9, Ryzen 9, Threadripper)',
}
CPU_BRANDS = {
    'entry': ['Intel', 'AMD'],
    'mid':   ['Intel', 'AMD'],
    'high':  ['Intel', 'AMD'],
    'enthusiast': ['Intel', 'AMD'],
}
CPU_MODELS = {
    'entry':      {'Intel': ['Intel Core i3-1215U', 'Intel Core i3-12100', 'Intel Core i3-1305U'],
                   'AMD':   ['AMD Ryzen 3 5300U', 'AMD Ryzen 3 5300G', 'AMD Ryzen 3 7320U']},
    'mid':        {'Intel': ['Intel Core i5-1235U', 'Intel Core i5-13500H', 'Intel Core i5-13400'],
                   'AMD':   ['AMD Ryzen 5 7530U', 'AMD Ryzen 5 7600', 'AMD Ryzen 5 5600']},
    'high':       {'Intel': ['Intel Core i7-13700H', 'Intel Core i7-12700H', 'Intel Core i7-1360P'],
                   'AMD':   ['AMD Ryzen 7 7745HX', 'AMD Ryzen 7 7800H', 'AMD Ryzen 7 5800H']},
    'enthusiast': {'Intel': ['Intel Core i9-13900H', 'Intel Core i9-14900HX', 'Intel Core i9-12900K'],
                   'AMD':   ['AMD Ryzen 9 7945HX', 'AMD Ryzen 9 7950X', 'AMD Ryzen 9 5950X']},
}
CPU_CORES = {
    'entry': ['2 cores', '4 cores'],
    'mid':   ['6 cores', '8 cores'],
    'high':  ['8 cores', '10 cores', '12 cores'],
    'enthusiast': ['12 cores', '16 cores', '24 cores'],
}
CPU_GHZ = {
    'entry': ['1.1 GHz', '2.4 GHz', '3.0 GHz'],
    'mid':   ['2.5 GHz', '3.0 GHz', '3.3 GHz'],
    'high':  ['3.0 GHz', '3.7 GHz', '4.0 GHz'],
    'enthusiast': ['3.7 GHz', '4.0 GHz', '4.5 GHz'],
}
STORAGE_TYPES = {
    'hdd':   'HDD (Hard Disk Drive)',
    'emmc':  'eMMC storage',
    'sata':  'SATA SSD (Slower SSD)',
    'nvme':  'NVMe SSD (Faster PCIe SSD)',
}
GPU_TYPES = {
    'integrated': 'Integrated graphics (Intel UHD, AMD Radeon)',
    'entry':      'Entry-level dedicated GPU (GTX 1650, RX 6500 XT)',
    'mid':        'Mid-range dedicated GPU (RTX 3060, RX 6700 XT)',
    'high':       'High-end dedicated GPU (RTX 4070, RX 7800 XT)',
}
GPU_MODELS = {
    'integrated': '',
    'entry':      random.choice(['NVIDIA GeForce GTX 1650', 'AMD Radeon RX 6500 XT']),
    'mid':        random.choice(['NVIDIA GeForce RTX 3060', 'AMD Radeon RX 6700 XT', 'NVIDIA GeForce RTX 4060']),
    'high':       random.choice(['NVIDIA GeForce RTX 4070', 'AMD Radeon RX 7800 XT', 'NVIDIA GeForce RTX 4080']),
}
VRAM = {
    'integrated': 'Shared',
    'entry':      '4 GB',
    'mid':        random.choice(['8 GB', '12 GB']),
    'high':       random.choice(['12 GB', '16 GB', '24 GB']),
}
COMPUTER_TYPES = {
    'integrated': ['Standard Laptop', 'Budget Laptop', 'Desktop PC (Standard)'],
    'entry':      ['Standard Laptop', 'Budget Laptop', 'Desktop PC (Standard)', 'Gaming Laptop'],
    'mid':        ['Standard Laptop', 'Desktop PC (Standard)', 'Desktop PC (Custom built)', 'Gaming Laptop'],
    'high':       ['Gaming Laptop', 'Desktop PC (Custom built)', 'Desktop PC (Standard)'],
    'enthusiast': ['Desktop PC (Custom built)', 'Desktop PC (Standard)', 'Gaming Laptop'],
}
SCREEN_SIZES = {
    'laptop': ['13 inches', '14 inches', '15 inches', '17 inches'],
    'desktop': ['24 inches (external monitor)', '27 inches (external monitor)'],
}
FORM_FACTORS = {
    'laptop':  ['Windows Laptop', 'Gaming Laptop'],
    'desktop': ['Desktop PC (Tower/Standard)'],
}
BUDGETS = {
    1: 'Under LKR 100,000',
    2: 'LKR 100,000 - 150,000',
    3: 'LKR 150,000 - 200,000',
    4: 'LKR 200,000 - 250,000',
    5: 'LKR 250,000 - 300,000',
    6: 'Above LKR 300,000',
}
UPGRADE_PRIORITY = {
    'low_end':   ['RAM upgrade', 'Storage upgrade (SSD)', 'Faster processor'],
    'mid_end':   ['GPU upgrade', 'RAM upgrade', 'Faster processor'],
    'high_end':  ['GPU upgrade', 'More storage', 'Display upgrade'],
}
PERFORMANCE_ISSUES = {
    'low_end':  ['Slow boot times', 'Application lag', 'Insufficient storage'],
    'mid_end':  ['Slow rendering', 'RAM limitations', 'Heating issues'],
    'high_end': ['High render times', 'Memory limitations', 'None'],
}

def rand_timestamp():
    base = datetime(2024, 1, 1)
    delta = timedelta(days=random.randint(0, 450), hours=random.randint(0, 23), minutes=random.randint(0, 59))
    return (base + delta).strftime('%m/%d/%Y %H:%M:%S')

def is_laptop(computer_type):
    return 'Laptop' in computer_type or 'MacBook' in computer_type

def screen_size(computer_type):
    if is_laptop(computer_type):
        return random.choice(SCREEN_SIZES['laptop'])
    return random.choice(SCREEN_SIZES['desktop'])

def form_factor(computer_type):
    if is_laptop(computer_type):
        return random.choice(FORM_FACTORS['laptop'])
    return random.choice(FORM_FACTORS['desktop'])

def perf_band(cpu_tier, gpu_tier):
    if cpu_tier in ['high', 'enthusiast'] or gpu_tier in ['mid', 'high']:
        return 'high_end'
    if cpu_tier == 'mid' or gpu_tier == 'entry':
        return 'mid_end'
    return 'low_end'

# ── Row builder ───────────────────────────────────────────────────────────────
def make_row(job, activity, workload_str, hours_str, multiapp_str, budget_key,
             cpu_tier_key, ram_val, storage_type_key, storage_size_val,
             gpu_tier_key, industry=None, software=None, file_sizes=None):

    cpu_brand   = random.choice(CPU_BRANDS[cpu_tier_key])
    cpu_model   = random.choice(CPU_MODELS[cpu_tier_key][cpu_brand])
    computer    = random.choice(COMPUTER_TYPES[gpu_tier_key])
    band        = perf_band(cpu_tier_key, gpu_tier_key)

    gpu_model_val = random.choice([
        'NVIDIA GeForce GTX 1650', 'AMD Radeon RX 6500 XT'
    ]) if gpu_tier_key == 'entry' else random.choice([
        'NVIDIA GeForce RTX 3060', 'AMD Radeon RX 6700 XT', 'NVIDIA GeForce RTX 4060'
    ]) if gpu_tier_key == 'mid' else random.choice([
        'NVIDIA GeForce RTX 4070', 'AMD Radeon RX 7800 XT', 'NVIDIA GeForce RTX 4080'
    ]) if gpu_tier_key == 'high' else ''

    vram_val = {
        'integrated': 'Shared', 'entry': '4 GB',
        'mid':  random.choice(['8 GB', '12 GB']),
        'high': random.choice(['12 GB', '16 GB', '24 GB']),
    }[gpu_tier_key]

    return {
        'Timestamp':                                           rand_timestamp(),
        'What is your primary job role/category?':            job,
        'If comfortable, please specify your exact job title (Optional):': '',
        'What industry/sector do you work in?':               industry or random.choice(INDUSTRIES),
        'Company size (number of employees)':                 random.choice(COMPANY_SIZES),
        'How many years of work experience do you have?':     random.choice(EXPERIENCES),
        'Work arrangement':                                    random.choice(ARRANGEMENTS),
        'What type of computer do you primarily use for work?': computer,
        'RAM (Memory) capacity':                              ram_val,
        'Processor (CPU) brand':                              cpu_brand,
        'Processor performance tier (if known)':              CPU_TIERS[cpu_tier_key],
        'Specific processor model (Optional - Example: Intel Core i7-13700K, AMD Ryzen 7 5800X, Apple M2):': cpu_model,
        'Number of CPU cores':                                random.choice(CPU_CORES[cpu_tier_key]),
        'Processor base speed (GHz)':                         random.choice(CPU_GHZ[cpu_tier_key]),
        'Primary storage type':                               STORAGE_TYPES[storage_type_key],
        'Total storage capacity':                             storage_size_val,
        'Graphics card (GPU) type':                           GPU_TYPES[gpu_tier_key],
        'If you have a dedicated graphics card, specify the model (Optional - Example: NVIDIA RTX 4060, AMD Radeon RX 7600):': gpu_model_val,
        'Graphics card memory (VRAM)':                        vram_val,
        'Operating system':                                   random.choice(OS_OPTIONS),
        'Screen size (for laptops/all-in-ones)':              screen_size(computer),
        'Do you use multiple monitors?':                      random.choice(MONITORS),
        'What software/applications do you use regularly?':   software or 'General software',
        'What is the typical size of files you work with?':   file_sizes or random.choice(['Small (Under 10 MB)', 'Medium (10 MB - 100 MB)']),
        'What is your budget for a PC?':                      BUDGETS[budget_key],
        'Primary work activities':                            activity,
        'How many hours per day do you use your PC for work?': hours_str,
        'Do you run multiple applications simultaneously?':   multiapp_str,
        'Rate the intensity of your typical workload:':       workload_str,
        'Is your current PC sufficient for your work requirements?': random.choice(PC_SUFFICIENT),
        'What performance issues do you experience?':         random.choice(PERFORMANCE_ISSUES[band]),
        'How often does your PC slow down or struggle during work?': random.choice(SLOWDOWN),
        'Do you experience power interruptions at your location?': random.choice(POWER),
        'Do you use a UPS or generator?':                     random.choice(UPS_OPTIONS),
        'What type of internet connection do you use for work?': random.choice(INTERNET),
        'If you could upgrade your PC, what would you prioritize?': random.choice(UPGRADE_PRIORITY[band]),
        'When was your current PC purchased or assigned to you?': random.choice(PC_AGE),
        'PC form factor preference?':                         form_factor(computer),
        'Portability requirement?':                           random.choice(PORTABILITY),
        'Any additional comments about your PC specifications, work requirements, or suggestions for the PC recommendation system?': '',
    }

# ── Profile definitions ───────────────────────────────────────────────────────
def gen(n, **kw):
    return [make_row(**kw) for _ in range(n)]

def pick(*opts):
    return random.choice(opts)

rows = []

# ── 1. Game Developer ─────────────────────────────────────────────────────────
for _ in range(300):
    rows.append(make_row(
        job='Game Developer',
        activity=pick('Game development, 3D modeling, level design, scripting',
                      'Shader programming, physics simulation, optimization'),
        workload_str=pick('4 - Heavy (video editing, 3D rendering, VM)',
                          '5 - Very heavy (machine learning, scientific computing)'),
        hours_str=pick('6-8 hours', '8-10 hours'),
        multiapp_str=pick('Frequently (6-10 applications at a time)',
                          'Moderately (3-5 applications at a time)'),
        budget_key=pick(5, 6),
        cpu_tier_key=pick('high', 'enthusiast'),
        ram_val=pick('32 GB', '64 GB'),
        storage_type_key='nvme',
        storage_size_val=pick('1 TB', '2 TB'),
        gpu_tier_key='high',
        industry='Information Technology (IT)',
        software='Unity, Unreal Engine, Blender, Visual Studio',
        file_sizes=pick('Large files (100 MB - 1 GB)', 'Very large files (1 GB+)'),
    ))

# ── 2. Data Scientist / ML Engineer ──────────────────────────────────────────
for _ in range(250):
    rows.append(make_row(
        job='Data Scientist/Analyst',
        activity='Data analysis, machine learning model training, visualization',
        workload_str=pick('4 - Heavy (video editing, 3D rendering, VM)',
                          '5 - Very heavy (machine learning, scientific computing)'),
        hours_str=pick('6-8 hours', '8-10 hours'),
        multiapp_str='Frequently (6-10 applications at a time)',
        budget_key=pick(5, 6),
        cpu_tier_key=pick('high', 'enthusiast'),
        ram_val=pick('32 GB', '64 GB'),
        storage_type_key='nvme',
        storage_size_val=pick('1 TB', '2 TB'),
        gpu_tier_key=pick('mid', 'high'),
        industry='Information Technology (IT)',
        software='Python, TensorFlow, PyTorch, Jupyter, VS Code',
        file_sizes=pick('Large files (100 MB - 1 GB)', 'Very large files (1 GB+)'),
    ))

# ── 3. ML Researcher — 128 GB RAM + 4 TB storage (rare class boost) ──────────
for _ in range(350):
    rows.append(make_row(
        job='Data Scientist/Analyst',
        activity='Data analysis, machine learning model training, visualization',
        workload_str='5 - Very heavy (machine learning, scientific computing)',
        hours_str='8-10 hours',
        multiapp_str='Frequently (6-10 applications at a time)',
        budget_key=6,
        cpu_tier_key='enthusiast',
        ram_val='128 GB',
        storage_type_key='nvme',
        storage_size_val=pick('4 TB', '2 TB'),
        gpu_tier_key='high',
        industry='Information Technology (IT)',
        software='Python, CUDA, TensorFlow, PyTorch, Docker',
        file_sizes='Very large files (1 GB+)',
    ))

# ── 4. Architect / Civil Engineer ────────────────────────────────────────────
for _ in range(250):
    rows.append(make_row(
        job='Architect/Civil Engineer',
        activity=pick('CAD design, structural analysis, BIM modeling, rendering',
                      'Site planning, engineering simulations, drawings'),
        workload_str='4 - Heavy (video editing, 3D rendering, VM)',
        hours_str=pick('6-8 hours', '8-10 hours'),
        multiapp_str=pick('Frequently (6-10 applications at a time)',
                          'Moderately (3-5 applications at a time)'),
        budget_key=pick(5, 6),
        cpu_tier_key=pick('high', 'enthusiast'),
        ram_val=pick('32 GB', '64 GB'),
        storage_type_key='nvme',
        storage_size_val=pick('1 TB', '2 TB'),
        gpu_tier_key=pick('mid', 'high'),
        industry='Engineering/Manufacturing',
        software='AutoCAD, Revit, SketchUp, 3ds Max',
        file_sizes=pick('Large files (100 MB - 1 GB)', 'Very large files (1 GB+)'),
    ))

# ── 5. Graphic Designer / Video Editor ───────────────────────────────────────
for _ in range(250):
    rows.append(make_row(
        job='Graphic Designer/Video Editor',
        activity=pick('Video editing, color grading, motion graphics',
                      'Graphic design, UI mockups, branding'),
        workload_str=pick('3 - Moderate (programming, data analysis, photo editing)',
                          '4 - Heavy (video editing, 3D rendering, VM)'),
        hours_str=pick('6-8 hours', '8-10 hours'),
        multiapp_str=pick('Moderately (3-5 applications at a time)',
                          'Frequently (6-10 applications at a time)'),
        budget_key=pick(4, 5, 6),
        cpu_tier_key=pick('mid', 'high'),
        ram_val=pick('16 GB', '32 GB', '64 GB'),
        storage_type_key='nvme',
        storage_size_val=pick('512 GB', '1 TB', '2 TB'),
        gpu_tier_key=pick('mid', 'high'),
        industry='Creative Arts/Media',
        software='Adobe Premiere Pro, After Effects, Photoshop, Illustrator',
        file_sizes=pick('Medium (10 MB - 100 MB)', 'Large files (100 MB - 1 GB)', 'Very large files (1 GB+)'),
    ))

# ── 6. Software Developer / DevOps ───────────────────────────────────────────
for _ in range(300):
    rows.append(make_row(
        job=pick('Software Developer/Engineer', 'DevOps Engineer'),
        activity=pick('Full-stack development, API development, debugging',
                      'CI/CD pipeline management, containerization, cloud infrastructure',
                      'Backend development, database management'),
        workload_str=pick('3 - Moderate (programming, data analysis, photo editing)',
                          '4 - Heavy (video editing, 3D rendering, VM)'),
        hours_str=pick('6-8 hours', '8-10 hours'),
        multiapp_str=pick('Moderately (3-5 applications at a time)',
                          'Frequently (6-10 applications at a time)'),
        budget_key=pick(3, 4, 5),
        cpu_tier_key=pick('mid', 'high'),
        ram_val=pick('16 GB', '32 GB'),
        storage_type_key=pick('nvme', 'sata'),
        storage_size_val=pick('512 GB', '1 TB'),
        gpu_tier_key=pick('integrated', 'entry'),
        industry='Information Technology (IT)',
        software='VS Code, Docker, Git, IntelliJ IDEA, Postman',
        file_sizes=pick('Small (Under 10 MB)', 'Medium (10 MB - 100 MB)'),
    ))

# ── 7. Mobile App Developer ───────────────────────────────────────────────────
for _ in range(200):
    rows.append(make_row(
        job='Mobile App Developer',
        activity=pick('Mobile app development, UI implementation, testing, debugging',
                      'Cross-platform app development, API integration'),
        workload_str='3 - Moderate (programming, data analysis, photo editing)',
        hours_str=pick('6-8 hours', '8-10 hours'),
        multiapp_str=pick('Moderately (3-5 applications at a time)',
                          'Frequently (6-10 applications at a time)'),
        budget_key=pick(3, 4, 5),
        cpu_tier_key='mid',
        ram_val=pick('16 GB', '32 GB'),
        storage_type_key='nvme',
        storage_size_val=pick('512 GB', '1 TB'),
        gpu_tier_key=pick('integrated', 'entry'),
        industry='Information Technology (IT)',
        software='Android Studio, Flutter, Xcode, VS Code, Firebase',
        file_sizes='Small (Under 10 MB)',
    ))

# ── 8. QA / Test Engineer ────────────────────────────────────────────────────
for _ in range(200):
    rows.append(make_row(
        job='QA/Test Engineer',
        activity=pick('Performance testing, regression testing, test case design',
                      'Manual testing, test automation, bug reporting'),
        workload_str=pick('2 - Light (document editing, web browsing)',
                          '3 - Moderate (programming, data analysis, photo editing)'),
        hours_str=pick('4-6 hours', '6-8 hours'),
        multiapp_str=pick('Occasionally (2-3 apps at a time)',
                          'Moderately (3-5 applications at a time)'),
        budget_key=pick(2, 3),
        cpu_tier_key=pick('entry', 'mid'),
        ram_val=pick('8 GB', '16 GB'),
        storage_type_key=pick('sata', 'nvme'),
        storage_size_val=pick('256 GB', '512 GB'),
        gpu_tier_key='integrated',
        industry='Information Technology (IT)',
        software='Jira, Selenium, Postman, Chrome DevTools, Excel',
        file_sizes='Small (Under 10 MB)',
    ))

# ── 9. IT Support / Helpdesk ──────────────────────────────────────────────────
for _ in range(200):
    rows.append(make_row(
        job='IT Support/Helpdesk',
        activity=pick('Hardware maintenance, software installation, user training',
                      'Remote support, ticketing, system troubleshooting'),
        workload_str='3 - Moderate (programming, data analysis, photo editing)',
        hours_str=pick('6-8 hours', '8-10 hours'),
        multiapp_str='Moderately (3-5 applications at a time)',
        budget_key=pick(2, 3),
        cpu_tier_key='mid',
        ram_val=pick('8 GB', '16 GB'),
        storage_type_key=pick('sata', 'nvme'),
        storage_size_val=pick('256 GB', '512 GB'),
        gpu_tier_key='integrated',
        industry='Information Technology (IT)',
        software='Active Directory, TeamViewer, Helpdesk software, Office 365',
        file_sizes='Small (Under 10 MB)',
    ))

# ── 10. Student — Budget / HDD (low end) ────────────────────────────────────
for _ in range(250):
    rows.append(make_row(
        job='University/College Student (CS/IT)',
        activity=pick('Programming assignments, online research, documentation',
                      'Data structures coursework, algorithm design, web development',
                      'Assignments, research, online learning, presentations'),
        workload_str=pick('1 - Very light (email, web browsing)',
                          '2 - Light (document editing, web browsing)'),
        hours_str=pick('2-4 hours', '4-6 hours'),
        multiapp_str=pick('Rarely (1-2 apps at a time)',
                          'Occasionally (2-3 apps at a time)'),
        budget_key=pick(1, 2),
        cpu_tier_key='entry',
        ram_val=pick('4 GB', '8 GB'),
        storage_type_key=pick('hdd', 'sata'),
        storage_size_val=pick('128 GB', '256 GB'),
        gpu_tier_key='integrated',
        industry='Education - University',
        software='Microsoft Office, Chrome, VS Code, Python basics',
        file_sizes='Small (Under 10 MB)',
    ))

# ── 11. Student — eMMC (rare class boost) ────────────────────────────────────
for _ in range(350):
    rows.append(make_row(
        job='University/College Student (CS/IT)',
        activity=pick('Programming assignments, online research, documentation',
                      'Assignments, online classes, basic programming',
                      'Watching educational videos, assignments, presentations'),
        workload_str=pick('1 - Very light (email, web browsing)',
                          '2 - Light (document editing, web browsing)'),
        hours_str=pick('2-4 hours', '4-6 hours'),
        multiapp_str=pick('Rarely (1-2 apps at a time)',
                          'Occasionally (2-3 apps at a time)'),
        budget_key=1,
        cpu_tier_key='entry',
        ram_val=pick('4 GB', '8 GB'),
        storage_type_key='emmc',
        storage_size_val=pick('64 GB', '128 GB'),
        gpu_tier_key='integrated',
        industry='Education - University',
        software='Microsoft Office, Chrome, Google Meet',
        file_sizes='Small (Under 10 MB)',
    ))

# ── 12. Office / Admin worker ─────────────────────────────────────────────────
for _ in range(250):
    rows.append(make_row(
        job=pick('Finance/Accounting Professional', 'Office Administrator',
                 'Marketing/Sales Professional'),
        activity=pick('Scheduling, document management, email communication',
                      'Document editing, spreadsheets, video calls',
                      'Invoice processing, ledger management, audit preparation'),
        workload_str=pick('1 - Very light (email, web browsing)',
                          '2 - Light (document editing, web browsing)'),
        hours_str=pick('4-6 hours', '6-8 hours'),
        multiapp_str=pick('Rarely (1-2 apps at a time)',
                          'Occasionally (2-3 apps at a time)'),
        budget_key=pick(1, 2),
        cpu_tier_key='entry',
        ram_val=pick('4 GB', '8 GB'),
        storage_type_key=pick('hdd', 'sata'),
        storage_size_val=pick('256 GB', '512 GB'),
        gpu_tier_key='integrated',
        industry=pick('Finance/Banking', 'Retail/E-commerce', 'Government/Public Sector'),
        software='Microsoft Office, QuickBooks, Chrome, Outlook, Teams',
        file_sizes='Small (Under 10 MB)',
    ))

# ── 13. Network / Cybersecurity ───────────────────────────────────────────────
for _ in range(150):
    rows.append(make_row(
        job=pick('Network/System Administrator', 'Cybersecurity Analyst'),
        activity=pick('SIEM monitoring, malware analysis, security audits',
                      'Network monitoring, configuration, troubleshooting',
                      'Server management, firewall administration, VPN setup'),
        workload_str='3 - Moderate (programming, data analysis, photo editing)',
        hours_str='8-10 hours',
        multiapp_str=pick('Moderately (3-5 applications at a time)',
                          'Frequently (6-10 applications at a time)'),
        budget_key=pick(3, 4),
        cpu_tier_key='mid',
        ram_val=pick('16 GB', '32 GB'),
        storage_type_key=pick('sata', 'nvme'),
        storage_size_val=pick('512 GB', '1 TB'),
        gpu_tier_key='integrated',
        industry='Information Technology (IT)',
        software='Wireshark, Kali Linux, Splunk, VMware, Cisco tools',
        file_sizes=pick('Small (Under 10 MB)', 'Medium (10 MB - 100 MB)'),
    ))

# ── Finalise ──────────────────────────────────────────────────────────────────
new_df    = pd.DataFrame(rows)
existing  = pd.read_csv('data/responses.csv', on_bad_lines='skip')

# Align column order exactly to existing CSV
new_df = new_df[existing.columns]

combined = pd.concat([existing, new_df], ignore_index=True)
combined.to_csv('data/responses.csv', index=False)

print(f"Original rows : {len(existing):,}")
print(f"Generated rows: {len(new_df):,}")
print(f"Total rows    : {len(combined):,}")
print()
print("Class distribution after augmentation:")
clean = combined[combined.iloc[:, 1] != 'What is your primary job role/category?'].dropna(subset=[combined.columns[1]])
print("\nRAM:", clean.iloc[:, 8].value_counts().to_string())
print("\nStorage type:", clean.iloc[:, 14].value_counts().to_string())
print("\nStorage size:", clean.iloc[:, 15].value_counts().to_string())
print("\nGPU:", clean.iloc[:, 16].value_counts().to_string())
print("\nDone. Now retrain: python model.py")
