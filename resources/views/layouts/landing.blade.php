<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaLink Computers</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .bodycolor {
            font-family: 'Orbitron', sans-serif;
            background-color: #0a0a0a;
            margin: 0;
            overflow: auto; /* Changed to allow scrolling */
            color: #ffffff;
        }
        #3dLoader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0a0a0a;
            z-index: 1000;
        }
        #3dAnimation {
            position: fixed;
            top: 0;
            left: 0;
            opacity: 0.3;
            z-index: 1;
        }
        .threeDContent {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            visibility: visible !important; /* Force visibility initially */
            pointer-events: none;
            transition: opacity 0.5s ease; /* Smooth fade transition */
        }
        .threeDContent.hidden {
            opacity: 0;
            visibility: hidden !important;
        }
        .threeDContent > div {
            max-width: 1024px;
            padding: 0 32px;
            pointer-events: auto;
        }
        h1 {
            font-size: 3.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #ffffff;
            visibility: visible !important; /* Force visibility */
        }
        p {
            font-size: 1.5rem;
            color: #e5e7eb;
            margin-bottom: 2rem;
            visibility: visible !important; /* Force visibility */
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fadeInUp {
            animation: fadeInUp 1s ease-out forwards;
        }
        .animate-delay-200 {
            animation-delay: 0.2s;
        }
        .animate-delay-400 {
            animation-delay: 0.4s;
        }
        .glow {
            filter: drop-shadow(0 0 8px rgba(0, 170, 255, 0.5));
        }
        .spinner {
            width: 48px;
            height: 48px;
            border: 4px solid transparent;
            border-top-color: #3b82f6;
            border-bottom-color: #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
        /* Responsive styles */
        @media (max-width: 640px) {
            .threeDContent > div {
                padding: 0 16px;
            }
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 1rem;
            }
        }
        @media (min-width: 641px) and (max-width: 1024px) {
            h1 {
                font-size: 3rem;
            }
            p {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="bodycolor">  
        <!-- Loading Indicator -->
        <div id="3dLoader">
            <div class="spinner"></div>
        </div>

        <!-- 3D Animation Canvas -->
        <div id="3dAnimation"></div>

        <!-- Content -->
        <div class="threeDContent">
            <div>
                <h1 class="animate-fadeInUp glow">NovaLink Computers</h1>
                <p class="animate-fadeInUp animate-delay-200">Empowering Innovation with Advanced Technology</p>
            </div>
        </div>

        <script>
            // Three.js Full-Screen Interactive Network Animation
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
            document.getElementById('3dAnimation').appendChild(renderer.domElement);

            // Create full-screen network
            const nodeCount = 100;
            const networkGroup = new THREE.Group();
            const nodeGeometry = new THREE.SphereGeometry(0.04, 16, 16);
            const nodeMaterial = new THREE.MeshPhongMaterial({ 
                color: 0x00aaff, 
                emissive: 0x004466, 
                shininess: 80 
            });
            const lineMaterial = new THREE.LineBasicMaterial({ 
                color: 0x00aaff, 
                transparent: true, 
                opacity: 0.1 
            });
            const activeLineMaterial = new THREE.LineBasicMaterial({ 
                color: 0x00ffcc, 
                transparent: true, 
                opacity: 0.8 
            });

            const nodes = [];
            const lines = [];
            let scaleFactor = Math.max(window.innerWidth, window.innerHeight) / 800;

            // Create nodes with random positions
            for (let i = 0; i < nodeCount; i++) {
                const node = new THREE.Mesh(nodeGeometry, nodeMaterial);
                node.position.set(
                    (Math.random() - 0.5) * 20 * scaleFactor,
                    (Math.random() - 0.5) * 12 * scaleFactor,
                    (Math.random() - 0.5) * 10 * scaleFactor
                );
                networkGroup.add(node);
                nodes.push(node);
            }

            // Create lines connecting nearby nodes
            for (let i = 0; i < nodes.length; i++) {
                for (let j = i + 1; j < nodes.length; j++) {
                    const dist = nodes[i].position.distanceTo(nodes[j].position);
                    if (dist < 3 * scaleFactor) {
                        const lineGeometry = new THREE.BufferGeometry().setFromPoints([
                            nodes[i].position,
                            nodes[j].position
                        ]);
                        const line = new THREE.Line(lineGeometry, lineMaterial);
                        networkGroup.add(line);
                        lines.push({ line, start: i, end: j });
                    }
                }
            }
            scene.add(networkGroup);

            // Add lighting
            const ambientLight = new THREE.AmbientLight(0x404040, 0.5);
            scene.add(ambientLight);
            const pointLight = new THREE.PointLight(0xffffff, 0.7, 100);
            pointLight.position.set(5 * scaleFactor, 5 * scaleFactor, 5 * scaleFactor);
            scene.add(pointLight);

            camera.position.z = 12 * scaleFactor;

            // Cursor interaction
            let mouseX = 0, mouseY = 0;
            document.addEventListener('mousemove', (event) => {
                mouseX = (event.clientX / window.innerWidth) * 2 - 1;
                mouseY = -(event.clientY / window.innerHeight) * 2 + 1;
            });

            // Animation loop
            function animate() {
                requestAnimationFrame(animate);

                // Convert cursor position to 3D space
                const vector = new THREE.Vector3(mouseX, mouseY, 0.5);
                vector.unproject(camera);
                const dir = vector.sub(camera.position).normalize();
                const distance = -camera.position.z / dir.z;
                const cursorPos = camera.position.clone().add(dir.multiplyScalar(distance));

                // Update lines based on cursor proximity
                lines.forEach(({ line, start, end }) => {
                    const startPos = nodes[start].position;
                    const endPos = nodes[end].position;
                    const lineDir = endPos.clone().sub(startPos);
                    const cursorDir = cursorPos.clone().sub(startPos);
                    const lineLength = lineDir.length();
                    const t = Math.max(0, Math.min(1, cursorDir.dot(lineDir) / (lineLength * lineLength)));
                    const closestPoint = startPos.clone().add(lineDir.multiplyScalar(t));
                    const distToCursor = closestPoint.distanceTo(cursorPos);

                    if (distToCursor < 1 * scaleFactor) {
                        line.material = activeLineMaterial;
                        line.material.opacity = 0.8 * (1 - distToCursor / (1 * scaleFactor));
                    } else {
                        line.material = lineMaterial;
                        line.material.opacity = 0.1;
                    }
                });

                // Subtle rotation
                networkGroup.rotation.y = mouseX * Math.PI * 0.1;
                networkGroup.rotation.x = mouseY * Math.PI * 0.05;

                renderer.render(scene, camera);
            }
            animate();

            // Handle window resize
            window.addEventListener('resize', () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
                renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
                const newScaleFactor = Math.max(window.innerWidth, window.innerHeight) / 800;
                nodes.forEach(node => {
                    node.position.multiplyScalar(newScaleFactor / scaleFactor);
                });
                pointLight.position.set(5 * newScaleFactor, 5 * newScaleFactor, 5 * newScaleFactor);
                camera.position.z = 12 * newScaleFactor;
                scaleFactor = newScaleFactor;
            });

            // Force content visibility and handle scroll
            window.addEventListener('load', () => {
                document.getElementById('3dLoader').style.display = 'none';
                const content = document.querySelector('.threeDContent');
                content.style.visibility = 'visible';
                content.style.opacity = '1';
            });

            // Scroll event to hide content at 50% scroll
            window.addEventListener('scroll', () => {
                const content = document.querySelector('.threeDContent');
                const scrollPosition = window.scrollY;
                const windowHeight = window.innerHeight;
                const documentHeight = document.documentElement.scrollHeight;
                const scrollPercentage = (scrollPosition / (documentHeight - windowHeight)) * 100;

                if (scrollPercentage >= 1) {
                    content.classList.add('hidden');
                } else {
                    content.classList.remove('hidden');
                }
            });
        </script>
    </div>
</body>
</html>