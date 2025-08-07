<!-- Footer Area Start -->
<div class="footer-area bg-black" style="font-family: 'Orbitron', sans-serif;">
    <!-- Floating Message Icon with Popup -->
    <div class="fixed right-6 bottom-2 z-50">
    <div class="relative">
        <!-- Message Button with Notification Badge -->
            <button id="messageBtn" class="hidden sm:inline-flex bg-black text-white p-2 rounded-full shadow-xl items-center justify-center transition-all duration-300 hover:scale-110 group relative" style="border-radius: 9999px;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <span id="notificationBadge" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center hidden animate-pulse">1</span>
            </button>

        
        <!-- Advanced Chatbot Popup -->
        <div id="chatPopup" class="hidden absolute bottom-full right-0  w-96 bg-black rounded-xl shadow-2xl border border-gray-700 overflow-hidden backdrop-blur-sm" style="font-family: 'Inter', sans-serif;">
            <!-- Header with Status -->
                <div class="p-2 border-b border-gray-700 bg-black flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <div class="relative">
                            <div class="w-6 h-6 bg-black rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-2 h-2 bg-green-400 rounded-full border-2 border-gray-900 animate-pulse"></div>
                        </div>
                        <div>
                                <h3 style="font-family: 'Orbitron', sans-serif; font-size: 18px; color: white;">NovaLink AI Assistant</h3>
                        </div>
                    </div>
                    <button id="closeChat" class="text-gray-400 hover:text-white transition-colors p-1 rounded hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            
            <!-- Quick Actions -->
                <div id="quickActions" class="px-2 py-1 bg-black border-b border-gray-700">
                    <div class="flex items-center gap-1">
                        <button class="quick-action-btn bg-blue-600 hover:bg-blue-700 text-white px-2 py-0.5 rounded-full text-[8px] transition-colors" data-action="products">🖥️ Products</button>
                        <button class="quick-action-btn bg-green-600 hover:bg-green-700 text-white px-2 py-0.5 rounded-full text-[8px] transition-colors" data-action="contact">📞 Contact</button>
                        <button class="quick-action-btn bg-purple-600 hover:bg-purple-700 text-white px-2 py-0.5 rounded-full text-[8px] transition-colors" data-action="deals">💰 Deals</button>
                        <button class="quick-action-btn bg-orange-600 hover:bg-orange-700 text-white px-2 py-0.5 rounded-full text-[8px] transition-colors" data-action="help">❓ Help</button>
                    </div>
                </div>

            
            <!-- Chat Messages Container -->
            <div id="chatMessages" class="p-4 h-90 overflow-y-auto space-y-4 bg-black min-h-[430px]">
                <!-- Initial greeting message -->
                <div class="flex items-start space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="bg-gray-800 rounded-2xl rounded-tl-sm p-3 max-w-xs shadow-lg">
                        <p class="text-sm text-white">👋 Welcome to NovaLink! I'm your AI shopping assistant.</p>
                        <p class="text-xs text-blue-300 mt-2">I can help you with:</p>
                        <div class="mt-2 space-y-1">
                            <div class="flex items-center space-x-2 text-xs text-gray-300">
                                <span>🔍</span><span>Smart product search</span>
                            </div>
                            <div class="flex items-center space-x-2 text-xs text-gray-300">
                                <span>💡</span><span>Product recommendations</span>
                            </div>
                            <div class="flex items-center space-x-2 text-xs text-gray-300">
                                <span>📊</span><span>Price comparisons</span>
                            </div>
                            <div class="flex items-center space-x-2 text-xs text-gray-300">
                                <span>📞</span><span>Store information</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Typing Indicator -->
            <div id="typingIndicator" class="hidden px-4 py-2 border-t border-gray-700">
                <div class="flex items-center space-x-2">
                    <div class="w-6 h-6 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    </div>
                    <span class="text-xs text-gray-400">AI is thinking...</span>
                </div>
            </div>
            
            <!-- User Input Area -->
            <div class="p-1 border-t border-gray-700 bg-black">
                <div class="flex space-x-1">
                    <div class="flex-1 relative">
                        <input id="userMessage" type="text" placeholder="Ask me anything..." class="w-full px-3 py-1.5 bg-gray-700 border border-gray-600 rounded-full text-[11px] text-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 pr-8">
                        <button id="voiceBtn" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                            </svg>
                        </button>
                    </div>
                        <button id="sendMessage" class="bg-transparent border border-white text-white px-3 py-1.5 rounded-full text-xs font-medium transition-all duration-300 flex items-center space-x-1 hover:bg-gray-800 hover:text-white">
                            <span>Send</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </button>


                </div>
                <div class="flex justify-between items-center mt-1">
                    <div class="flex space-x-1">
                        <button class="text-gray-400 hover:text-white text-[10px] flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span>Attach</span>
                        </button>
                    </div>
                    <div class="text-[10px] text-gray-500">
                        Powered by NovaLink AI
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    <div class="footer-container">
        <div class="footer-top py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto mt-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Logo Column -->
                    <div class="flex justify-center lg:justify-start items-center">
                        <a href="{{ route('home')}}" class="group">
                            <img src="assets/images/logo/N_white.png" alt="NovaLink Logo" class="h-32 transition-transform duration-300 group-hover:scale-105">
                        </a>
                    </div>

                    <!-- Services Column -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-bold text-blue-400 uppercase tracking-wider" style="font-family: 'Orbitron', sans-serif; color: white;">Services</h4>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GAMING CONSOLE']) }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-300" style="font-family: 'Orbitron', sans-serif; color: white;">Gaming Consoles</a>
                            </li>
                            <li>
                                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'LAPTOPS']) }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-300" style="font-family: 'Orbitron', sans-serif; color: white;">Laptops</a>
                            </li>
                            <li>
                                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'CASINGS']) }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-300" style="font-family: 'Orbitron', sans-serif; color: white;">Casings</a>
                            </li>
                            <li>
                                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'PROCESSOR']) }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-300" style="font-family: 'Orbitron', sans-serif; color: white;">GPUs</a>
                            </li>
                            <li>
                                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'APPLE PRODUCTS']) }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-300" style="font-family: 'Orbitron', sans-serif; color: white;">Smart Phones</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Profile Column -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-bold text-blue-400 uppercase tracking-wider" style="font-family: 'Orbitron', sans-serif; color: white;">Profile</h4>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('wishlist')}}" class="text-gray-300 hover:text-blue-400 transition-colors duration-300" style="font-family: 'Orbitron', sans-serif; color: white;">Wishlist</a>
                            </li>
                            <li>
                                <a href="{{ route('cart')}}" class="text-gray-300 hover:text-blue-400 transition-colors duration-300" style="font-family: 'Orbitron', sans-serif; color: white;">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="{{ route('wishlist')}}" class="text-gray-300 hover:text-blue-400 transition-colors duration-300" style="font-family: 'Orbitron', sans-serif; color: white;">Checkout</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-300 hover:text-blue-400 transition-colors duration-300" style="font-family: 'Orbitron', sans-serif; color: white;">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('myAcc') }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-300" style="font-family: 'Orbitron', sans-serif; color: white;">Login</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Column -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-bold text-blue-400 uppercase tracking-wider" style="font-family: 'Orbitron', sans-serif; color: white;">Contact Info</h4>
                        <div class="space-y-3 text-gray-300">
                            <div>
                                <strong class="block text-sm text-blue-400" style="font-family: 'Orbitron', sans-serif; color: white;">Address:</strong>
                                <p class="text-sm" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: white;">NovaLink Computers,<br>No. 12/B,<br>Galle Road,<br>Matara.</p>
                            </div>
                            <div>
                                <strong class="block text-sm text-blue-400" style="font-family: 'Orbitron', sans-serif; color: white;">Phone:</strong>
                                <a href="tel:0769417154" class="hover:text-blue-400 transition-colors duration-300" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: white;">0769417154</a>
                            </div>
                            <div>
                                <strong class="block text-sm text-blue-400" style="font-family: 'Orbitron', sans-serif; color: white;">Email:</strong>
                                <a href="mailto:novaLinkcomputers@gmail.com" class="hover:text-blue-400 transition-colors duration-300" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: white;">novaLinkcomputers@gmail.com</a>
                            </div>
                        </div>
                        <div class="pt-4">
                            <div class="flex space-x-4">
                                <a href="#" class="text-white hover:text-blue-400 transition-colors duration-300">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#" class="text-white hover:text-blue-400 transition-colors duration-300">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#" class="text-white hover:text-blue-400 transition-colors duration-300">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.167 6.839 9.49.5.09.682-.217.682-.482 0-.236-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.268 2.75 1.026A9.577 9.577 0 0112 6.836c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.026 2.747-1.026.546 1.377.202 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.163 22 16.418 22 12c0-5.523-4.477-10-10-10z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
            <div class="footer-bottom border-t border-gray-600 py-6 bg-black">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                <!-- Left side -->
                <p class="text-sm text-white font-inter mb-2 sm:mb-0" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: white;">
                    © 2025 All rights reserved by NovaLink Computers.
                </p>

                <!-- Right side -->
                <div class="space-x-4 text-sm text-white font-inter">
                    <a href="#" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: white;">Privacy Policy</a>
                    <a href="#"style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: white;" >Terms of Use</a>
                </div>
                </div>
            </div>
            </div>

    </div>
</div>
<!-- Footer Area End -->

<!-- Load Orbitron font from Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet">


<!-- JavaScript for the chat popup -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

.animate-bounce {
    animation: bounce 1s infinite;
}

@keyframes bounce {
    0%, 20%, 53%, 80%, 100% {
        transform: translateY(0);
    }
    40%, 43% {
        transform: translateY(-8px);
    }
    70% {
        transform: translateY(-4px);
    }
    90% {
        transform: translateY(-2px);
    }
}

.product-card {
    transition: all 0.3s ease;
    border: 1px solid #374151;
}

.product-card:hover {
    border-color: #3B82F6;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
}

.feature-tag {
    background: linear-gradient(45deg, #3B82F6, #8B5CF6);
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 10px;
    font-weight: 500;
}

.deal-badge {
    background: linear-gradient(45deg, #EF4444, #F97316);
    color: white;
    padding: 2px 6px;
    border-radius: 8px;
    font-size: 9px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.scrollbar-thin::-webkit-scrollbar {
    width: 4px;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background: #374151;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background: #6B7280;
    border-radius: 2px;
}

.scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background: #9CA3AF;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const messageBtn = document.getElementById('messageBtn');
    const closeChat = document.getElementById('closeChat');
    const chatPopup = document.getElementById('chatPopup');
    const chatMessages = document.getElementById('chatMessages');
    const userMessage = document.getElementById('userMessage');
    const sendMessage = document.getElementById('sendMessage');
    const quickActionBtns = document.querySelectorAll('.quick-action-btn');
    const typingIndicator = document.getElementById('typingIndicator');
    const quickActions = document.getElementById('quickActions');
    const notificationBadge = document.getElementById('notificationBadge');

    let products = [];
    let contactDetails = {};
    let conversationContext = [];
    let isFirstInteraction = true;

    // Hardcoded contact details (used as fallback)
    const responses = {
        greeting: [
            "Hello! 👋 I'm your NovaLink AI assistant. How can I help you find the perfect tech today?",
            "Hi there! 🎯 Ready to discover some amazing tech deals? What are you looking for?",
            "Welcome! 🚀 I'm here to help you navigate our incredible tech collection. What interests you?"
        ],
        contact: {
            phone: "📞 You can reach us at <span class='text-blue-400 font-semibold'>0769417154</span> - we're available during business hours!",
            email: "📧 Drop us an email at <span class='text-blue-400 font-semibold'>novaLinkcomputers@gmail.com</span> - we typically respond within 24 hours!",
            address: "📍 Visit our showroom at <span class='text-blue-400 font-semibold'>No. 12/B, Galle Road, Matara</span> - come see our products in person!",
            hours: "🕒 We're open <span class='text-green-400 font-semibold'>Monday to Saturday, 9:00 AM - 7:00 PM</span>. Closed on Sundays and public holidays."
        },
        fallback: [
            "🤔 I'm not sure I understood that. Could you try asking about our products, prices, or store information?",
            "❓ That's interesting! Could you be more specific? I can help with products, deals, contact info, or technical questions.",
            "🔍 Let me help you better - are you looking for specific products, need contact details, or want to know about our services?"
        ]
    };

    // Fetch products from backend
    async function fetchProducts() {
        try {
            console.log('Fetching products from /api/get-chatbot-products');
            const response = await fetch('http://127.0.0.1:8000/api/get-chatbot-products');
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            products = await response.json();
            console.log('Fetched products:', products);
        } catch (error) {
            console.error('Error fetching products:', error);
            products = []; // Fallback to empty array
        }
    }

    // Fetch contact details from backend (optional)
    async function fetchContactDetails() {
        try {
            console.log('Fetching contact details from /api/get-contact-details');
            const response = await fetch('http://127.0.0.1:8000/api/get-contact-details');
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            contactDetails = await response.json();
            console.log('Fetched contact details:', contactDetails);
        } catch (error) {
            console.error('Error fetching contact details:', error);
            contactDetails = responses.contact; // Fallback to hardcoded
        }
    }

    // Initialize chatbot
    async function initializeChatbot() {
        await Promise.all([fetchProducts(), fetchContactDetails()]); // Fetch both products and contact details
        responses.contact = contactDetails; // Update with fetched or fallback contact details
        if (isFirstInteraction) {
            setTimeout(() => {
                notificationBadge.classList.remove('hidden');
            }, 3000);
        }
    }

    // Toggle chat popup
    messageBtn.addEventListener('click', function() {
        chatPopup.classList.toggle('hidden');
        notificationBadge.classList.add('hidden');
        if (!chatPopup.classList.contains('hidden')) {
            userMessage.focus();
            if (isFirstInteraction) {
                setTimeout(() => {
                    showQuickSuggestions();
                }, 1000);
                isFirstInteraction = false;
            }
        }
    });

    // Close chat popup
    closeChat.addEventListener('click', function() {
        chatPopup.classList.add('hidden');
    });

    // Quick action buttons
    quickActionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.dataset.action;
            handleQuickAction(action);
        });
    });

    // Handle quick actions
    function handleQuickAction(action) {
        let message = '';
        switch(action) {
            case 'products':
                message = 'Show me your Laptops and Gaming Consoles.';
                break;
            case 'contact':
                message = 'How can I contact you?';
                break;
            case 'deals':
                message = 'What deals do you have?';
                break;
            case 'help':
                message = 'What can you help me with?';
                break;
        }
        if (message) {
            userMessage.value = message;
            sendUserMessage();
        }
    }

    // Show quick suggestions
    function showQuickSuggestions() {
        const suggestions = [
            "Try asking: 'Show me gaming laptops'",
            "Or: 'What graphics cards do you have?'",
            "Maybe: 'I need help building a PC'"
        ];
        const randomSuggestion = suggestions[Math.floor(Math.random() * suggestions.length)];
        addMessage(`💡 <em>${randomSuggestion}</em>`, 'bot', false);
    }

    // Send user message
    function sendUserMessage() {
        const message = userMessage.value.trim();
        if (message === '') return;
        addMessage(message, 'user');
        userMessage.value = '';
        conversationContext.push({ role: 'user', content: message });
        showThinkingAnimation();
        setTimeout(async () => {
            hideThinkingAnimation();
            const response = await generateIntelligentResponse(message.toLowerCase());
            addMessage(response, 'bot');
            conversationContext.push({ role: 'bot', content: response });
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }, Math.random() * 2000 + 1000);
    }

    // Show/hide thinking animation
    function showThinkingAnimation() {
        typingIndicator.classList.remove('hidden');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function hideThinkingAnimation() {
        typingIndicator.classList.add('hidden');
    }

    // Add message to chat
    function addMessage(content, sender, showTime = true) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex ${sender === 'user' ? 'justify-end' : 'items-start space-x-2'}`;
        if (sender === 'bot') {
            const avatar = document.createElement('div');
            avatar.className = 'w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center flex-shrink-0';
            avatar.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`;
            messageDiv.appendChild(avatar);
        }
        const bubble = document.createElement('div');
        bubble.className = sender === 'user' 
            ? 'bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl rounded-tr-sm p-3 max-w-xs text-sm text-white shadow-lg'
            : 'bg-gray-800 rounded-2xl rounded-tl-sm p-3 max-w-sm text-sm text-white shadow-lg';
        bubble.innerHTML = content;
        const messageContainer = document.createElement('div');
        messageContainer.className = 'flex flex-col space-y-1';
        messageContainer.appendChild(bubble);
        if (showTime) {
            const timeDiv = document.createElement('div');
            timeDiv.className = `text-xs text-gray-500 ${sender === 'user' ? 'text-right' : 'text-left ml-2'}`;
            timeDiv.textContent = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
            messageContainer.appendChild(timeDiv);
        }
        messageDiv.appendChild(messageContainer);
        chatMessages.appendChild(messageDiv);
        bubble.style.opacity = '0';
        bubble.style.transform = 'translateY(10px)';
        setTimeout(() => {
            bubble.style.transition = 'all 0.3s ease';
            bubble.style.opacity = '1';
            bubble.style.transform = 'translateY(0)';
        }, 50);
    }

    // Generate intelligent response
    async function generateIntelligentResponse(message) {
        console.log('Processing message:', message);
        if (message.includes('phone') || message.includes('number') || message.includes('call') || message.includes('telephone') || message.includes('contact')) {
            console.log('Matched: Phone');
            return responses.contact.phone;
        }
        if (message.includes('email') || message.includes('mail') || message.includes('@') || message.includes('e-mail')) {
            console.log('Matched: Email');
            return responses.contact.email;
        }
        if (message.includes('address') || message.includes('location') || message.includes('where') || message.includes('visit') || message.includes('showroom') || message.includes('store')) {
            console.log('Matched: Address');
            return responses.contact.address;
        }
        if (message.includes('hours') || message.includes('open') || message.includes('close') || message.includes('time') || message.includes('opening') || message.includes('closing')) {
            console.log('Matched: Hours');
            return responses.contact.hours;
        }
        if (message.includes('hi') || message.includes('hello') || message.includes('hey') || message.includes('good morning') || message.includes('good afternoon')) {
            return getRandomResponse(responses.greeting);
        }
        if (message.includes('deal') || message.includes('discount') || message.includes('offer') || message.includes('sale') || message.includes('cheap')) {
            return generateDealsResponse();
        }
        if (message.includes('stock') || message.includes('available') || message.includes('availability')) {
            return generateStockResponse();
        }
        if (message.includes('compare') || message.includes('vs') || message.includes('versus') || message.includes('difference')) {
            return generateComparisonResponse(message);
        }
        if (message.includes('help') || message.includes('can you') || message.includes('what can') || message.includes('assist')) {
            return generateHelpResponse();
        }
        const searchTerms = extractSearchTerms(message);
        const matchedProducts = await smartProductSearch(searchTerms, message);
        if (matchedProducts.length > 0) {
            return generateProductResponse(matchedProducts, searchTerms, message);
        }
        return getRandomResponse(responses.fallback);
    }

    // Extract search terms
    function extractSearchTerms(message) {
        const productTypes = ['laptop', 'gpu', 'graphics card', 'phone', 'smartphone', 'console', 'case', 'gaming', 'computer'];
        const brands = ['asus', 'dell', 'nvidia', 'amd', 'intel', 'apple', 'samsung', 'corsair', 'playstation', 'xbox'];
        const features = ['rgb', '4k', 'gaming', 'portable', 'premium', 'budget', 'high-end', 'wireless'];
        const terms = [];
        const words = message.toLowerCase().split(/\s+/);
        words.forEach(word => {
            if (productTypes.includes(word) || brands.includes(word) || features.includes(word)) {
                terms.push(word);
            }
        });
        return terms;
    }

    // Smart product search
    async function smartProductSearch(searchTerms, originalMessage) {
        if (products.length === 0) {
            await fetchProducts();
            if (products.length === 0) {
                console.log('No products available after fetch');
                return [];
            }
        }
        return products
            .filter(product => product && product.name && typeof product.name === 'string')
            .map(product => {
                let score = 0;
                searchTerms.forEach(term => {
                    if (product.name?.toLowerCase().includes(term)) score += 10;
                    if (product.type?.toLowerCase().includes(term)) score += 8;
                    if (product.tags?.some(tag => tag.toLowerCase().includes(term))) score += 6;
                    if (product.features?.some(feature => feature.toLowerCase().includes(term))) score += 4;
                    if (product.desc?.toLowerCase().includes(term)) score += 2;
                });
                return { ...product, score };
            })
            .filter(product => product.score > 0)
            .sort((a, b) => b.score - a.score)
            .slice(0, 5);
    }

    // Generate product response
    function generateProductResponse(products, searchTerms, originalMessage) {
        if (products.length === 0) {
            console.log('No matching products found for:', searchTerms);
            return "🔍 Sorry, I couldn't find any products matching your search. Try something like 'gaming laptops' or 'graphics cards'.";
        }
        let response = products.length === 1
            ? `🎯 Perfect! I found exactly what you're looking for:<br><br>`
            : `🔍 Great! I found ${products.length} products that match your search:<br><br>`;
        products.forEach((product, index) => {
            const isOnDeal = product.deal_start && product.deal_end && 
                            new Date() >= new Date(product.deal_start) && 
                            new Date() <= new Date(product.deal_end);
            response += `
                <div class="product-card bg-gray-700 rounded-lg p-4 mb-4 cursor-pointer hover:bg-gray-600 transition-all duration-300" onclick="showProductDetail(${product.id})">
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="font-bold text-white text-sm">${product.name}</h4>
                        ${isOnDeal ? '<span class="deal-badge">HOT DEAL</span>' : ''}
                    </div>
                    <div class="text-xs text-gray-300 mb-2">
                        <span class="bg-blue-600 px-2 py-1 rounded text-white">${product.type}</span>
                        ${!product.in_stock ? '<span class="bg-red-600 px-2 py-1 rounded text-white ml-2">Out of Stock</span>' : '<span class="bg-green-600 px-2 py-1 rounded text-white ml-2">In Stock</span>'}
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <div>
                            <span class="text-green-400 font-bold">${product.dis_price}</span>
                            ${product.dis_price !== product.ret_price ? `<span class="text-gray-500 line-through text-xs ml-2">${product.ret_price}</span>` : ''}
                        </div>
                        <span class="text-xs text-blue-400">${product.warranty}</span>
                    </div>
                    <p class="text-xs text-gray-400 mb-2">${product.desc}</p>
                    <div class="flex flex-wrap gap-1 mb-3">
                        ${product.features?.slice(0, 3).map(feature => 
                            `<span class="feature-tag">${feature}</span>`
                        ).join('') || ''}
                        ${product.features?.length > 3 ? `<span class="text-xs text-gray-400">+${product.features.length - 3} more</span>` : ''}
                    </div>
                    <div class="flex justify-between items-center">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs transition-colors" onclick="event.stopPropagation(); viewProduct(${product.id})">
                            View Details
                        </button>
                        <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs transition-colors" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart" onClick="addToCart(${product.id});">
                            Add to Cart
                        </button>
                    </div>
                </div>
            `;
        });
        response += `<div class="text-xs text-gray-400 mt-2">💡 Click on any product for detailed information or to make a purchase!</div>`;
        return response;
    }

    // Generate deals response
    function generateDealsResponse() {
        const dealsProducts = products.filter(product => {
            const hasDiscount = product.dis_price !== product.ret_price;
            const hasActiveDeal = product.deal_start && product.deal_end && 
                                new Date() >= new Date(product.deal_start) && 
                                new Date() <= new Date(product.deal_end);
            return hasDiscount || hasActiveDeal;
        });
        if (dealsProducts.length === 0) {
            return "🔥 No active deals right now, but check back soon! We regularly update our offers. Would you like me to notify you about upcoming sales?";
        }
        let response = `🔥 Amazing deals available right now!<br><br>`;
        dealsProducts.forEach(product => {
            const discount = calculateDiscount(product.ret_price, product.dis_price);
            response += `
                <div class="bg-gradient-to-r from-red-600 to-orange-600 rounded-lg p-3 mb-3 text-white">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-bold text-sm">${product.name}</h4>
                        <span class="bg-white text-red-600 px-2 py-1 rounded text-xs font-bold">-${discount}%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="font-bold">${product.dis_price}</span>
                            <span class="line-through text-xs ml-2">${product.ret_price}</span>
                        </div>
                        <button class="bg-white text-red-600 px-3 py-1 rounded text-xs font-bold hover:bg-gray-100" onclick="viewProduct(${product.id})">
                            Grab Deal!
                        </button>
                    </div>
                </div>
            `;
        });
        return response;
    }

    // Generate stock response
    function generateStockResponse() {
        const inStock = products.filter(p => p.in_stock).length;
        const outOfStock = products.filter(p => !p.in_stock).length;
        let response = `📦 <strong>Stock Status:</strong><br><br>`;
        response += `✅ <span class="text-green-400">${inStock} products</span> currently in stock<br>`;
        response += `❌ <span class="text-red-400">${outOfStock} products</span> temporarily out of stock<br><br>`;
        if (outOfStock > 0) {
            response += `🔔 Would you like me to notify you when out-of-stock items become available?`;
        }
        return response;
    }

    // Generate comparison response
    function generateComparisonResponse(message) {
        const words = message.toLowerCase().split(/\s+/);
        const potentialProducts = products.filter(product => 
            words.some(word => product.name?.toLowerCase().includes(word))
        ).slice(0, 2);
        if (potentialProducts.length < 2) {
            return "🔍 I'd be happy to help you compare products! Please specify which products you'd like to compare, for example: 'Compare iPhone 15 Pro Max vs Samsung Galaxy S24'";
        }
        let response = `⚖️ <strong>Product Comparison:</strong><br><br>`;
        potentialProducts.forEach((product, index) => {
            response += `
                <div class="bg-gray-700 rounded-lg p-3 mb-3">
                    <h4 class="font-bold text-blue-400 mb-2">${index + 1}. ${product.name}</h4>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div>💰 <strong>Price:</strong> ${product.dis_price}</div>
                        <div>🏷️ <strong>Type:</strong> ${product.type}</div>
                        <div>📦 <strong>Stock:</strong> ${product.in_stock ? 'Available' : 'Out of Stock'}</div>
                        <div>🛡️ <strong>Warranty:</strong> ${product.warranty}</div>
                    </div>
                    <div class="mt-2">
                        <strong>Key Features:</strong> ${product.features?.slice(0, 3).join(', ') || 'None'}
                    </div>
                </div>
            `;
        });
        response += `<br>💡 Need help deciding? I can provide more detailed comparisons or recommendations based on your specific needs!`;
        return response;
    }

    // Generate help response
    function generateHelpResponse() {
        return `🤖 <strong>I'm your NovaLink AI Assistant!</strong> Here's what I can help you with:<br><br>
        🔍 <strong>Product Search:</strong><br>
        • "Show me gaming laptops"<br>
        • "I need a graphics card under 200k"<br>
        • "What phones do you have?"<br><br>
        💰 <strong>Deals & Pricing:</strong><br>
        • "What deals are available?"<br>
        • "Compare iPhone vs Samsung"<br>
        • "Show me discounted items"<br><br>
        📦 <strong>Stock & Availability:</strong><br>
        • "Is the PS5 in stock?"<br>
        • "What's available today?"<br><br>
        📞 <strong>Store Information:</strong><br>
        • "Contact details"<br>
        • "Store location and hours"<br>
        • "Warranty information"<br><br>
        💡 <strong>Smart Recommendations:</strong><br>
        • "Best laptop for gaming"<br>
        • "Budget PC build components"<br>
        • "Premium smartphones"<br><br>
        Just ask me anything! I understand natural language. 😊`;
    }

    // Utility functions
    function getRandomResponse(responseArray) {
        return responseArray[Math.floor(Math.random() * responseArray.length)];
    }

    function calculateDiscount(retailPrice, discountedPrice) {
        const retail = parseFloat(retailPrice.replace(/[^\d.-]/g, ''));
        const discounted = parseFloat(discountedPrice.replace(/[^\d.-]/g, ''));
        return Math.round(((retail - discounted) / retail) * 100);
    }

    // Product interaction functions
    window.showProductDetail = function(productId) {
        const product = products.find(p => p.id == productId);
        if (product) {
            const detail = `
                <div class="bg-gray-700 rounded-lg p-4">
                    <h3 class="font-bold text-white mb-3">${product.name}</h3>
                    <div class="grid grid-cols-2 gap-3 text-sm mb-3">
                        <div><strong>Type:</strong> ${product.type}</div>
                        <div><strong>Price:</strong> <span class="text-green-400">${product.dis_price}</span></div>
                        <div><strong>Warranty:</strong> ${product.warranty}</div>
                        <div><strong>Stock:</strong> ${product.in_stock ? '<span class="text-green-400">Available</span>' : '<span class="text-red-400">Out of Stock</span>'}</div>
                    </div>
                    <p class="text-gray-300 mb-3">${product.desc}</p>
                    <div class="mb-3">
                        <strong>Features:</strong><br>
                        <div class="grid grid-cols-1 gap-1 mt-1">
                            ${product.features?.map(feature => `<div class="text-sm">• ${feature}</div>`).join('') || 'None'}
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm transition-colors flex-1" onclick="viewProduct(${product.id})">
                            View Full Details
                        </button>
                        ${product.in_stock ? 
                            `<button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm transition-colors flex-1" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart" onClick="addToCart(${product.id});"">Add to Cart</button>` :
                            `<button class="bg-gray-600 text-gray-300 px-4 py-2 rounded text-sm cursor-not-allowed flex-1" disabled>Out of Stock</button>`
                        }
                    </div>
                </div>
            `;
            addMessage(detail, 'bot');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    };

    window.viewProduct = function(productId) {
        window.location.href = `/singleProduct?product-id=${productId}`;
    };



    // Event listeners
    sendMessage.addEventListener('click', sendUserMessage);
    userMessage.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendUserMessage();
        }
    });
    document.getElementById('voiceBtn').addEventListener('click', function() {
        addMessage("🎤 Voice input feature coming soon! For now, please type your message.", 'bot');
    });
    document.addEventListener('click', function(event) {
        if (!messageBtn.contains(event.target) && !chatPopup.contains(event.target)) {
            chatPopup.classList.add('hidden');
        }
    });

    // Periodic animation
    setInterval(() => {
        if (!chatPopup.classList.contains('hidden') && Math.random() < 0.1) {
            const avatar = document.querySelector('.bg-gradient-to-r.from-blue-500.to-purple-500');
            if (avatar) {
                avatar.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    avatar.style.transform = 'scale(1)';
                }, 200);
            }
        }
    }, 10000);

    // Initialize chatbot
    initializeChatbot();
});
</script>