
<div style="background-color: #000000; min-height: 100vh; margin: 0; padding: 0;">   
    <div style="display: flex; align-items: flex-start; max-width: 1200px; margin: 0 auto; gap: 30px; background-color: #000000; flex-direction: row;">
        <div style="flex: 1;">
            <img src="assets/images/banner/jhjggg.png" alt="Custom PC Build" style="max-width: 100%; max-height: 100vh; border-radius: 8px;">
        </div>
            <div style="flex: 1; display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 10%; margin-left: 2%;">
                
                <div style="padding: 5%; margin: 0;">
                    <h3 style="margin-top: 0; color: #ffffff; font-size: 18px; display: flex; align-items: center; gap: 10px; font-family: 'Orbitron', sans-serif;">
                        <i class="fas fa-tools" style="color: #ffffff; font-size: 30px;"></i> Custom PC Solutions
                    </h3>
                    <p style="color: #8b8b8b; line-height: 1.5; margin-bottom: 0; font-size: 15px; padding-left: 20px;">
                        From gaming rigs to professional workstations, we build PCs tailored to your exact needs. Pick your dream specs and let us bring it to life.
                    </p>
                </div>

                <div style="padding: 5%; margin: 0;">
                    <h3 style="margin-top: 0; color: #ffffff; font-size: 18px; display: flex; align-items: center; gap: 10px; font-family: 'Orbitron', sans-serif;">
                        <i class="fas fa-microchip" style="color: #ffffff; font-size: 30px;"></i> Premium Hardware
                    </h3>
                    <p style="color: #8b8b8b; line-height: 1.5; margin-bottom: 0; font-size: 15px; padding-left: 20px;">
                        We source only the latest and most reliable components — ensuring maximum performance, durability, and future-ready upgrades.
                    </p>
                </div>

                <div style="padding: 5%; margin: 0;">
                    <h3 style="margin-top: 0; color: #ffffff; font-size: 18px; display: flex; align-items: center; gap: 10px; font-family: 'Orbitron', sans-serif;">
                        <i class="fas fa-headset" style="color: #ffffff; font-size: 30px;"></i> Dedicated Support
                    </h3>
                    <p style="color: #8b8b8b; line-height: 1.5; margin-bottom: 0; font-size: 15px; padding-left: 20px;">
                        Our experts are ready to assist you — from choosing parts to post-purchase troubleshooting — so you can enjoy a smooth tech journey.
                    </p>
                </div>

                <div style="padding: 5%; margin: 0;">
                    <h3 style="margin-top: 0; color: #ffffff; font-size: 18px; display: flex; align-items: center; gap: 10px; font-family: 'Orbitron', sans-serif;">
                        <i class="fas fa-shield-alt" style="color: #ffffff; font-size: 30px;"></i> Trusted Warranty
                    </h3>
                    <p style="color: #8b8b8b; line-height: 1.5; margin-bottom: 0; font-size: 15px; padding-left: 20px;">
                        Enjoy peace of mind with Sri Lanka’s most reliable warranty service. Track claims in real-time for a fast, hassle-free experience.
                    </p>
                </div>

            </div>

    </div>

    <style>
        @media (max-width: 768px) {
            .responsive-container {
                flex-direction: column !important;
                gap: 20px !important;
            }
            .responsive-text-section {
                grid-template-columns: 1fr !important;
                width: 90% !important;
                margin-top: 5% !important;
                margin-left: 5% !important;
                margin-bottom: 5% !important;
            }
            .responsive-image-section {
                width: 100% !important;
                text-align: center !important;
            }
        }
        @media (min-width: 769px) and (max-width: 992px) {
            .responsive-text-section {
                grid-template-columns: 1fr !important;
            }
        }
    </style>

    <script>
        // Apply responsive classes dynamically
        function applyResponsiveStyles() {
            const container = document.querySelector('div[style*="display: flex"]');
            const textSection = document.querySelector('div[style*="display: grid"]');
            const imageSection = document.querySelector('div[style*="flex: 1"]:first-child');
            
            container.className = 'responsive-container';
            textSection.className = 'responsive-text-section';
            imageSection.className = 'responsive-image-section';
        }
        
        // Apply styles when page loads
        window.addEventListener('load', applyResponsiveStyles);
        window.addEventListener('resize', applyResponsiveStyles);
    </script>
</div>
