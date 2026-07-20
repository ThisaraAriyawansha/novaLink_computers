<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaLink Computers | Best Computers for you</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Import Orbitron font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f8fafc;
            color: #334155;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .primary-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .secondary-gradient {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .accent-gradient {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 2px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 2px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        #adv-workload {
            background: transparent;
        }
        #adv-workload::-webkit-slider-runnable-track {
            background: #e2e8f0;
            height: 6px;
            border-radius: 3px;
        }
        #adv-workload::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #000;
            margin-top: -5px;
            cursor: pointer;
        }
        #adv-workload::-moz-range-track {
            background: #e2e8f0;
            height: 6px;
            border-radius: 3px;
        }
        #adv-workload::-moz-range-thumb {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #000;
            border: none;
            cursor: pointer;
        }

        .component-icon {
            width: 40px;
            height: 40px;
            background: #f1f5f9;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .selected-component {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .progress-step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .progress-step.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .progress-step.completed {
            background: #10b981;
            color: white;
        }
        
        .progress-step.inactive {
            background: #e2e8f0;
            color: #64748b;
        }
        
        .progress-line {
            height: 2px;
            background: #e2e8f0;
            position: relative;
            overflow: hidden;
        }
        
        .progress-line.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .floating-action {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 50;
        }
        
        @media (max-width: 768px) {
            .floating-action {
                bottom: 1rem;
                right: 1rem;
            }
        }
        
        .modal-backdrop {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(4px);
        }
        
        .slide-in {
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content Area -->
        <div class="lg:w-4/6 w-full">
            <!-- Build Progress -->
            <div class="glass-effect  p-4 mb-4 fixed top-0 left-0 z-50 lg:w-4/6 w-full  bg-white shadow-none">
                <!-- Top Row: Title + Buttons -->
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-xl font-bold text-slate-800" style="font-family: 'Orbitron', sans-serif; font-size: 18px;">Build Your Dream PC</h2>
                    <div class="flex space-x-2">
                        <!-- Home Button -->
                        <a href="/home" class="flex items-center px-3 py-1.5 bg-slate-100 text-slate-700 rounded-lg 
                            hover:bg-black hover:text-white transition-colors text-sm">
                            <i class="fas fa-home mr-2"></i> Home
                        </a>

                        <!-- Cart Button -->
                        <a href="/cart" class="flex items-center px-3 py-1.5 bg-black text-white rounded-lg hover:bg-gray-900 transition-colors text-sm">
                            <i class="fas fa-shopping-cart mr-2"></i> Cart
                        </a>
                    </div>
                </div>

                <p class="text-slate-600 mb-3 text-sm">Select compatible components to build your perfect system</p>
                
                <!-- Progress Bar -->
                <div class="w-full bg-slate-200 rounded-full h-2 mb-1">
                    <div class="progress-bar-fill bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
                <p class="progress-text text-xs text-slate-500 text-center">Select components to begin</p>
                
                <!-- Steps -->
                <div class="flex justify-between text-xs text-slate-600 mt-2">
                    <span>1. Select Components</span>
                    <span>2. Review Build</span>
                    <span>3. Checkout</span>
                </div>
            </div>


            <div class="h-[24dvh]"></div>

            <!-- AI PC Advisor Section -->
            <div class="glass-effect rounded-2xl mb-6 overflow-hidden" id="ai-advisor-card">
                <!-- Header Row -->
                <div class="flex items-center justify-between p-4 cursor-pointer" id="ai-advisor-toggle" onclick="toggleAdvisor()">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0 bg-black">
                            <i class="fas fa-robot text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800 text-sm" style="font-family: 'Orbitron', sans-serif;">
                                AI PC Advisor
                                <span class="ml-2 text-[10px] font-normal bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full border border-gray-300">NovaLink AI</span>
                            </h3>
                            <p class="text-xs text-slate-500 mt-0.5">Answer a few questions — get a smart build recommendation</p>
                        </div>
                    </div>
                    <button class="text-xs text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1 flex-shrink-0"
                            id="advisor-toggle-btn">
                        Get Advice <i class="fas fa-chevron-down text-[10px] ml-1" id="advisor-chevron"></i>
                    </button>
                </div>

                <!-- Form (collapsed by default) -->
                <div class="hidden border-t border-slate-100" id="advisor-panel">
                    <div class="p-4">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-4">
                            <!-- Job Role -->
                            <div>
                                <label class="block text-[11px] font-medium text-slate-500 mb-1">Job Role</label>
                                <select id="adv-job"
                                    class="w-full text-xs border border-slate-200 rounded-lg px-2.5 py-2 bg-white text-slate-700 focus:outline-none focus:border-black">
                                    <option value="">Select role...</option>
                                    <option value="software_dev">Software Developer / DevOps / Backend / Frontend</option>
                                    <option value="data_ml">Data Scientist / AI / ML Engineer</option>
                                    <option value="game_dev">Game Developer</option>
                                    <option value="mobile_dev">Mobile App Developer</option>
                                    <option value="cad_3d">Architect / Civil / 3D Artist / CAD</option>
                                    <option value="designer">Graphic Designer / UI-UX</option>
                                    <option value="student">Student / Researcher</option>
                                    <option value="office">Business / Finance / Office / Admin</option>
                                    <option value="it_admin">IT Support / Network / Security / QA</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <!-- Primary Activity -->
                            <div>
                                <label class="block text-[11px] font-medium text-slate-500 mb-1">Primary Activity</label>
                                <select id="adv-activity"
                                    class="w-full text-xs border border-slate-200 rounded-lg px-2.5 py-2 bg-white text-slate-700 focus:outline-none focus:border-black">
                                    <option value="">What do you do?</option>
                                    <option value="heavy_graphics">Game Dev / 3D Rendering / CAD / Physics Simulation</option>
                                    <option value="data_ml">Machine Learning / Data Analysis / AI Modeling</option>
                                    <option value="media">Video Editing / Motion Graphics / VFX</option>
                                    <option value="mobile_dev">Mobile App Development</option>
                                    <option value="software_dev">Web / Backend / DevOps / Cloud Development</option>
                                    <option value="qa">Testing / QA / Bug Reporting</option>
                                    <option value="it_admin">Network / Security / Server Administration</option>
                                    <option value="design">Graphic Design / UI Mockups / Branding</option>
                                    <option value="office">Documents / Spreadsheets / Email / Office Work</option>
                                    <option value="student">Assignments / Online Classes / Research</option>
                                    <option value="general">General / Browsing / Light Tasks</option>
                                </select>
                            </div>

                            <!-- Software Used -->
                            <div>
                                <label class="block text-[11px] font-medium text-slate-500 mb-1">Software Used</label>
                                <select id="adv-software"
                                    class="w-full text-xs border border-slate-200 rounded-lg px-2.5 py-2 bg-white text-slate-700 focus:outline-none focus:border-black">
                                    <option value="">Select software...</option>
                                    <option value="dev_tools">VS Code / Docker / Git / IntelliJ (Dev & DevOps)</option>
                                    <option value="ml_heavy">Python / TensorFlow / PyTorch / CUDA (ML & AI)</option>
                                    <option value="game_dev">Unity / Unreal Engine / Blender / C++ (Game Dev)</option>
                                    <option value="mobile_dev">Android Studio / Flutter / Xcode (Mobile)</option>
                                    <option value="cad_3d">AutoCAD / Revit / 3ds Max / STAAD Pro (CAD & 3D)</option>
                                    <option value="media">Premiere Pro / After Effects / Photoshop (Media)</option>
                                    <option value="qa_tools">Selenium / JIRA / Postman / JMeter (QA & Testing)</option>
                                    <option value="it_tools">Wireshark / VMware / Active Directory (IT & Security)</option>
                                    <option value="office_tools">Microsoft Office / Excel / Teams / Zoom (Office)</option>
                                    <option value="general">General / Mixed / Other</option>
                                </select>
                            </div>

                            <!-- Budget -->
                            <div>
                                <label class="block text-[11px] font-medium text-slate-500 mb-1">Budget (LKR)</label>
                                <select id="adv-budget"
                                    class="w-full text-xs border border-slate-200 rounded-lg px-2.5 py-2 bg-white text-slate-700 focus:outline-none focus:border-black">
                                    <option value="">Select budget...</option>
                                    <option value="1">Under LKR 100,000</option>
                                    <option value="2">LKR 100,000 – 150,000</option>
                                    <option value="3">LKR 150,000 – 200,000</option>
                                    <option value="4">LKR 200,000 – 250,000</option>
                                    <option value="5">LKR 250,000 – 300,000</option>
                                    <option value="6">Above LKR 300,000</option>
                                </select>
                            </div>

                            <!-- Daily Usage Hours -->
                            <div>
                                <label class="block text-[11px] font-medium text-slate-500 mb-1">Daily PC Hours</label>
                                <select id="adv-hours"
                                    class="w-full text-xs border border-slate-200 rounded-lg px-2.5 py-2 bg-white text-slate-700 focus:outline-none focus:border-black">
                                    <option value="">Select usage...</option>
                                    <option value="3">Less than 4 hours</option>
                                    <option value="5" selected>4 – 6 hours</option>
                                    <option value="7">6 – 8 hours</option>
                                    <option value="10">8+ hours</option>
                                </select>
                            </div>

                            <!-- Multitasking -->
                            <div>
                                <label class="block text-[11px] font-medium text-slate-500 mb-1">Multitasking</label>
                                <select id="adv-multiapp"
                                    class="w-full text-xs border border-slate-200 rounded-lg px-2.5 py-2 bg-white text-slate-700 focus:outline-none focus:border-black">
                                    <option value="1">Rarely (1–2 apps)</option>
                                    <option value="2" selected>Occasionally (2–3 apps)</option>
                                    <option value="3">Moderately (3–5 apps)</option>
                                    <option value="4">Frequently (6+ apps)</option>
                                </select>
                            </div>

                            <!-- Typical File Size -->
                            <div>
                                <label class="block text-[11px] font-medium text-slate-500 mb-1">Typical File Size</label>
                                <select id="adv-filesize"
                                    class="w-full text-xs border border-slate-200 rounded-lg px-2.5 py-2 bg-white text-slate-700 focus:outline-none focus:border-black">
                                    <option value="">Select file size...</option>
                                    <option value="1">Small (under 10 MB — docs, code, emails)</option>
                                    <option value="2">Medium (10 MB – 100 MB — images, projects)</option>
                                    <option value="3">Large (100 MB – 1 GB — videos, datasets, CAD)</option>
                                    <option value="4">Very Large (1 GB+ — ML datasets, 4K video)</option>
                                </select>
                            </div>

                        </div>

                        <!-- Workload slider -->
                        <div class="mb-4">
                            <div class="flex justify-between items-center mb-1">
                                <label class="text-[11px] font-medium text-slate-500">Workload Intensity</label>
                                <span class="text-[11px] font-semibold text-black" id="adv-workload-label">Moderate</span>
                            </div>
                            <input type="range" id="adv-workload" min="1" max="5" value="3" step="1"
                                class="w-full h-1.5 rounded-full appearance-none cursor-pointer"
                                style="accent-color: #000;"
                                oninput="updateWorkloadLabel(this.value)">
                            <div class="flex justify-between text-[10px] text-slate-400 mt-1">
                                <span>Very Light</span><span>Light</span><span>Moderate</span><span>Heavy</span><span>Extreme</span>
                            </div>
                        </div>

                        <!-- Action button -->
                        <button onclick="getAIRecommendation()"
                            class="w-full py-2.5 text-sm font-semibold text-white bg-black hover:bg-gray-800 rounded-lg transition-all active:scale-95 flex items-center justify-center gap-2"
                            id="adv-submit-btn">
                            <i class="fas fa-magic text-xs"></i> Analyse My Needs
                        </button>
                    </div>

                    <!-- Result Area -->
                    <div class="hidden border-t border-slate-100" id="advisor-result">
                        <div class="p-4">
                            <!-- Tier badge + confidence -->
                            <div id="adv-tier-header">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-[10px] font-medium uppercase tracking-wide mb-1" style="color:#64748b;">Recommended Build Tier</p>
                                        <div class="flex items-center gap-2">
                                            <span class="text-lg font-bold" id="adv-tier-emoji"></span>
                                            <span class="font-bold" id="adv-tier-name" style="font-family: 'Orbitron', sans-serif; font-size: 15px;"></span>
                                            <span id="adv-confidence-badge"></span>
                                        </div>
                                    </div>
                                    <button onclick="resetAdvisor()" class="text-[11px] text-slate-400 hover:text-slate-600 flex items-center gap-1">
                                        <i class="fas fa-redo text-[10px]"></i> Retry
                                    </button>
                                </div>
                            </div>

                            <!-- Price range -->
                            <div class="rounded-xl px-3 py-2.5 mb-3 flex items-center gap-2" id="adv-price-range-box">
                                <i class="fas fa-tag text-xs"></i>
                                <div>
                                    <p class="text-[10px] text-slate-500" id="adv-price-range-label">Estimated Build Cost (from catalog)</p>
                                    <p class="text-sm font-bold" id="adv-price-range"></p>
                                </div>
                            </div>

                            <!-- Spec chips -->
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-3" id="adv-specs-grid"></div>

                            <!-- Auto-select button -->
                            <button onclick="autoSelectComponents()"
                                id="adv-auto-select-btn"
                                class="w-full py-2.5 text-sm font-semibold text-white bg-black hover:bg-gray-800 rounded-lg transition-all active:scale-95 flex items-center justify-center gap-2 mb-3">
                                <i class="fas fa-magic text-xs"></i>
                                Auto-Select Components for This Tier
                            </button>

                            <!-- Tip -->
                            <p class="text-[11px] text-slate-500 bg-slate-50 rounded-lg px-3 py-2" id="adv-tip"></p>

                            <!-- Source tag / disclaimer -->
                            <div class="mt-2 text-right" id="adv-source-tag"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Component Categories -->
            <div class="glass-effect rounded-2xl p-3 mb-6">
                <h3 class="text-base font-semibold text-slate-800 mb-4" style="font-family: 'Orbitron', sans-serif; font-size: 16px;">
                    Core Components
                </h3>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                    @foreach($pcBuildCategories as $category)
                    <button 
                        class="component-category p-2.5 border border-slate-300 rounded-lg hover:border-gray-500 hover:bg-gray-300 transition-all duration-300 group"
                        data-category="{{ $category['value'] }}"
                        onclick="filterProducts('{{ $category['value'] }}')"
                    >
                        <div class="text-center">
                            <div class="w-10 h-10 bg-slate-100 rounded-md flex items-center justify-center mx-auto mb-2.5 group-hover:bg-black transition-colors">
                                <i class="{{ $category['icon'] }} text-slate-600 group-hover:text-white text-sm"></i>
                            </div>
                            <p class="font-medium text-slate-800 text-xs leading-tight">{{ $category['name'] }}</p>
                        </div>
                    </button>
                    @endforeach
                </div>
            </div>



            
            <!-- Products Grid -->
            <div class="glass-effect rounded-2xl p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-slate-800" id="current-category" style="font-family: 'Orbitron', sans-serif; font-size: 18px;">All Components</h3>

                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="products-grid">
                    @foreach($products as $product)
                    <div class="product-card bg-white rounded-lg border border-slate-200 overflow-hidden hover:shadow-md transition-shadow duration-300"
                        data-type="{{ $product['type'] }}"
                        data-id="{{ $product['id'] }}">
                        <div class="p-3">
                            <div class="flex justify-between items-start mb-2">
                                <span class="bg-gray-200 text-black text-[10px] font-semibold px-2 py-0.5 rounded">{{ $product['type'] }}</span>
                                <button class="text-slate-400 hover:text-red-500 wishlist-btn" data-id="{{ $product['id'] }}">
                                    <i class="far fa-heart text-xs"></i>
                                </button>
                            </div>
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-28 object-contain mb-3">
                            <h4 class="font-semibold text-slate-800 text-sm mb-1">{{ $product['name'] }}</h4>
                            <div class="flex items-center mb-1">
                                <div class="flex text-yellow-400 mr-2 text-xs">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-slate-500 text-xs">(24)</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-base font-bold text-black">Rs. {{ number_format($product['dis_price']) }}</p>
                                    @if($product['dis_price'] != $product['ret_price'])
                                    <p class="text-xs text-slate-400 line-through">Rs. {{ number_format($product['ret_price']) }}</p>
                                    @endif
                                </div>
                                <button class="add-to-build-btn bg-black hover:bg-gray-100 text-white rounded-md px-2 py-1 text-xs font-medium transition-colors"
                                        data-id="{{ $product['id'] }}"
                                        data-type="{{ $product['type'] }}"
                                        data-name="{{ $product['name'] }}"
                                        data-price="{{ $product['dis_price'] }}"
                                        data-image="{{ $product['image'] }}"
                                        data-features="{{ json_encode($product['features']) }}">
                                    @if(isset($product['features']['power_consumption']))
                                    <span style="display:block; font-size:9px; color:#9ca3af; margin-top:2px;">{{ $product['features']['power_consumption'] }}W TDP</span>
                                    @endif
                                    Add to Build
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>
        
        <!-- Build Summary Sidebar -->
        <div class="lg:col-span-4">
            <div class="glass-effect p-6 fixed top-0 right-0 h-full max-h-screen overflow-auto lg:w-2/6 w-full z-50 bg-white shadow-none">
                <h3 class="text-lg font-semibold text-slate-800 mb-6" style="font-family: 'Orbitron', sans-serif; font-size: 18px;">Your Build</h3>
                
                <div class="space-y-3 max-h-96 overflow-y-auto custom-scrollbar" id="build-components">
                    <!-- Essential Components -->
                    <div class="component-item p-3 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300" data-type="PROCESSOR">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="component-icon w-5 h-5">
                                    <i class="fas fa-microchip text-slate-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-600 text-sm">Processor</p>
                                    <p class="text-xs text-slate-400">Not selected</p>
                                </div>
                            </div>
                            <button class="text-black text-xs font-medium hover:text-blue-600 select-component" data-type="PROCESSOR">Select</button>
                        </div>
                    </div>
                    
                    <div class="component-item p-3 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300" data-type="MOTHERBOARD">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="component-icon w-5 h-5">
                                    <i class="fas fa-memory text-slate-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-600 text-sm">Motherboard</p>
                                    <p class="text-xs text-slate-400">Not selected</p>
                                </div>
                            </div>
                            <button class="text-black text-xs font-medium hover:text-blue-600 select-component" data-type="MOTHERBOARD">Select</button>
                        </div>
                    </div>
                    
                    <div class="component-item p-3 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300" data-type="RAM">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="component-icon w-5 h-5">
                                    <i class="fas fa-memory text-slate-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-600 text-sm">Memory (RAM)</p>
                                    <p class="text-xs text-slate-400">Not selected</p>
                                </div>
                            </div>
                            <button class="text-black text-xs font-medium hover:text-blue-600 select-component" data-type="RAM">Select</button>
                        </div>
                    </div>
                    
                    <div class="component-item p-3 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300" data-type="GRAPHIC CARDS">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="component-icon w-5 h-5">
                                    <i class="fas fa-tv text-slate-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-600 text-sm">Graphics Card</p>
                                    <p class="text-xs text-slate-400">Not selected</p>
                                </div>
                            </div>
                            <button class="text-black text-xs font-medium hover:text-blue-600 select-component" data-type="GRAPHIC CARDS">Select</button>
                        </div>
                    </div>
                    
                    <div class="component-item p-3 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300" data-type="STORAGE & NAS">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="component-icon w-5 h-5">
                                    <i class="fas fa-hdd text-slate-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-600 text-sm">STORAGE & NAS</p>
                                    <p class="text-xs text-slate-400">Not selected</p>
                                </div>
                            </div>
                            <button class="text-black text-xs font-medium hover:text-blue-600 select-component" data-type="STORAGE & NAS">Select</button>
                        </div>
                    </div>
                    
                    <div class="component-item p-3 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300" data-type="POWER SUPPLY">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="component-icon w-5 h-5">
                                    <i class="fas fa-plug text-slate-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-600 text-sm">Power Supply</p>
                                    <p class="text-xs text-slate-400">Not selected</p>
                                </div>
                            </div>
                            <button class="text-black text-xs font-medium hover:text-blue-600 select-component" data-type="POWER SUPPLY">Select</button>
                        </div>
                    </div>
                    
                    <div class="component-item p-3 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300" data-type="CASINGS">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="component-icon w-5 h-5">
                                    <i class="fas fa-cube text-slate-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-600 text-sm">PC Case</p>
                                    <p class="text-xs text-slate-400">Not selected</p>
                                </div>
                            </div>
                            <button class="text-black text-xs font-medium hover:text-blue-600 select-component" data-type="CASINGS">Select</button>
                        </div>
                    </div>
                    
                    <!-- Optional Components -->
                    <div class="component-item p-3 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300" data-type="COOLING & LIGHTING">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="component-icon w-5 h-5">
                                    <i class="fas fa-fan text-slate-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-600 text-sm">COOLING & LIGHTING</p>
                                    <p class="text-xs text-slate-400">Optional</p>
                                </div>
                            </div>
                            <button class="text-black text-xs font-medium hover:text-blue-600 select-component" data-type="COOLING & LIGHTING">Select</button>
                        </div>
                    </div>
                    
                    <div class="component-item p-3 bg-slate-50 rounded-xl border-2 border-dashed border-slate-300" data-type="MONITORS & ACCESSORIES">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="component-icon w-5 h-5">
                                    <i class="fas fa-desktop text-slate-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-600 text-sm">MONITORS & ACCESSORIES</p>
                                    <p class="text-xs text-slate-400">Optional</p>
                                </div>
                            </div>
                            <button class="text-black text-xs font-medium hover:text-blue-600 select-component" data-type="MONITORS & ACCESSORIES">Select</button>
                        </div>
                    </div>
                </div>

                
                <!-- Power Consumption Panel -->
                <div class="mt-4 pt-3 border-t border-slate-200">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-slate-600 text-xs font-semibold flex items-center gap-1">
                            <i class="fas fa-bolt text-yellow-500"></i> Power Estimate
                        </span>
                        <span class="text-xs font-bold text-slate-800" id="total-power-draw">0W</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-1.5 mb-1">
                        <div id="power-bar" class="h-1.5 rounded-full transition-all duration-300 bg-green-500" style="width:0%"></div>
                    </div>
                    <div id="psu-recommendation" class="text-xs text-slate-500 mb-2" style="display:none;">
                        Recommended PSU: <span id="psu-rec-wattage" class="font-bold text-slate-700"></span>
                    </div>
                    <div id="compatibility-warnings" class="space-y-1 mb-2"></div>
                </div>

                <div class="mt-2 pt-2 border-t border-slate-200">
                    <div class="flex justify-between mb-2">
                        <span class="text-slate-600 text-sm">Subtotal</span>
                        <span class="font-medium text-sm" id="build-subtotal">Rs. 0</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-slate-600 text-sm">Estimated Shipping</span>
                        <span class="font-medium text-sm">Rs. 500</span>
                    </div>
                    <div class="flex justify-between text-base font-semibold text-slate-800 mb-4">
                        <span>Total</span>
                        <span id="build-total">Rs. 500</span>
                    </div>
                    
                    <button class="w-full py-2 px-3 bg-black text-white rounded-lg hover:bg-blue-700 transition-colors font-medium mb-2 text-sm" id="add-to-cart-btn">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Add Build to Cart
                    </button>
                    
                    <button class="w-full py-1.5 px-3 bg-slate-100 text-slate-600 rounded-lg hover:bg-slate-200 transition-colors font-medium text-sm" id="reset-build-btn">
                        <i class="fas fa-refresh mr-2"></i>
                        Reset Build
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>


<div id="pcBuildSuccessModal" class="hidden fixed bottom-4 right-4 bg-white p-4 rounded-lg shadow-xl z-50 max-w-md border border-green-200">
    <div class="flex items-center mb-3">
        <div class="bg-green-100 p-2 rounded-full mr-3">
            <i class="fas fa-check-circle text-green-500 text-xl"></i>
        </div>
        <div>
            <h3 class="font-bold text-lg">PC Build Added to Cart!</h3>
            <p class="text-sm text-gray-600">All components were successfully added</p>
        </div>
    </div>
    <div class="build-items max-h-60 overflow-y-auto pr-2"></div>
    <div class="mt-3 pt-3 border-t">
        <a href="/cart" class="text-black hover:text-gray-400 font-medium text-sm">
            <i class="fas fa-shopping-cart mr-1"></i> View Cart
        </a>
    </div>
</div>


<script>
// Current build state
    let currentBuild = {
        'PROCESSOR': null,
        'MOTHERBOARD': null,
        'RAM': null,
        'GRAPHIC CARDS': null,
        'STORAGE & NAS': null,
        'POWER SUPPLY': null,
        'CASINGS': null,
        'COOLING & LIGHTING': null,
        'MONITORS & ACCESSORIES': null
    };
    
    let buildArray = [];

    // Initialize the page
    document.addEventListener('DOMContentLoaded', function() {
        // Filter products when category is clicked
        document.querySelectorAll('.component-category').forEach(button => {
            button.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                filterProducts(category);
            });
        });
        
        // Add to build button click handler
        document.querySelectorAll('.add-to-build-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const productType = this.getAttribute('data-type');
                const productName = this.getAttribute('data-name');
                const productPrice = parseFloat(this.getAttribute('data-price'));
                const productImage = this.getAttribute('data-image');
                let productFeatures = {};
                try { productFeatures = JSON.parse(this.getAttribute('data-features') || '{}'); } catch(e) {}

                addToBuild(productType, {
                    id: productId,
                    name: productName,
                    dis_price: productPrice,
                    image: productImage,
                    features: productFeatures
                });
            });
        });
        
        // Select component button click handler (from build sidebar)
        document.querySelectorAll('.select-component').forEach(button => {
            button.addEventListener('click', function() {
                const componentType = this.getAttribute('data-type');
                filterProducts(componentType);
                
                // Scroll to products section
                document.getElementById('products-grid').scrollIntoView({ behavior: 'smooth' });
            });
        });
        
        // Reset build button
        document.getElementById('reset-build-btn').addEventListener('click', resetBuild);
        
        // Add to cart button
        document.getElementById('add-to-cart-btn').addEventListener('click', addBuildToCart);
    });
    
    // Filter products by category
    function filterProducts(category) {
        // Update current category title
        const categoryTitle = document.querySelector(`.component-category[data-category="${category}"]`)?.querySelector('p')?.textContent || 'All Components';
        document.getElementById('current-category').textContent = categoryTitle;
        
        document.querySelectorAll('.product-card').forEach(card => {
            const productType = card.getAttribute('data-type');
            
            if (category === 'all' || productType === category) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    
    // Add a product to the build
    function addToBuild(type, product) {
        if (!product || !product.dis_price || !product.name || !product.id || !product.image) {
            console.error('Invalid product object:', product);
            alert('Error: Invalid product data. Please try again.');
            return;
        }

        // Update current build state
        currentBuild[type] = product;
        
        // Add to build array
        const buildItem = {
            id: product.id,
            name: product.name,
            price: product.dis_price, // Store as number for calculations
            image: product.image,
            type: type
        };
        
        // Update or add to buildArray
        const existingIndex = buildArray.findIndex(item => item.type === type);
        if (existingIndex !== -1) {
            buildArray[existingIndex] = buildItem;
        } else {
            buildArray.push(buildItem);
        }
        
        // Find or create the component item in the sidebar
        let componentItem = document.querySelector(`.component-item[data-type="${type}"]`);
        
        if (!componentItem) {
            // Create new component item if it doesn't exist (for optional components)
            componentItem = document.createElement('div');
            componentItem.className = 'component-item p-2 rounded-xl border border-solid';
            componentItem.setAttribute('data-type', type);
            document.getElementById('build-components').appendChild(componentItem);
        }
        
        componentItem.innerHTML = `
            <div class="flex items-start justify-between p-1">
            <div class="flex items-start space-x-2">
                <img src="${product.image}" alt="${product.name}" class="w-8 h-8 object-contain rounded-md">
                <div>
                <p class="font-medium text-slate-600 text-xs">${type}</p>
                <p class="text-xs text-slate-800">${product.name}</p>
                <p class="text-xs font-semibold text-black mt-0.5">Rs. ${product.dis_price.toLocaleString()}</p>
                </div>
            </div>
            <button class="text-black hover:text-red-700 text-sm remove-component" data-type="${type}">
                <i class="fas fa-times"></i>
            </button>
            </div>

        `;
        
        // Add event listener to remove button
        componentItem.querySelector('.remove-component').addEventListener('click', function() {
            removeFromBuild(type);
        });

        // Update the build summary
        updateBuildSummary();
        updateProgressBar();
        updatePowerAndCompatibility();

        // Change border color to indicate selected
        componentItem.classList.remove('border-dashed', 'border-slate-300');
        componentItem.classList.add('border-solid', 'border-gray-400', 'bg-gray-100');

    }
    
    // Remove a product from the build
    function removeFromBuild(type) {
        // Update current build state
        currentBuild[type] = null;
        
        // Remove from buildArray
        buildArray = buildArray.filter(item => item.type !== type);
        
        // Update the UI for this component
        const componentItem = document.querySelector(`.component-item[data-type="${type}"]`);
        
        // For optional components that might not have a default state, just remove them
        if (!['PROCESSOR', 'MOTHERBOARD', 'RAM', 'GRAPHIC CARDS', 'STORAGE & NAS', 'POWER SUPPLY', 'CASINGS', 'COOLING & LIGHTING', 'MONITORS & ACCESSORIES'].includes(type)) {
            componentItem.remove();
            updateBuildSummary();
            updateProgressBar();
            updatePowerAndCompatibility();
            return;
        }
        
        // For essential components, reset to default state
        componentItem.innerHTML = `
            <div class="flex items-center justify-between text-xs">
            <div class="flex items-center space-x-1.5">
                <div class="component-icon">
                <i class="${getIconForType(type)} text-slate-400" style="font-size: 14px;"></i>
                </div>
                <div>
                <p class="font-medium text-slate-600 leading-tight">${getDisplayName(type)}</p>
                <p class="text-[11px] text-slate-400 leading-tight">${['COOLING & LIGHTING', 'MONITORS & ACCESSORIES'].includes(type) ? 'Optional' : 'Not selected'}</p>
                </div>
            </div>
            <button 
                class="text-black font-medium hover:text-blue-600 select-component"
                data-type="${type}"
                style="padding: 0.15rem 0.5rem; font-size: 12px; line-height: 1.2;"
            >
                Select
            </button>
            </div>

        `;
        
        // Add event listener to select button
        componentItem.querySelector('.select-component').addEventListener('click', function() {
            const componentType = this.getAttribute('data-type');
            filterProducts(componentType);
        });
        
        // Update the build summary
        updateBuildSummary();
        updateProgressBar();
        updatePowerAndCompatibility();

        // Reset border style
        componentItem.classList.add('border-dashed', 'border-slate-300');
        componentItem.classList.remove('border-solid', 'border-blue-200', 'bg-blue-50');
    }

    // Update the progress bar based on selected components
    function updateProgressBar() {
        const progressBar = document.querySelector('.progress-bar-fill');
        const progressText = document.querySelector('.progress-text');
        
        // Define essential and optional components
        const essentialComponents = ['PROCESSOR', 'MOTHERBOARD', 'RAM', 'GRAPHIC CARDS', 'STORAGE & NAS', 'POWER SUPPLY', 'CASINGS'];
        const optionalComponents = ['COOLING & LIGHTING', 'MONITORS & ACCESSORIES'];
        
        // Count selected components
        const selectedEssential = essentialComponents.filter(type => currentBuild[type]).length;
        const selectedOptional = optionalComponents.filter(type => currentBuild[type]).length;
        
        // Calculate progress (80% for essential, 20% for optional)
        const essentialProgress = (selectedEssential / essentialComponents.length) * 80;
        const optionalProgress = (selectedOptional / optionalComponents.length) * 20;
        const totalProgress = essentialProgress + optionalProgress;
        
        // Update progress bar width
        progressBar.style.width = `${totalProgress}%`;
        
        // Update progress text based on completion level
        let progressMessage = "Select components to begin";
        
        if (totalProgress == 100) {
            progressMessage = "Build complete! Ready to order";
            progressBar.classList.remove('bg-black');
            progressBar.classList.add('bg-green-500');
        } else if (totalProgress >= 70) {
            progressMessage = "Almost there! Just a few more components";
            progressBar.classList.remove('bg-black');
            progressBar.classList.add('bg-black');
        } else if (totalProgress >= 40) {
            progressMessage = "Good progress! Keep going";
            progressBar.classList.remove('bg-black');
            progressBar.classList.add('bg-black');
        } else if (totalProgress > 0) {
            progressMessage = "Getting started - select more components";
            progressBar.classList.remove('bg-black');
            progressBar.classList.add('bg-black');
        } else {
            progressBar.classList.remove('bg-green-500');
            progressBar.classList.add('bg-black');
        }
        
        progressText.textContent = progressMessage;
    }
    
    // Helper function to get icon for component type
    function getIconForType(type) {
        const icons = {
            'PROCESSOR': 'fas fa-microchip',
            'MOTHERBOARD': 'fas fa-memory',
            'RAM': 'fas fa-memory',
            'GRAPHIC CARDS': 'fas fa-tv',
            'STORAGE & NAS': 'fas fa-hdd',
            'POWER SUPPLY': 'fas fa-plug',
            'CASINGS': 'fas fa-cube',
            'COOLING & LIGHTING': 'fas fa-fan',
            'MONITORS & ACCESSORIES': 'fas fa-desktop'
        };
        return icons[type] || 'fas fa-microchip';
    }
    
    // Helper function to get display name for component type
    function getDisplayName(type) {
        const names = {
            'PROCESSOR': 'Processor',
            'MOTHERBOARD': 'Motherboard',
            'RAM': 'Memory (RAM)',
            'GRAPHIC CARDS': 'Graphics Card',
            'STORAGE & NAS': 'STORAGE & NAS',
            'POWER SUPPLY': 'Power Supply',
            'CASINGS': 'PC Case',
            'COOLING & LIGHTING': 'COOLING & LIGHTING',
            'MONITORS & ACCESSORIES': 'MONITORS & ACCESSORIES'
        };
        return names[type] || type;
    }
    
    // Update the build summary (total price)
    function updateBuildSummary() {
        let subtotal = 0;
        
        // Calculate subtotal
        for (const [type, product] of Object.entries(currentBuild)) {
            if (product) {
                subtotal += product.dis_price; // Use dis_price (number)
            }
        }
        
        // Update the UI
        document.getElementById('build-subtotal').textContent = `Rs. ${subtotal.toLocaleString()}`;
        document.getElementById('build-total').textContent = `Rs. ${(subtotal + 500).toLocaleString()}`;
    }
    
    // ─── Power & Compatibility ─────────────────────────────────────────────────

    // Standard PSU wattages to recommend
    const psuSteps = [400, 450, 500, 550, 600, 650, 750, 850, 1000, 1200, 1600];

    function recommendedPSU(totalWatts) {
        const needed = Math.ceil(totalWatts * 1.3); // 30% headroom
        return psuSteps.find(w => w >= needed) || psuSteps[psuSteps.length - 1];
    }

    // Default TDP estimates (W) per component type when power_consumption feature is absent
    const defaultTDP = {
        'PROCESSOR':          65,
        'GRAPHIC CARDS':     150,
        'MOTHERBOARD':        30,
        'RAM':                 5,
        'STORAGE & NAS':       5,
        'SSD NVME':            3,
        'HARD DISK':           8,
        'COOLING & LIGHTING':  5,
        'FANS':                2,
        'POWER SUPPLY':        0,
        'CASINGS':             0,
    };

    function updatePowerAndCompatibility() {
        // ── Power Calculation ──────────────────────────────────────────────────
        let totalPower = 20; // base system (motherboard, misc)

        for (const [type, product] of Object.entries(currentBuild)) {
            if (product) {
                const features = product.features || {};
                const tdp = parseFloat(features.power_consumption) || defaultTDP[type] || 0;
                totalPower += tdp;
            }
        }

        document.getElementById('total-power-draw').textContent = totalPower + 'W';

        // Power bar (cap visual at 1000W for display)
        const pct = Math.min((totalPower / 1000) * 100, 100);
        const bar = document.getElementById('power-bar');
        bar.style.width = pct + '%';
        bar.className = 'h-1.5 rounded-full transition-all duration-300 ' +
            (pct > 80 ? 'bg-red-500' : pct > 50 ? 'bg-yellow-500' : 'bg-green-500');

        // PSU recommendation
        const psuRec = document.getElementById('psu-recommendation');
        const psuWatt = document.getElementById('psu-rec-wattage');
        if (totalPower > 20) {
            const rec = recommendedPSU(totalPower);
            psuWatt.textContent = rec + 'W';
            psuRec.style.display = 'block';

            // Warn if selected PSU is underpowered
            const psu = currentBuild['POWER SUPPLY'];
            if (psu && psu.features && psu.features.wattage_w) {
                const selectedWatt = parseInt(psu.features.wattage_w);
                if (selectedWatt < totalPower * 1.2) {
                    psuWatt.style.color = '#ef4444';
                    psuWatt.textContent = rec + 'W ⚠ Selected PSU may be underpowered!';
                } else {
                    psuWatt.style.color = '';
                }
            }
        } else {
            psuRec.style.display = 'none';
        }

        // ── Compatibility Checks ───────────────────────────────────────────────
        const warnings = [];
        const cpu = currentBuild['PROCESSOR'];
        const mobo = currentBuild['MOTHERBOARD'];
        const ram = currentBuild['RAM'];
        const cas = currentBuild['CASINGS'];
        const cool = currentBuild['COOLING & LIGHTING'];

        // CPU ↔ Motherboard socket
        if (cpu && mobo) {
            const cpuSocket = (cpu.features || {}).socket_type;
            const moboSocket = (mobo.features || {}).socket_type;
            if (cpuSocket && moboSocket && cpuSocket !== moboSocket) {
                warnings.push({
                    color: '#ef4444',
                    icon: '⚠',
                    msg: `Socket mismatch: CPU is <b>${cpuSocket}</b> but Motherboard supports <b>${moboSocket}</b>`
                });
            }
        }

        // RAM ↔ Motherboard RAM type
        if (ram && mobo) {
            const ramType = (ram.features || {}).ram_type;
            const moboRam = (mobo.features || {}).supported_ram_type;
            if (ramType && moboRam && ramType !== moboRam) {
                warnings.push({
                    color: '#ef4444',
                    icon: '⚠',
                    msg: `RAM type mismatch: RAM is <b>${ramType}</b> but Motherboard supports <b>${moboRam}</b>`
                });
            }
        }

        // RAM ↔ CPU compatible RAM type
        if (ram && cpu) {
            const ramType = (ram.features || {}).ram_type;
            const cpuRam = (cpu.features || {}).compatible_ram_type;
            if (ramType && cpuRam && !cpuRam.includes(ramType)) {
                warnings.push({
                    color: '#f59e0b',
                    icon: 'ℹ',
                    msg: `RAM type <b>${ramType}</b> may not be compatible with this CPU (supports <b>${cpuRam}</b>)`
                });
            }
        }

        // Case ↔ Motherboard form factor
        if (cas && mobo) {
            const moboForm = (mobo.features || {}).form_factor;
            const caseSupport = (cas.features || {}).form_factor_support;
            if (moboForm && caseSupport) {
                const formRank = { 'Mini-ITX': 1, 'mATX': 2, 'ATX': 3, 'E-ATX': 4 };
                const caseRankMap = { 'Mini-ITX': 1, 'mATX': 2, 'ATX': 3, 'E-ATX': 4 };
                if ((caseRankMap[caseSupport] || 0) < (formRank[moboForm] || 0)) {
                    warnings.push({
                        color: '#ef4444',
                        icon: '⚠',
                        msg: `Case incompatible: supports up to <b>${caseSupport}</b> but Motherboard is <b>${moboForm}</b>`
                    });
                }
            }
        }

        // Cooler ↔ CPU socket
        if (cool && cpu) {
            const cpuSocket = (cpu.features || {}).socket_type;
            const coolSockets = (cool.features || {}).socket_compatibility || '';
            if (cpuSocket && coolSockets && !coolSockets.includes(cpuSocket)) {
                warnings.push({
                    color: '#f59e0b',
                    icon: '⚠',
                    msg: `Cooler may not support CPU socket <b>${cpuSocket}</b>. Check compatibility.`
                });
            }
        }

        // Render warnings
        const warnContainer = document.getElementById('compatibility-warnings');
        warnContainer.innerHTML = '';
        warnings.forEach(w => {
            const div = document.createElement('div');
            div.style.cssText = `font-size:11px; padding:4px 8px; border-radius:6px; background:${w.color}15; color:${w.color}; border:1px solid ${w.color}40;`;
            div.innerHTML = `${w.icon} ${w.msg}`;
            warnContainer.appendChild(div);
        });

        if (warnings.length === 0 && (cpu || mobo || ram)) {
            const ok = document.createElement('div');
            ok.style.cssText = 'font-size:11px; padding:4px 8px; border-radius:6px; background:#10b98115; color:#10b981; border:1px solid #10b98140;';
            ok.textContent = '✓ No compatibility issues detected';
            warnContainer.appendChild(ok);
        }
    }

    // Reset the entire build
    function resetBuild() {
        if (confirm('Are you sure you want to reset your build? All selected components will be removed.')) {
            for (const type in currentBuild) {
                if (currentBuild[type]) {
                    removeFromBuild(type);
                }
            }
            buildArray = []; // Clear buildArray as well
        }
    }
    
    // Add the complete build to cart
    function addBuildToCart() {
        // Check if essential components are selected
        const essentialComponents = ['PROCESSOR', 'MOTHERBOARD', 'RAM', 'STORAGE & NAS', 'POWER SUPPLY', 'CASINGS'];
        const missingComponents = essentialComponents.filter(type => !currentBuild[type]);
        
        if (missingComponents.length > 0) {
            alert(`Please select all essential components before adding to cart. Missing: ${missingComponents.map(getDisplayName).join(', ')}`);
            return;
        }
        
        // Get existing cart or initialize new one
        let cart = JSON.parse(localStorage.getItem('shopping-cart') || '[]');
        
        // Add each item from buildArray to cart
        buildArray.forEach(item => {
            const existingCartItem = cart.find(cartItem => cartItem.id === item.id);
            if (existingCartItem) {
                existingCartItem.quantity += 1;
            } else {
                cart.push({
                    id: item.id,
                    name: item.name,
                    price: item.price.toString(), // Convert to string for /cart page compatibility
                    image: item.image,
                    quantity: 1
                });
            }
        });
        
        // Save cart to localStorage
        localStorage.setItem('shopping-cart', JSON.stringify(cart));
        
        // Show success modal
        showSuccessModal();
    }

    // Show success modal
    // ─── AI PC Advisor ─────────────────────────────────────────────────────────

    let currentAdvisorTier = null;
    let currentAdvisorData = null;

    // Derive storage preference keyword from V3 recommendation
    function getStoragePref() {
        if (currentAdvisorData) {
            const rec = (currentAdvisorData.storage_type?.recommendation || '').toLowerCase();
            if (rec.includes('nvme') || rec.includes('pcie')) return 'nvme';
            if (rec.includes('hdd') || rec.includes('7200rpm') || rec.includes('emmc')) return 'hdd';
            return 'ssd';
        }
        return 'ssd';
    }

    // Parse wattage number from a PSU product name (e.g. "550 WATT", "750W")
    function parsePsuWattage(name) {
        const m = name.match(/(\d{3,4})\s*(?:w(?:att)?)/i);
        return m ? parseInt(m[1]) : null;
    }

    const tierMinPsuWatt = { 0: 450, 1: 550, 2: 750, 3: 850 };

    // Tier → price percentile target (0.0 = cheapest, 1.0 = most expensive)
    // Budget picks bottom ~20%, Mid ~45%, High-End ~70%, Workstation ~90%
    const tierPercentile = { 0: 0.20, 1: 0.45, 2: 0.70, 3: 0.90 };

    const workloadLabels = { 1: 'Very Light', 2: 'Light', 3: 'Moderate', 4: 'Heavy', 5: 'Extreme' };

    function updateWorkloadLabel(val) {
        document.getElementById('adv-workload-label').textContent = workloadLabels[val];
    }

    function toggleAdvisor() {
        const panel   = document.getElementById('advisor-panel');
        const chevron = document.getElementById('advisor-chevron');
        const btn     = document.getElementById('advisor-toggle-btn');
        const open    = !panel.classList.contains('hidden');
        panel.classList.toggle('hidden', open);
        chevron.className = open
            ? 'fas fa-chevron-down text-[10px] ml-1'
            : 'fas fa-chevron-up text-[10px] ml-1';
        btn.firstChild.textContent = open ? 'Get Advice ' : 'Close ';
    }

    // Local fallback: derive tier from budget key (1-6) + workload
    function localPredictTier(budget, workload, multiApp) {
        let tier = budget <= 1 ? 0 : budget <= 3 ? 1 : budget <= 5 ? 2 : 3;
        if (workload >= 5 && tier < 3) tier = Math.min(tier + 1, 3);
        return tier;
    }

    const tierMeta = {
        0: {
            name: 'Budget Build', emoji: '💻',
            color: '#374151', bg: '#f9fafb', border: '#d1d5db',
            headerBg: '#f3f4f6', badgeBg: '#374151',
            priceMin: 'LKR 80,000', priceMax: 'LKR 130,000',
            specs: [
                { icon: '🧠', label: 'CPU', value: 'i3-12100 / Ryzen 3' },
                { icon: '💾', label: 'RAM', value: '8 GB DDR4' },
                { icon: '🖥️', label: 'GPU', value: 'Integrated Graphics' },
                { icon: '💽', label: 'Storage', value: '256 GB SATA SSD' },
            ],
            tip: 'Great for email, web, office tasks. Ensure MB supports RAM upgrade for future-proofing.'
        },
        1: {
            name: 'Mid-Range Build', emoji: '🖥️',
            color: '#111827', bg: '#f3f4f6', border: '#9ca3af',
            headerBg: '#e5e7eb', badgeBg: '#111827',
            priceMin: 'LKR 130,000', priceMax: 'LKR 220,000',
            specs: [
                { icon: '🧠', label: 'CPU', value: 'i5-13500 / Ryzen 5' },
                { icon: '💾', label: 'RAM', value: '16 GB DDR4/DDR5' },
                { icon: '🖥️', label: 'GPU', value: 'GTX 1660 / RX 6600' },
                { icon: '💽', label: 'Storage', value: '512 GB NVMe SSD' },
            ],
            tip: 'Dual-channel RAM (2×8 GB) gives a noticeable performance boost over a single stick.'
        },
        2: {
            name: 'High-End Build', emoji: '⚡',
            color: '#030712', bg: '#e5e7eb', border: '#6b7280',
            headerBg: '#d1d5db', badgeBg: '#030712',
            priceMin: 'LKR 220,000', priceMax: 'LKR 340,000',
            specs: [
                { icon: '🧠', label: 'CPU', value: 'i7-13700K / Ryzen 7' },
                { icon: '💾', label: 'RAM', value: '32 GB DDR5' },
                { icon: '🖥️', label: 'GPU', value: 'RTX 4060 / RX 7700' },
                { icon: '💽', label: 'Storage', value: '1 TB NVMe PCIe 4.0' },
            ],
            tip: 'Add a 240mm AIO cooler to sustain peak boost clocks on your i7 or Ryzen 7.'
        },
        3: {
            name: 'Workstation', emoji: '🚀',
            color: '#fff', bg: '#111827', border: '#374151',
            headerBg: '#1f2937', badgeBg: '#000',
            priceMin: 'LKR 340,000', priceMax: 'LKR 600,000+',
            specs: [
                { icon: '🧠', label: 'CPU', value: 'i9-13900K / Ryzen 9' },
                { icon: '💾', label: 'RAM', value: '64 GB DDR5' },
                { icon: '🖥️', label: 'GPU', value: 'RTX 4080 / RTX A-series' },
                { icon: '💽', label: 'Storage', value: '2 TB NVMe + 4 TB HDD' },
            ],
            tip: 'Consider a 2000VA UPS for power protection — essential for Sri Lanka power fluctuations.'
        }
    };

    async function getAIRecommendation() {
        const job      = document.getElementById('adv-job').value;
        const activity = document.getElementById('adv-activity').value;
        const software = document.getElementById('adv-software').value;
        const budget   = parseInt(document.getElementById('adv-budget').value);
        const hours    = parseInt(document.getElementById('adv-hours').value);
        const multiApp = parseInt(document.getElementById('adv-multiapp').value);
        const fileSize = parseInt(document.getElementById('adv-filesize').value);
        const workload = parseInt(document.getElementById('adv-workload').value);

        if (!job || !activity || !software || !budget || !hours || !fileSize) {
            const btn = document.getElementById('adv-submit-btn');
            btn.textContent = '⚠️ Please fill all fields!';
            setTimeout(() => { btn.innerHTML = '<i class="fas fa-magic text-xs"></i> Analyse My Needs'; }, 2000);
            return;
        }

        const btn = document.getElementById('adv-submit-btn');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin text-xs"></i> Analysing...';
        btn.disabled = true;

        let tier, confidence, sourceTag, v3Data = null;

        try {
            const res = await fetch('/pc-advisor/predict', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ job, activity, software, workload, hours, multiApp, budget, fileSize })
            });
            if (!res.ok) throw new Error('API error');
            const json = await res.json();
            if (json.error) throw new Error(json.error);

            v3Data = json;

            // Map V3 component tier labels → UI tier index (0–3)
            const cpuLabel = (json.cpu?.tier || '').toLowerCase();
            const gpuLabel = (json.gpu?.tier || '').toLowerCase();
            let rawTier;
            if (cpuLabel.includes('entry') && gpuLabel.includes('integrated'))    rawTier = 0;
            else if (cpuLabel.includes('entry') || gpuLabel.includes('integrated')) rawTier = 1;
            else if (cpuLabel.includes('mid'))                                     rawTier = 1;
            else if (cpuLabel.includes('high') && !gpuLabel.includes('high-end')) rawTier = 2;
            else                                                                    rawTier = 3;

            // Budget hard cap
            const maxTier = budget <= 1 ? 0 : budget <= 3 ? 1 : budget <= 5 ? 2 : 3;
            tier = Math.min(rawTier, maxTier);

            // Average confidence across all 5 predicted components
            const confs = [json.cpu?.confidence, json.ram?.confidence, json.storage_type?.confidence, json.storage_size?.confidence, json.gpu?.confidence].filter(v => v != null);
            confidence = confs.length ? Math.round(confs.reduce((a, b) => a + b, 0) / confs.length) : 80;
            sourceTag  = 'ml';
        } catch (e) {
            tier       = localPredictTier(budget, workload, multiApp);
            confidence = Math.floor(82 + Math.random() * 10);
            sourceTag  = 'local';
        }

        btn.innerHTML = '<i class="fas fa-magic text-xs"></i> Analyse My Needs';
        btn.disabled = false;

        renderAdvisorResult(tier, confidence, sourceTag, job, v3Data);
    }

    // Job-specific tips keyed to V3 job option values
    const jobTips = {
        office:      'An i3 / Ryzen 3 handles Word, Excel, Teams and web browsing smoothly. Invest saved budget in a good monitor and ergonomic setup instead.',
        student:     'Prioritise battery life (6+ hrs) over raw specs. Bring your student ID to Softlogic or Micro Group for university discounts.',
        software_dev:'Dual-channel RAM matters more than clock speed. Add a second monitor — productivity gains are immediate and significant.',
        data_ml:     'More RAM is almost always worth it for data work. A dedicated GPU helps if you run CUDA-accelerated libraries (PyTorch, RAPIDS).',
        designer:    'Invest in a colour-accurate IPS or OLED display — your screen matters more than your GPU for most design work.',
        game_dev:    'A fast NVMe SSD cuts asset compile times dramatically. Consider at least RTX 3060 for real-time rendering in Unreal or Blender.',
        mobile_dev:  'An SSD and at least 16 GB RAM will keep Android Studio and emulators running smoothly. A second monitor helps significantly.',
        cad_3d:      'Fast single-core performance matters most for CAD work. More RAM is crucial for large assemblies — 32 GB minimum recommended.',
        it_admin:    'Reliability beats raw performance here. Look for ECC RAM support and a quality PSU — downtime is more costly than hardware.',
        other:       'Focus budget on the CPU and RAM first; storage and GPU can be upgraded more easily later.',
    };

    function renderAdvisorResult(tier, confidence, sourceTag, job, v3Data = null) {
        currentAdvisorTier = tier;
        currentAdvisorData = v3Data;
        const meta = tierMeta[tier];

        // Tier header row — B&W scheme
        const tierHeader = document.getElementById('adv-tier-header');
        tierHeader.style.cssText = `background:${meta.headerBg}; border:1px solid ${meta.border}; border-radius:12px; padding:12px 14px; margin-bottom:12px;`;

        document.getElementById('adv-tier-emoji').textContent = meta.emoji;
        const tierNameEl = document.getElementById('adv-tier-name');
        tierNameEl.textContent = meta.name;
        tierNameEl.style.color = meta.color;

        const badge = document.getElementById('adv-confidence-badge');
        badge.textContent = confidence + '% match';
        badge.style.cssText = `background:${meta.badgeBg}; color:#fff; border-radius:999px; padding:2px 8px; font-size:10px; font-weight:700;`;

        const priceBox = document.getElementById('adv-price-range-box');
        priceBox.style.cssText = `background:${meta.bg}; border:1px solid ${meta.border}; border-radius:12px; padding:8px 12px; margin-bottom:12px; display:flex; align-items:center; gap:8px;`;

        // Calculate live price range from actual catalog products
        const estimatedTotal = previewBuildTotal(tier);
        let priceRangeText;
        if (estimatedTotal > 0) {
            const low  = Math.round(estimatedTotal * 0.92 / 1000) * 1000;
            const high = Math.round(estimatedTotal * 1.08 / 1000) * 1000;
            priceRangeText = 'LKR ' + low.toLocaleString() + ' – LKR ' + high.toLocaleString();
        } else {
            priceRangeText = `${meta.priceMin} – ${meta.priceMax}`;
        }
        document.getElementById('adv-price-range').textContent = priceRangeText;
        document.getElementById('adv-price-range').style.color = meta.color;

        const specsGrid = document.getElementById('adv-specs-grid');
        let displaySpecs;
        if (v3Data) {
            const storageVal = [v3Data.storage_type?.recommendation, v3Data.storage_size?.recommendation].filter(Boolean).join(' · ');
            displaySpecs = [
                { icon: '🧠', label: 'CPU',     value: v3Data.cpu?.recommendation  || meta.specs[0].value },
                { icon: '💾', label: 'RAM',     value: v3Data.ram?.recommendation  || meta.specs[1].value },
                { icon: '🖥️', label: 'GPU',     value: v3Data.gpu?.recommendation  || meta.specs[2].value },
                { icon: '💽', label: 'Storage', value: storageVal                  || meta.specs[3].value },
            ];
        } else {
            displaySpecs = meta.specs;
        }
        specsGrid.innerHTML = displaySpecs.map(s => `
            <div style="display:flex;align-items:center;gap:8px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:10px;padding:8px 10px;">
                <span style="font-size:16px;">${s.icon}</span>
                <div>
                    <p style="font-size:9px;color:#9ca3af;font-weight:600;text-transform:uppercase;letter-spacing:.04em;">${s.label}</p>
                    <p style="font-size:11px;font-weight:700;color:#111827;">${s.value}</p>
                </div>
            </div>
        `).join('');

        const tip = (job && jobTips[job]) ? jobTips[job] : meta.tip;
        document.getElementById('adv-tip').innerHTML = `<i class="fas fa-lightbulb mr-1" style="color:#6b7280;"></i> <strong>Tip:</strong> ${tip}`;
        document.getElementById('adv-source-tag').innerHTML =
            `<span style="font-size:10px;color:#111827;font-weight:600;">⚡ Powered by NovaLink Computer AI</span><br>
             <span style="font-size:9px;color:#9ca3af;">AI can make mistakes — use this as a reference only, not a final specification.</span>`;

        document.getElementById('advisor-result').classList.remove('hidden');
        document.getElementById('advisor-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // Shared storage filter — applied by filterStorageProducts()
    const nvmeKws = ['nvme', 'm.2', 'pcie'];
    const hddKws  = ['hdd', 'hard drive', 'rpm', '7200rpm'];

    function filterStorageProducts(products, pref) {
        const n = name => name.toLowerCase();
        if (pref === 'nvme') {
            const f = products.filter(p => nvmeKws.some(kw => n(p.name).includes(kw)));
            return f.length > 0 ? f : products;
        }
        if (pref === 'hdd') {
            const f = products.filter(p => hddKws.some(kw => n(p.name).includes(kw)));
            return f.length > 0 ? f : products;
        }
        // ssd: has 'ssd' but not any NVMe indicator
        const f = products.filter(p => {
            const nm = n(p.name);
            return nm.includes('ssd') && !nvmeKws.some(kw => nm.includes(kw));
        });
        return f.length > 0 ? f : products;
    }
    const cpuTierKeywords = {
        0: ['i3', 'ryzen 3', 'pentium', 'celeron'],
        1: ['i5', 'ryzen 5'],
        2: ['i7', 'ryzen 7'],
        3: ['i9', 'ryzen 9', 'threadripper', 'xeon']
    };

    // Derive CPU filter keywords from the actual V3 recommendation text
    function getCpuKeywords(tier) {
        if (currentAdvisorData?.cpu?.recommendation) {
            const rec = currentAdvisorData.cpu.recommendation.toLowerCase();
            if (rec.includes('xeon') || rec.includes('threadripper')) return ['xeon', 'threadripper'];
            if (rec.includes('i9')   || rec.includes('ryzen 9'))      return ['i9', 'ryzen 9'];
            if (rec.includes('i7')   || rec.includes('ryzen 7'))      return ['i7', 'ryzen 7'];
            if (rec.includes('i5')   || rec.includes('ryzen 5'))      return ['i5', 'ryzen 5'];
            if (rec.includes('i3')   || rec.includes('ryzen 3'))      return ['i3', 'ryzen 3'];
        }
        return cpuTierKeywords[tier ?? currentAdvisorTier] || [];
    }

    // Returns null = skip GPU (integrated), [] = no filter, [kws] = filter by model keywords
    function getGpuKeywords() {
        if (!currentAdvisorData) return [];
        const gpuTier = (currentAdvisorData.gpu?.tier || '').toLowerCase();
        if (gpuTier.includes('integrated')) return null; // no discrete GPU needed
        const rec = (currentAdvisorData.gpu?.recommendation || '').toLowerCase();
        // Extract model string e.g. "rtx 4060", "rx 6700 xt", "gtx 1650"
        const m = rec.match(/((?:rtx|gtx)\s+\d+(?:\s*(?:ti|super))?|rx\s+\d+(?:\s+(?:xt|xtx|gre))?)/i);
        return m ? [m[1].toLowerCase()] : [];
    }

    // Extract target RAM GB from V3 recommendation (e.g. "32GB+ DDR4/DDR5" → 32)
    function getTargetRamGb() {
        if (!currentAdvisorData?.ram?.recommendation) return null;
        const m = currentAdvisorData.ram.recommendation.match(/(\d+)\s*gb/i);
        return m ? parseInt(m[1]) : null;
    }

    // Extract the TOTAL kit capacity from a RAM product name.
    // Product names always list total capacity first (e.g. "64GB (2x32GB)"),
    // so the first GB number in the string is the total.
    function getProductRamGb(name) {
        const m = name.match(/(\d+)\s*GB/i);
        return m ? parseInt(m[1]) : null;
    }

    // Calculate what auto-select would cost without actually selecting anything
    function previewBuildTotal(tier) {
        const essentialTypes = ['PROCESSOR', 'MOTHERBOARD', 'RAM', 'GRAPHIC CARDS', 'STORAGE & NAS', 'POWER SUPPLY', 'CASINGS'];
        const targetPct = tierPercentile[tier];
        const storagePref = getStoragePref();
        const minPsuW = tierMinPsuWatt[tier] || 550;
        let total = 0;

        essentialTypes.forEach(type => {
            const cards = Array.from(document.querySelectorAll(`.product-card[data-type="${type}"]`));
            if (cards.length === 0) return;

            let products = cards.map(card => {
                const btn = card.querySelector('.add-to-build-btn');
                if (!btn) return null;
                const price = parseFloat(btn.getAttribute('data-price'));
                return { name: btn.getAttribute('data-name'), dis_price: price };
            }).filter(p => p && !isNaN(p.dis_price));

            if (products.length === 0) return;

            if (type === 'STORAGE & NAS') {
                products = filterStorageProducts(products, storagePref);
            }
            if (type === 'PROCESSOR') {
                const kws = getCpuKeywords(tier);
                if (kws.length > 0) {
                    const f = products.filter(p => kws.some(kw => p.name.toLowerCase().includes(kw)));
                    if (f.length > 0) products = f;
                }
            }
            if (type === 'RAM') {
                const targetGb = getTargetRamGb();
                if (targetGb !== null) {
                    // Prefer exact total-capacity match; fall back to ≥ target if none found
                    let f = products.filter(p => getProductRamGb(p.name) === targetGb);
                    if (f.length === 0)
                        f = products.filter(p => { const gb = getProductRamGb(p.name); return gb !== null && gb >= targetGb; });
                    if (f.length > 0) products = f;
                }
            }
            if (type === 'GRAPHIC CARDS') {
                const gpuKws = getGpuKeywords();
                if (gpuKws === null) return; // integrated GPU — skip GPU cost
                if (gpuKws.length > 0) {
                    const f = products.filter(p => gpuKws.some(kw => p.name.toLowerCase().includes(kw)));
                    if (f.length > 0) products = f;
                }
            }
            if (type === 'POWER SUPPLY') {
                const f = products.filter(p => {
                    const w = parsePsuWattage(p.name);
                    return w !== null && w >= minPsuW;
                });
                if (f.length > 0) products = f;
            }

            products.sort((a, b) => a.dis_price - b.dis_price);
            const idx = Math.min(Math.floor(products.length * targetPct), products.length - 1);
            total += products[idx].dis_price;
        });

        return total;
    }

    function autoSelectComponents() {
        if (currentAdvisorTier === null) return;

        const essentialTypes = ['PROCESSOR', 'MOTHERBOARD', 'RAM', 'GRAPHIC CARDS', 'STORAGE & NAS', 'POWER SUPPLY', 'CASINGS'];
        const targetPct = tierPercentile[currentAdvisorTier];
        const selected = [];

        const storagePreference = getStoragePref();
        const minPsuW = tierMinPsuWatt[currentAdvisorTier] || 550;

        essentialTypes.forEach(type => {
            // Collect all product cards of this type
            const cards = Array.from(document.querySelectorAll(`.product-card[data-type="${type}"]`));
            if (cards.length === 0) return;

            // Pull data from each card's add-to-build button
            let products = cards.map(card => {
                const btn = card.querySelector('.add-to-build-btn');
                if (!btn) return null;
                const price = parseFloat(btn.getAttribute('data-price'));
                let features = {};
                try { features = JSON.parse(btn.getAttribute('data-features') || '{}'); } catch(e) {}
                return {
                    id:       btn.getAttribute('data-id'),
                    name:     btn.getAttribute('data-name'),
                    dis_price: price,
                    image:    btn.getAttribute('data-image'),
                    type:     btn.getAttribute('data-type'),
                    features: features
                };
            }).filter(p => p && !isNaN(p.dis_price));

            if (products.length === 0) return;

            // Filter STORAGE by V3-recommended storage type (nvme/ssd/hdd)
            if (type === 'STORAGE & NAS') {
                products = filterStorageProducts(products, storagePreference);
            }

            // Filter PROCESSOR by CPU family from V3 recommendation
            if (type === 'PROCESSOR') {
                const keywords = getCpuKeywords(currentAdvisorTier);
                if (keywords.length > 0) {
                    const filtered = products.filter(p =>
                        keywords.some(kw => p.name.toLowerCase().includes(kw))
                    );
                    if (filtered.length > 0) products = filtered;
                }
            }

            // Filter RAM by V3 recommended capacity (8GB / 16GB / 32GB+)
            if (type === 'RAM') {
                const targetGb = getTargetRamGb();
                if (targetGb !== null) {
                    let f = products.filter(p => getProductRamGb(p.name) === targetGb);
                    if (f.length === 0)
                        f = products.filter(p => { const gb = getProductRamGb(p.name); return gb !== null && gb >= targetGb; });
                    if (f.length > 0) products = f;
                }
            }

            // Filter GRAPHIC CARDS by V3 GPU recommendation
            if (type === 'GRAPHIC CARDS') {
                const gpuKws = getGpuKeywords();
                if (gpuKws === null) return; // integrated GPU — no discrete card needed
                if (gpuKws.length > 0) {
                    const filtered = products.filter(p =>
                        gpuKws.some(kw => p.name.toLowerCase().includes(kw))
                    );
                    if (filtered.length > 0) products = filtered;
                }
            }

            // Filter POWER SUPPLY by minimum wattage parsed from product name
            if (type === 'POWER SUPPLY') {
                const filtered = products.filter(p => {
                    const w = parsePsuWattage(p.name);
                    return w !== null && w >= minPsuW;
                });
                if (filtered.length > 0) products = filtered;
            }

            // Sort by price ascending, pick the item at the target percentile
            products.sort((a, b) => a.dis_price - b.dis_price);
            const idx = Math.min(Math.floor(products.length * targetPct), products.length - 1);
            selected.push(products[idx]);
        });

        if (selected.length === 0) {
            alert('No products found in the catalog to auto-select.');
            return;
        }

        // Reset current build first, then add selected items
        for (const type in currentBuild) {
            if (currentBuild[type]) removeFromBuild(type);
        }

        selected.forEach(product => addToBuild(product.type, product));

        // Visual feedback on the button
        const btn = document.getElementById('adv-auto-select-btn');
        btn.innerHTML = '<i class="fas fa-check text-xs"></i> Components Selected!';
        btn.style.background = '#16a34a';
        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-magic text-xs"></i> Auto-Select Components for This Tier';
            btn.style.background = '#000';
        }, 3000);

        // Scroll sidebar into view so user sees the filled build
        document.getElementById('build-components').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function resetAdvisor() {
        document.getElementById('advisor-result').classList.add('hidden');
        document.getElementById('adv-job').value      = '';
        document.getElementById('adv-activity').value = '';
        document.getElementById('adv-software').value = '';
        document.getElementById('adv-budget').value   = '';
        document.getElementById('adv-hours').value    = '5';
        document.getElementById('adv-multiapp').value = '2';
        document.getElementById('adv-filesize').value = '';
        document.getElementById('adv-workload').value = 3;
        updateWorkloadLabel(3);
        currentAdvisorTier = null;
        currentAdvisorData = null;
    }

    // ─── End AI PC Advisor ─────────────────────────────────────────────────────

    function showSuccessModal() {
        const modal = document.getElementById('pcBuildSuccessModal');
        if (!modal) {
            console.error('Success modal not found in DOM. Ensure <div id="pcBuildSuccessModal"> is present in the HTML.');
            alert('Your custom PC build has been added to your cart, but the success modal could not be displayed.');
            return;
        }
        
        const buildItemsContainer = modal.querySelector('.build-items');
        if (!buildItemsContainer) {
            console.error('Build items container (.build-items) not found in modal.');
            alert('Your custom PC build has been added to your cart, but the success modal could not be displayed correctly.');
            return;
        }
        
        // Populate build items in modal
        buildItemsContainer.innerHTML = buildArray.map(item => `
            <div class="flex items-center py-2 border-b last:border-b-0">
                <img src="${item.image}" alt="${item.name}" class="w-8 h-8 object-contain rounded mr-3">
                <div>
                    <p class="text-sm font-medium">${item.name}</p>
                    <p class="text-xs text-gray-600">Rs. ${item.price.toLocaleString()}</p>
                </div>
            </div>
        `).join('');
        
        // Show modal
        modal.classList.remove('hidden');
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 5000);
    }
</script>

<style>
    .glass-effect {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>
</body>
</html>


