<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futuristic Cyberpunk Girl - PC Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>

        .main-container {
            display: flex;
            min-height: 100vh;
            background: radial-gradient(circle at 30% 50%, #1a0033, #000000);
        }
        
        .character-section {
            flex: 0 0 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background: radial-gradient(circle at center, #2d1b4e, #000000);
        }
        
        .content-section {
            flex: 1;
            display: flex;
            align-items: center;
            padding: 40px;
            background: linear-gradient(135deg, #0a0a0a, #1a0033);
        }
        
        .character {
            position: relative;
            width: 350px;
            height: 450px;
            transform-style: preserve-3d;
        }
        
        .head {
            position: absolute;
            width: 180px;
            height: 220px;
            left: 85px;
            top: 40px;
            background: linear-gradient(135deg, #ffeef5, #f0e6eb);
            border-radius: 90px 90px 70px 70px;
            box-shadow: 0 15px 35px rgba(255, 20, 147, 0.3);
            animation: pulse 4s ease-in-out infinite;
        }
        
        .face-features {
            position: absolute;
            width: 12px;
            height: 8px;
            background: #ff69b4;
            border-radius: 50%;
            top: 130px;
            left: 84px;
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.8);
        }
        
        .visor {
            position: absolute;
            width: 160px;
            height: 50px;
            left: 10px;
            top: 70px;
            background: linear-gradient(45deg, #ff1493, #ff69b4, #da70d6);
            border-radius: 25px;
            box-shadow: 
                inset 0 4px 12px rgba(255, 255, 255, 0.3),
                0 0 25px rgba(255, 20, 147, 0.8),
                0 0 50px rgba(255, 20, 147, 0.4);
            overflow: hidden;
        }
        
        .visor::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(255, 255, 255, 0.4) 50%, 
                transparent 100%);
            animation: scan 3s ease-in-out infinite;
        }
        
        .visor-lights {
            position: absolute;
            width: 15px;
            height: 6px;
            background: #00ffff;
            border-radius: 3px;
            top: 22px;
            left: 25px;
            box-shadow: 0 0 15px #00ffff;
            animation: blink 2s ease-in-out infinite;
        }
        
        .visor-lights:nth-child(2) {
            left: 120px;
            animation-delay: 0.5s;
        }
        
        .headphones {
            position: absolute;
            width: 220px;
            height: 220px;
            left: -20px;
            top: 25px;
            border: 12px solid #e6e6fa;
            border-radius: 50%;
            background: transparent;
            box-shadow: 0 0 30px rgba(230, 230, 250, 0.3);
        }
        
        .headphone-left, .headphone-right {
            position: absolute;
            width: 55px;
            height: 70px;
            background: linear-gradient(135deg, #f0f0f5, #e0e0e8);
            border-radius: 28px;
            box-shadow: 
                inset 0 4px 12px rgba(255, 255, 255, 0.3),
                0 4px 15px rgba(0, 0, 0, 0.3);
        }
        
        .headphone-left {
            left: -25px;
            top: 75px;
            transform: rotate(-15deg);
        }
        
        .headphone-right {
            right: -25px;
            top: 75px;
            transform: rotate(15deg);
        }
        
        .hair {
            position: absolute;
            width: 55px;
            height: 280px;
            right: -5px;
            top: 140px;
            background: linear-gradient(180deg, #dda0dd, #ba55d3);
            border-radius: 28px;
            transform: rotate(15deg);
            box-shadow: 0 0 20px rgba(186, 85, 211, 0.4);
        }
        
        .hair::before {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            background: #ba55d3;
            border-radius: 50%;
            top: 40px;
            left: -3px;
        }
        
        .hair::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #ba55d3;
            border-radius: 50%;
            top: 80px;
            right: -3px;
        }
        
        .collar {
            position: absolute;
            width: 280px;
            height: 90px;
            left: 35px;
            top: 250px;
            background: linear-gradient(135deg, #f8f8ff, #f0f0f5);
            border-radius: 45px 45px 15px 15px;
            box-shadow: 0 8px 25px rgba(255, 20, 147, 0.2);
        }
        
        .tech-lines {
            position: absolute;
            width: 2px;
            height: 35px;
            background: linear-gradient(180deg, transparent, #ff1493, transparent);
            animation: flow 2s ease-in-out infinite;
        }
        
        .tech-line-1 { left: 40px; top: 180px; }
        .tech-line-2 { right: 40px; top: 200px; animation-delay: 0.7s; }
        .tech-line-3 { left: 25px; top: 280px; animation-delay: 1.4s; }
        
        .particles {
            position: absolute;
            width: 3px;
            height: 3px;
            background: #ff69b4;
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .particle-1 { left: 80px; top: 90px; }
        .particle-2 { right: 70px; top: 130px; animation-delay: 2s; }
        .particle-3 { left: 40px; top: 320px; animation-delay: 4s; }
        
        .ambient-glow {
            position: absolute;
            width: 500px;
            height: 500px;
            left: -75px;
            top: -25px;
            background: radial-gradient(circle, 
                rgba(255, 20, 147, 0.1) 0%, 
                rgba(186, 85, 211, 0.05) 50%, 
                transparent 70%);
            animation: rotate 20s linear infinite;
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            width: 100%;
        }
        
        .service-item {
            padding: 0;
            margin: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(255, 20, 147, 0.2);
            transition: all 0.3s ease;
        }
        
        .service-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(255, 20, 147, 0.3);
            border-color: rgba(255, 20, 147, 0.5);
        }
        
        .service-item h3 {
            margin-top: 0;
            color: #ffffff;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .service-item i {
            color: #ff1493;
            font-size: 28px;
            text-shadow: 0 0 10px rgba(255, 20, 147, 0.5);
        }
        
        .service-item p {
            color: #c0c0c0;
            line-height: 1.6;
            margin-bottom: 0;
            font-size: 14px;
            padding-left: 43px;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }
        
        @keyframes scan {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(300%); }
        }
        
        @keyframes blink {
            0%, 90% { opacity: 1; }
            95% { opacity: 0.3; }
            100% { opacity: 1; }
        }
        
        @keyframes flow {
            0% { opacity: 0; transform: translateY(-20px); }
            50% { opacity: 1; }
            100% { opacity: 0; transform: translateY(20px); }
        }
        
        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) rotate(0deg); 
                opacity: 0.8;
            }
            50% { 
                transform: translateY(-15px) rotate(180deg); 
                opacity: 1;
            }
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }
            
            .character-section {
                flex: 0 0 40vh;
            }
            
            .character {
                transform: scale(0.7);
            }
            
            .content-section {
                padding: 20px;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="character-section">
            <div class="ambient-glow"></div>
            <div class="character">
                <div class="headphones"></div>
                <div class="headphone-left"></div>
                <div class="headphone-right"></div>
                
                <div class="head">
                    <div class="face-features"></div>
                    <div class="visor">
                        <div class="visor-lights"></div>
                        <div class="visor-lights"></div>
                    </div>
                </div>
                
                <div class="hair"></div>
                <div class="collar"></div>
                
                <div class="tech-lines tech-line-1"></div>
                <div class="tech-lines tech-line-2"></div>
                <div class="tech-lines tech-line-3"></div>
                
                <div class="particles particle-1"></div>
                <div class="particles particle-2"></div>
                <div class="particles particle-3"></div>
            </div>
        </div>
        
        <div class="content-section">
            <div class="services-grid">
                <div class="service-item">
                    <h3>
                        <i class="fas fa-tools"></i>
                        Custom PC Builds
                    </h3>
                    <p>We offer custom PCs tailored to your needs, whether you're a gamer, designer, or just need a reliable workstation. Choose your components and we'll handle the rest!</p>
                </div>
                
                <div class="service-item">
                    <h3>
                        <i class="fas fa-headset"></i>
                        Expert Support
                    </h3>
                    <p>Our team of experts is here to help you every step of the way, from choosing the right parts to troubleshooting and support after your purchase.</p>
                </div>
                
                <div class="service-item">
                    <h3>
                        <i class="fas fa-microchip"></i>
                        High-Quality Components
                    </h3>
                    <p>We stock the latest and greatest in computer hardware, from CPUs and GPUs to SSDs and motherboards, ensuring your build has the best components available.</p>
                </div>
                
                <div class="service-item">
                    <h3>
                        <i class="fas fa-shield-alt"></i>
                        Warranty Support
                    </h3>
                    <p>Experience Sri Lanka's No.1 warranty support with our user-friendly ticket system. Simply submit your warranty claim, receive an email confirmation, and follow the status of your claim in real time for hassle-free experience.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>