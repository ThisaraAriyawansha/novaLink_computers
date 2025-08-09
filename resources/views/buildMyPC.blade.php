<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaLink Computers | Best Computers for you</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
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
                                        data-image="{{ $product['image'] }}">
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

                
                <div class="mt-4 pt-4 border-t border-slate-200">
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
                const productPrice = parseFloat(this.getAttribute('data-price')); // Ensure price is a number
                const productImage = this.getAttribute('data-image');
                
                addToBuild(productType, {
                    id: productId,
                    name: productName,
                    dis_price: productPrice, // Store as number
                    image: productImage
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
        // Validate product object
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


