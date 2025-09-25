<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <title>NovaLink Computers | AI PC Building Assistant</title>
    <meta name="description" content="Get AI-powered PC building assistance from NovaLink's expert system">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="assets/js/tailwind-cdn.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --ai-gradient: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
            --user-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .chat-container {
            max-width: 1200px;
            margin: 20px auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 75vh;
            display: flex;
            flex-direction: column;
        }
        
        .chat-header {
            background: var(--primary-gradient);
            color: white;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .chat-header-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        
        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background: #f8fafc;
        }
        
        .message {
            margin-bottom: 20px;
            display: flex;
            gap: 12px;
            animation: fadeInUp 0.3s ease;
        }
        
        .message.ai {
            flex-direction: row;
        }
        
        .message.user {
            flex-direction: row-reverse;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            flex-shrink: 0;
        }
        
        .ai .avatar {
            background: var(--ai-gradient);
            color: white;
        }
        
        .user .avatar {
            background: var(--user-gradient);
            color: white;
        }
        
        .message-content {
            max-width: 70%;
            padding: 15px 20px;
            border-radius: 18px;
            position: relative;
        }
        
        .ai .message-content {
            background: white;
            border: 1px solid #e2e8f0;
            border-top-left-radius: 4px;
        }
        
        .user .message-content {
            background: var(--user-gradient);
            color: white;
            border-top-right-radius: 4px;
        }
        
        .quick-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        
        .quick-action {
            background: rgba(102, 126, 234, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.2);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .quick-action:hover {
            background: rgba(102, 126, 234, 0.2);
            transform: translateY(-2px);
        }
        
        .chat-input-container {
            padding: 20px;
            border-top: 1px solid #e2e8f0;
            background: white;
        }
        
        .chat-input-wrapper {
            display: flex;
            gap: 12px;
            align-items: end;
        }
        
        .chat-input {
            flex: 1;
            border: 1px solid #e2e8f0;
            border-radius: 25px;
            padding: 12px 20px;
            resize: none;
            font-family: inherit;
            font-size: 14px;
            transition: all 0.3s ease;
            max-height: 120px;
        }
        
        .chat-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .send-button {
            background: var(--primary-gradient);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }
        
        .send-button:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        
        .send-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        .typing-indicator {
            display: flex;
            gap: 4px;
            padding: 10px 0;
        }
        
        .typing-dot {
            width: 8px;
            height: 8px;
            background: #667eea;
            border-radius: 50%;
            animation: typing 1.4s infinite ease-in-out;
        }
        
        .typing-dot:nth-child(1) { animation-delay: -0.32s; }
        .typing-dot:nth-child(2) { animation-delay: -0.16s; }
        
        @keyframes typing {
            0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
            40% { transform: scale(1); opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .suggestion-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 15px 0;
        }
        
        .suggestion-chip {
            background: rgba(102, 126, 234, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.2);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .suggestion-chip:hover {
            background: rgba(102, 126, 234, 0.2);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        @include('layouts.nav-2')
        <div class="h-[10dvh]"></div>

        <nav style="display: flex; align-items: center; padding: 16px 24px; max-width: 1200px; margin: 10px auto;" aria-label="Breadcrumb">
            <ol style="display: inline-flex; align-items: center; margin: 0; padding: 0; list-style: none; flex-wrap: wrap;">
                <li style="display: inline-flex; align-items: center;">
                    <a href="/home" style="display: inline-flex; align-items: center; font-size: 14px; font-family: 'Orbitron', sans-serif; font-weight: 500; color: #4b5563; text-decoration: none; transition: color 0.3s ease, transform 0.2s ease; padding: 6px 10px; border-radius: 6px;">
                        <svg style="width: 18px; height: 18px; margin-right: 8px; fill: none; stroke: #6b7280; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Home
                    </a>
                </li>
                <li style="display: flex; align-items: center; margin: 0 6px;" aria-current="page">
                    <svg style="width: 16px; height: 16px; color: #9ca3af; fill: none; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span style="margin-left: 8px; font-size: 14px; font-weight: 600; color: #374151; padding: 6px 10px; border-radius: 6px; font-family: 'Orbitron', sans-serif;">AI PC Building Assistant</span>
                </li>
            </ol>
        </nav>

        <div class="chat-container">
            <div class="chat-header">
    <div class="chat-header-icon">
        <i class="fas fa-robot"></i>
    </div>
    <div>
        <h3 style="margin: 0; font-family: 'Orbitron', sans-serif;">NovaLink AI Assistant</h3>
        <p style="margin: 2px 0 0 0; opacity: 0.9; font-size: 14px;">Expert PC building guidance</p>
    </div>
    <div style="margin-left: auto; display: flex; align-items: center; gap: 10px;">
        <button onclick="clearConversation()" style="background: rgba(255,255,255,0.2); border: none; color: white; padding: 6px 12px; border-radius: 15px; font-size: 12px; cursor: pointer; transition: all 0.3s ease;">
            <i class="fas fa-trash-alt" style="margin-right: 5px;"></i>Clear Chat
        </button>
        <div style="background: rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 15px; font-size: 12px;">
            <i class="fas fa-circle" style="color: #10b981; margin-right: 5px;"></i>Online
        </div>
    </div>
</div>

            <div class="chat-messages" id="chatMessages">
                <div class="message ai">
                    <div class="avatar">AI</div>
                    <div class="message-content">
                        <p>Hello! I'm your NovaLink AI assistant. I can help you:</p>
                        <div class="suggestion-chips">
                            <div class="suggestion-chip" onclick="sendQuickMessage('Build me a gaming PC under $1000')">
                                💻 Build a Gaming PC
                            </div>
                            <div class="suggestion-chip" onclick="sendQuickMessage('Recommend components for video editing')">
                                🎬 Video Editing Setup
                            </div>
                            <div class="suggestion-chip" onclick="sendQuickMessage('Help me upgrade my current PC')">
                                ⚡ Upgrade Advice
                            </div>
                            <div class="suggestion-chip" onclick="sendQuickMessage('Compare RTX 4070 vs RX 7800 XT')">
                                🔍 Compare Components
                            </div>
                        </div>
                        <p>What would you like to build today?</p>
                    </div>
                </div>
            </div>

            <div class="chat-input-container">
                <div class="chat-input-wrapper">
                    <textarea 
                        class="chat-input" 
                        id="messageInput" 
                        placeholder="Ask me about PC building, components, or recommendations..." 
                        rows="1"
                        onkeydown="handleKeyDown(event)"
                    ></textarea>
                    <button class="send-button" id="sendButton" onclick="sendMessage()">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>

        @include('layouts.footer2')
    </div>

    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script>
    const products = @json($products);
    
    function handleKeyDown(event) {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            sendMessage();
        }
    }
    
    function sendQuickMessage(message) {
        document.getElementById('messageInput').value = message;
        sendMessage();
    }
    
    function sendMessage() {
        const input = document.getElementById('messageInput');
        const message = input.value.trim();
        
        if (!message) return;
        
        addMessage(message, 'user');
        input.value = '';
        input.style.height = 'auto';
        
        showTypingIndicator();
        
        fetch('/llm/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                message: message,
                products: products
            })
        })
        .then(response => response.json())
        .then(data => {
            hideTypingIndicator();
            if (data.success) {
                addMessage(data.response, 'ai');
            } else {
                addMessage('Sorry, I encountered an error. Please try again.', 'ai');
            }
        })
        .catch(error => {
            hideTypingIndicator();
            addMessage('Sorry, I\'m having trouble connecting. Please try again.', 'ai');
            console.error('Error:', error);
        });
    }
    
    function addMessage(content, sender) {
        const chatMessages = document.getElementById('chatMessages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${sender}`;
        
        const avatar = sender === 'ai' ? 'AI' : 'You';
        const avatarClass = sender === 'ai' ? 'ai' : 'user';
        
        messageDiv.innerHTML = `
            <div class="avatar ${avatarClass}">${avatar}</div>
            <div class="message-content">
                ${formatMessage(content)}
            </div>
        `;
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    function formatMessage(content) {
        return content
            .replace(/\n/g, '<br>')
            .replace(/(https?:\/\/[^\s]+)/g, '<a href="$1" target="_blank" style="color: #667eea; text-decoration: underline;">$1</a>');
    }
    
    function showTypingIndicator() {
        const chatMessages = document.getElementById('chatMessages');
        const typingDiv = document.createElement('div');
        typingDiv.className = 'message ai';
        typingDiv.id = 'typingIndicator';
        typingDiv.innerHTML = `
            <div class="avatar">AI</div>
            <div class="message-content">
                <div class="typing-indicator">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            </div>
        `;
        chatMessages.appendChild(typingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    function hideTypingIndicator() {
        const typingIndicator = document.getElementById('typingIndicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
    }
    
    // Clear conversation function
    function clearConversation() {
        if (confirm('Are you sure you want to clear this conversation?')) {
            fetch('/llm/conversation', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Reload to show fresh conversation
                }
            });
        }
    }
    
    // Auto-resize textarea
    document.getElementById('messageInput').addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
    
    // Load conversation history on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Clear existing messages and load from conversation
        const chatMessages = document.getElementById('chatMessages');
        chatMessages.innerHTML = '';
        
        // You can optionally load previous messages here if needed
        // For now, it will start fresh each page load for simplicity
    });
</script>
</body>
</html>