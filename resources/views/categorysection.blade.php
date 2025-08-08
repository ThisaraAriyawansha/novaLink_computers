<section class="py-12 px-4 max-w-6xl mx-auto">
    <div class="text-center mb-12">
        <h2 class="text-2xl font-light text-black mb-2" style="font-family: 'Orbitron', sans-serif;">Pro Categories</h2>
        <p class="text-black" style="font-family: 'Orbitron', sans-serif;">We use latest generation performance components and configurations to get you gaming fast.</p>
        <div class="w-10 h-px bg-black mx-auto"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Product 1 -->
        <div class="group">
            <div class="relative bg-white border border-gray-200 overflow-hidden mb-3">
                <img src="assets/images/category/GaminLap.jpg" 
                     alt="GaminLap" 
                     class="w-full h-64 object-cover">
                
            </div>
            
            <div class="space-y-2">
                <h3 class="text-base font-light text-black" style="font-family: 'Orbitron', sans-serif;">Laptops</h3>
                <p class="text-xs text-gray-600 font-light mb-2" style="font-size: 16px;">
                    High-performance laptops designed for both work and play — featuring the latest processors, powerful graphics, and all-day battery life to keep you productive and entertained anywhere.
                </p>
            <button 
                onclick="window.location.href='{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'LAPTOPS']) }}'" 
                style="width: 100%; padding: 10px; font-size: 14px; font-weight: 300; background-color: black; color: white; border: 1px solid black; cursor: pointer; transition: all 0.3s;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='black'; this.style.color='white';">
                Explore more
            </button>


            </div>
        </div>

        <!-- Product 2 -->
        <div class="group">
            <div class="relative bg-white border border-gray-200 overflow-hidden mb-3">
                <img src="assets/images/category/o202008121104564989.jpg" 
                     alt="Monitors" 
                     class="w-full h-64 object-cover">
                
            </div>
            
            <div class="space-y-2">
                <h3 class="text-base font-light text-black" style="font-family: 'Orbitron', sans-serif;">Monitors</h3>
                <p class="text-xs text-gray-600 font-light mb-2" style="font-size: 16px;">
                        Vibrant, high-resolution displays that bring every detail to life — perfect for boosting productivity, enjoying movies, gaming, and creating stunning visuals with true-to-life colors.
                </p>
            <button 
                onclick="window.location.href='{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'MONITORS & ACCESSORIES']) }}'" 
                style="width: 100%; padding: 10px; font-size: 14px; font-weight: 300; background-color: black; color: white; border: 1px solid black; cursor: pointer; transition: all 0.3s;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='black'; this.style.color='white';">
                Explore more
            </button>


            </div>
        </div>

        <!-- Product 3 -->
        <div class="group">
            <div class="relative bg-white border border-gray-200 overflow-hidden mb-3">
                <img src="assets/images/category/resize.webp" 
                     alt="Coolers" 
                     class="w-full h-64 object-cover">
                
            </div>
            
            <div class="space-y-2">
                <h3 class="text-base font-light text-black" style="font-family: 'Orbitron', sans-serif;">Coolers</h3>
                <p class="text-xs text-gray-600 font-light mb-2" style="font-size: 16px;">
                        Efficient cooling solutions designed to keep your PC running at peak performance ensuring lower temperatures and extended hardware lifespan, even during intense gaming or heavy workloads.
                </p>
            <button 
                onclick="window.location.href='{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'COOLING & LIGHTING']) }}'" 
                style="width: 100%; padding: 10px; font-size: 14px; font-weight: 300; background-color: black; color: white; border: 1px solid black; cursor: pointer; transition: all 0.3s;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='black'; this.style.color='white';">
                Explore more
            </button>


            </div>
        </div>

        <!-- Product 4 -->
        <div class="group">
            <div class="relative bg-white border border-gray-200 overflow-hidden mb-3">
                <img src="assets/images/category/ramm.png" 
                     alt="RAM" 
                     class="w-full h-64 object-cover">
                
            </div>
            
            <div class="space-y-2">
                <h3 class="text-base font-light text-black" style="font-family: 'Orbitron', sans-serif;">RAM</h3>
                <p class="text-xs text-gray-600 font-light mb-2" style="font-size: 16px;">
                    High-speed memory that ensures seamless multitasking, and smooth performance giving you the power to handle demanding applications, intense gaming, and creative workloads without slowdowns.
                </p>
            <button 
                onclick="window.location.href='{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'RAM']) }}'" 
                style="width: 100%; padding: 10px; font-size: 14px; font-weight: 300; background-color: black; color: white; border: 1px solid black; cursor: pointer; transition: all 0.3s;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='black'; this.style.color='white';">
                Explore more
            </button>


            </div>
        </div>

        <!-- Product 5 -->
        <div class="group">
            <div class="relative bg-white border border-gray-200 overflow-hidden mb-3">
                <img src="assets/images/category/gpu.webp" 
                     alt="gpu" 
                     class="w-full h-64 object-cover">
                
            </div>
            
            <div class="space-y-2">
                <h3 class="text-base font-light text-black" style="font-family: 'Orbitron', sans-serif;">GPU</h3>
                <p class="text-xs text-gray-600 font-light mb-2" style="font-size: 16px;">
                    Powerful graphics that deliver stunning visuals, smooth frame rates, and exceptional detail — perfect for immersive gaming, high-end video editing, 3D rendering, and bringing your creative visions to life.
                </p>
            <button 
                onclick="window.location.href='{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GRAPHIC CARDS']) }}'" 
                style="width: 100%; padding: 10px; font-size: 14px; font-weight: 300; background-color: black; color: white; border: 1px solid black; cursor: pointer; transition: all 0.3s;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='black'; this.style.color='white';">
                Explore more
            </button>


            </div>
        </div>

        <!-- Product 6 -->
        <div class="group">
            <div class="relative bg-white border border-gray-200 overflow-hidden mb-3">
                <img src="assets/images/category/a6ed71bb083dff602ab3c7a531da65e6.avif" 
                     alt="Motherboard" 
                     class="w-full h-64 object-cover">
                
            </div>
            
            <div class="space-y-2">
                <h3 class="text-base font-light text-black" style="font-family: 'Orbitron', sans-serif;">Motherboard</h3>
                <p class="text-xs text-gray-600 font-light mb-2" style="font-size: 16px;">
                    Durable motherboards equipped with the latest technology, offering excellent connectivity, expansion options, and stable power delivery to support high-performance PC builds.
                </p>
            <button 
                onclick="window.location.href='{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'MOTHERBOARD']) }}'" 
                style="width: 100%; padding: 10px; font-size: 14px; font-weight: 300; background-color: black; color: white; border: 1px solid black; cursor: pointer; transition: all 0.3s;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='black'; this.style.color='white';">
                Explore more
            </button>


            </div>
        </div>


    </div>
</section>