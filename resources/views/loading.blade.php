<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Loading - NovaLink Computers</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');
        
        body {
            margin: 0;
            padding: 0;
            background-color: black;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            overflow: hidden;
            user-select: none;
        }

        #words, #final-text {
            font-size: 2.5rem;
            letter-spacing: 3px;
            white-space: nowrap;
            min-height: 3rem;
            transition: opacity 0.5s ease;
        }

        #words {
            font-family: 'Orbitron', monospace;
        }

        #final-text {
            font-family: 'Share Tech Mono', monospace;
        }

        .hidden {
            visibility: hidden;
            opacity: 0;
        }

        /* Fade-in animation for final text */
        .decipher {
            animation: fadeIn 2s forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Fade-out animation for words */
        .fade-out {
            animation: fadeOut 0.5s forwards;
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
            }
        }

        /* Punchy effect for final text */
        .punch {
            animation: punch 0.5s ease-in-out;
        }

        @keyframes punch {
            0% {
                transform: scale(1);
                color: #fff;
                text-shadow: 0 0 10px #fff, 0 0 20px rgba(255, 255, 255, 0.8);
            }
            50% {
                transform: scale(1.2);
                color: #006affff;
                text-shadow: 0 0 15px #e2ebe8ff, 0 0 30px rgba(229, 239, 239, 0.8);
            }
            100% {
                transform: scale(1);
                color: #fff;
                text-shadow: 0 0 10px #fff, 0 0 20px rgba(255, 255, 255, 0.8);
            }
        }

        /* Blinking cursor effect for final-text during decipher */
        #final-text.decipher::after {
            content: "|";
            animation: blink 1s step-end infinite;
        }

        @keyframes blink {
            from, to { opacity: 1; }
            50% { opacity: 0; }
        }
    </style>
</head>
<body>
    <div id="words"></div>
    <div id="final-text" class="hidden"></div>

    <script>
        const words = ["Initializing", "Configuring", "Optimizing"];
        const wordsEl = document.getElementById('words');
        const finalTextEl = document.getElementById('final-text');
        const finalText = "NovaLink Computers";

        let currentWordIndex = 0;
        let accumulatedText = "";

        // Function to type out a word letter by letter
        function typeWord(word, callback) {
            let index = 0;
            const interval = setInterval(() => {
                accumulatedText = accumulatedText.slice(0, accumulatedText.length - index) + word.slice(0, index + 1);
                wordsEl.textContent = accumulatedText;
                index++;
                if (index === word.length) {
                    clearInterval(interval);
                    accumulatedText += " "; // Add space after word
                    setTimeout(callback, 800); // Wait before next word or final text
                }
            }, 150);
        }

        // Function to decipher (scramble + reveal) text
        function decipherText(text, element, callback) {
            element.classList.remove('hidden');
            element.textContent = "";

            const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()";
            let iteration = 0;
            const revealInterval = setInterval(() => {
                element.textContent = text
                    .split("")
                    .map((char, idx) => {
                        if (idx < iteration) {
                            return text[idx];
                        }
                        if (char === " ") return " "; // Keep spaces
                        return letters[Math.floor(Math.random() * letters.length)];
                    })
                    .join("");

                iteration += 1/3;

                if (iteration >= text.length) {
                    clearInterval(revealInterval);
                    element.textContent = text;
                    // Add glitch effect
                    setTimeout(() => {
                        element.style.textShadow = "0 0 15px #fff, 0 0 30px rgba(255, 255, 255, 0.8)";
                        setTimeout(() => {
                            element.style.textShadow = "0 0 10px #fff, 0 0 20px rgba(255, 255, 255, 0.8)";
                            // Trigger punchy effect
                            element.classList.remove('decipher'); // Remove cursor
                            element.classList.add('punch');
                            setTimeout(callback, 500); // Match punch duration
                        }, 100);
                    }, 200);
                }
            }, 50);
        }

        // Show words one by one, accumulating them, then fade out and decipher text
        function startSequence() {
            if (currentWordIndex < words.length) {
                typeWord(words[currentWordIndex], () => {
                    currentWordIndex++;
                    if (currentWordIndex < words.length) {
                        startSequence(); // Move to next word
                    } else {
                        // Fade out words before showing final text
                        wordsEl.classList.add('fade-out');
                        setTimeout(() => {
                            wordsEl.classList.add('hidden');
                            wordsEl.textContent = ""; // Clear words element
                            decipherText(finalText, finalTextEl, () => {
                                setTimeout(() => {
                                    window.location.href = "{{ route('home') }}";
                                }, 1000); // Redirect after punch effect
                            });
                        }, 500); // Match fade-out duration
                    }
                });
            }
        }

        startSequence();
    </script>
</body>
</html>