<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\LLMCache;

class DeepSeekService
{
    private $apiKey;
    private $baseUrl;
    private $model;
    private $maxTokens;

    public function __construct()
    {
        $this->apiKey = config('llm.deepseek.api_key');
        $this->baseUrl = config('llm.deepseek.base_url');
        $this->model = config('llm.deepseek.model');
        $this->maxTokens = (int) config('llm.deepseek.max_tokens', 4000);
        
        if (empty($this->apiKey)) {
            Log::warning('DeepSeekService: API key not configured');
        }
        
        Log::info('DeepSeekService: Initialized', [
            'api_key_set' => !empty($this->apiKey),
            'base_url' => $this->baseUrl,
            'model' => $this->model
        ]);
    }

    public function chat($messages, $context = null)
    {
        Log::info('DeepSeekService: chat method called', [
            'messages_count' => count($messages),
            'has_context' => !empty($context)
        ]);

        // Validate API configuration
        if (empty($this->apiKey) || empty($this->baseUrl)) {
            Log::warning('DeepSeekService: Missing API configuration, using fallback');
            return $this->localFallback($messages, $context);
        }

        // Try DeepSeek API first
        $apiResponse = $this->callDeepSeekAPI($messages, $context);
        
        if ($apiResponse['success']) {
            return $apiResponse;
        }
        
        // If API fails, use local fallback
        Log::warning('DeepSeekService: API failed, using fallback', [
            'error' => $apiResponse['error'] ?? 'Unknown error'
        ]);
        return $this->localFallback($messages, $context);
    }

    private function callDeepSeekAPI($messages, $context)
    {
        $cacheKey = $this->generateCacheKey($messages, $context);
        
        // Check cache first
        if (config('llm.cache.enabled', true)) {
            $cachedResponse = $this->getCachedResponse($cacheKey);
            if ($cachedResponse) {
                Log::info('DeepSeekService: Returning cached response');
                return [
                    'success' => true,
                    'content' => $cachedResponse,
                    'tokens_used' => 0,
                    'cached' => true
                ];
            }
        }

        try {
            // Prepare request data
            $requestData = [
                'model' => $this->model,
                'messages' => $this->prepareMessages($messages),
                'max_tokens' => $this->maxTokens,
                'temperature' => config('llm.deepseek.temperature', 0.7),
                'stream' => false,
                'top_p' => config('llm.deepseek.top_p', 0.95),
            ];

            Log::info('DeepSeekService: Sending API request', [
                'model' => $this->model,
                'messages_count' => count($requestData['messages']),
                'max_tokens' => $this->maxTokens
            ]);

            $response = Http::timeout(config('llm.deepseek.timeout', 60))
                ->retry(2, 1000) // Retry 2 times with 1 second delay
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ])->post($this->baseUrl . '/chat/completions', $requestData);

            if ($response->successful()) {
                $result = $response->json();
                
                // Validate response structure
                if (!isset($result['choices'][0]['message']['content'])) {
                    throw new \Exception('Invalid API response structure');
                }
                
                $content = $result['choices'][0]['message']['content'];
                $tokensUsed = $result['usage']['total_tokens'] ?? 0;
                
                Log::info('DeepSeekService: API request successful', [
                    'tokens_used' => $tokensUsed,
                    'response_length' => strlen($content)
                ]);
                
                // Cache successful response
                if (config('llm.cache.enabled', true)) {
                    $this->cacheResponse($cacheKey, $messages, $content, $context, $tokensUsed);
                }
                
                return [
                    'success' => true,
                    'content' => $content,
                    'tokens_used' => $tokensUsed
                ];
            } else {
                $errorBody = $response->body();
                $errorData = json_decode($errorBody, true);
                $errorMessage = $errorData['error']['message'] ?? $errorBody;
                
                Log::error('DeepSeekService: API failed', [
                    'status' => $response->status(),
                    'error' => $errorMessage
                ]);

                return [
                    'success' => false,
                    'error' => $errorMessage
                ];
            }

        } catch (\Illuminate\Http\Client\RequestException $e) {
            Log::error('DeepSeekService: HTTP request exception', [
                'message' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'error' => 'Network error: ' . $e->getMessage()
            ];
        } catch (\Exception $e) {
            Log::error('DeepSeekService: API exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'success' => false,
                'error' => 'API error: ' . $e->getMessage()
            ];
        }
    }

    private function prepareMessages($messages)
    {
        // Ensure messages don't exceed token limits
        $preparedMessages = [];
        $totalLength = 0;
        $maxContextLength = config('llm.deepseek.max_context_length', 16000);

        // Always include system message first
        foreach ($messages as $message) {
            if ($message['role'] === 'system') {
                $preparedMessages[] = $message;
                $totalLength += strlen($message['content']);
                break;
            }
        }

        // Add user/assistant messages in reverse order (most recent first)
        $userMessages = array_reverse(array_filter($messages, function($msg) {
            return $msg['role'] !== 'system';
        }));

        foreach ($userMessages as $message) {
            $messageLength = strlen($message['content']);
            if ($totalLength + $messageLength > $maxContextLength) {
                break;
            }
            array_unshift($preparedMessages, $message);
            $totalLength += $messageLength;
        }

        return $preparedMessages;
    }

    private function localFallback($messages, $context)
    {
        // Extract the last user message
        $lastUserMessage = '';
        foreach (array_reverse($messages) as $message) {
            if ($message['role'] === 'user') {
                $lastUserMessage = $message['content'];
                break;
            }
        }
        
        if (empty($lastUserMessage)) {
            $lastUserMessage = end($messages)['content'] ?? '';
        }

        Log::info('DeepSeekService: Using local fallback', [
            'message_preview' => substr($lastUserMessage, 0, 100)
        ]);

        // Simple pattern matching for common queries
        $response = $this->generateLocalResponse($lastUserMessage, $context);
        
        return [
            'success' => true,
            'content' => $response,
            'tokens_used' => 0,
            'fallback' => true
        ];
    }

    private function generateLocalResponse($message, $context)
    {
        $message = strtolower(trim($message));
        $products = $context['products'] ?? [];

        // Enhanced pattern matching
        $patterns = [
            'greeting' => ['hi', 'hello', 'hey', 'hola', 'greetings', 'good morning', 'good afternoon'],
            'gaming' => ['gaming', 'game', 'play', 'fps', 'graphics', 'performance'],
            'video_editing' => ['video edit', 'editing', 'render', 'premiere', 'davinci', 'after effects'],
            'upgrade' => ['upgrade', 'improve', 'better', 'faster', 'replace'],
            'comparison' => ['compare', 'vs', 'versus', 'difference', 'better than'],
            'budget' => ['budget', 'cheap', 'affordable', 'price', 'cost', '$'],
            'build' => ['build', 'assemble', 'setup', 'custom', 'configure'],
            'laptop' => ['laptop', 'notebook', 'portable', 'mobile'],
            'workstation' => ['workstation', 'work', 'productivity', 'office']
        ];

        // Check patterns
        foreach ($patterns as $category => $keywords) {
            foreach ($keywords as $keyword) {
                if (str_contains($message, $keyword)) {
                    return $this->generateCategoryResponse($category, $products, $message);
                }
            }
        }

        // Default response
        return $this->getDefaultResponse();
    }

    private function generateCategoryResponse($category, $products, $message)
    {
        switch ($category) {
            case 'greeting':
                return "Hello! I'm NovaLink AI assistant. I can help you with PC building advice, component recommendations, and technical guidance. What type of PC are you looking to build today?";

            case 'gaming':
                return $this->generateGamingPCResponse($products);

            case 'video_editing':
                return $this->generateVideoEditingResponse($products);

            case 'upgrade':
                return $this->generateUpgradeResponse($products);

            case 'comparison':
                return $this->generateComparisonResponse($message);

            case 'budget':
                return $this->generateBudgetResponse($message, $products);

            case 'build':
                return $this->generateBuildResponse($products);

            case 'laptop':
                return $this->generateLaptopResponse($products);

            case 'workstation':
                return $this->generateWorkstationResponse($products);

            default:
                return $this->getDefaultResponse();
        }
    }

    // Enhanced response generators
    private function generateGamingPCResponse($products)
    {
        $gamingProducts = array_filter($products, function($product) {
            $searchTerms = ['gaming', 'tuf', 'rog', 'rtx', 'gtx', 'radeon'];
            $productText = strtolower($product['name'] . ' ' . $product['type']);
            
            foreach ($searchTerms as $term) {
                if (str_contains($productText, $term)) {
                    return true;
                }
            }
            return false;
        });

        if (empty($gamingProducts)) {
            return "For gaming PCs, I'd recommend focusing on these key components:\n\n" .
                   "• **Graphics Card**: Most important for gaming performance\n" .
                   "• **Processor**: Intel Core i5/i7 or AMD Ryzen 5/7\n" .
                   "• **RAM**: 16GB DDR4/DDR5 for modern games\n" .
                   "• **Storage**: SSD for faster loading times\n\n" .
                   "What's your budget range and what games do you want to play?";
        }

        $response = "Here are some excellent gaming options from our store:\n\n";
        
        foreach (array_slice($gamingProducts, 0, 3) as $product) {
            $response .= "• **{$product['name']}** - \${$product['dis_price']}\n";
            if (!empty($product['features'])) {
                $response .= "  Features: " . implode(', ', array_slice($product['features'], 0, 2)) . "\n";
            }
            $response .= "\n";
        }

        $response .= "What's your target resolution and budget for gaming?";
        
        return $response;
    }

    private function generateVideoEditingResponse($products)
    {
        return "For video editing workstations, prioritize these components:\n\n" .
               "• **CPU**: Multi-core processors (Intel i9 or AMD Ryzen 9)\n" .
               "• **RAM**: 32GB+ for 4K editing, 16GB minimum for 1080p\n" .
               "• **Storage**: Fast NVMe SSD for active projects + HDD for storage\n" .
               "• **GPU**: CUDA cores for Adobe Premiere, OpenCL for DaVinci Resolve\n\n" .
               "From our current stock:\n" .
               "• Intel Core i9 - \$85,000 (Excellent for rendering)\n" .
               "• G.SKILL Trident Z Neo 16GB - \$18,000 (Consider 32GB kit)\n\n" .
               "What video editing software will you be using?";
    }

    private function generateBuildResponse($products)
    {
        return "I'd love to help you build a custom PC! To give you the best recommendations, please tell me:\n\n" .
               "1. **Primary Use**: Gaming, work, content creation?\n" .
               "2. **Budget Range**: What's your total budget?\n" .
               "3. **Performance Target**: 1080p/1440p/4K gaming? Specific software?\n" .
               "4. **Size Preference**: Full tower, mid-tower, or compact build?\n\n" .
               "Based on our current inventory, I can suggest compatible components that will work great together!";
    }

    private function generateLaptopResponse($products)
    {
        $laptops = array_filter($products, function($product) {
            return str_contains(strtolower($product['type']), 'laptop') ||
                   str_contains(strtolower($product['name']), 'laptop');
        });

        if (empty($laptops)) {
            return "I can help you choose the right laptop! Key things to consider:\n\n" .
                   "• **Portability**: Weight and battery life\n" .
                   "• **Performance**: Gaming, productivity, or everyday tasks\n" .
                   "• **Display**: Screen size and resolution\n" .
                   "• **Budget**: Your price range in LKR\n\n" .
                   "What will you primarily use the laptop for?";
        }

        $response = "Here are our available laptops:\n\n";
        foreach (array_slice($laptops, 0, 3) as $laptop) {
            $price = is_numeric($laptop['dis_price'])
                ? number_format((float) $laptop['dis_price'], 0) . ' LKR'
                : $laptop['dis_price'];
            $response .= "• **{$laptop['name']}** — {$price}\n";
        }

        return $response . "\nWhat's your intended use and budget?";
    }

    private function generateUpgradeResponse($products)
    {
        return "Great — let's upgrade your PC! To give you the best advice, please tell me:\n\n" .
               "• **Current specs**: What CPU, RAM, and GPU do you have now?\n" .
               "• **Pain point**: What feels slow or limited?\n" .
               "• **Budget**: How much are you looking to spend (LKR)?\n\n" .
               "Common high-impact upgrades:\n" .
               "• **RAM** → big boost for multitasking (8GB → 16GB or 32GB)\n" .
               "• **SSD** → dramatically faster load times than HDD\n" .
               "• **GPU** → best upgrade for gaming performance\n" .
               "• **CPU** → best for rendering, streaming, or heavy workloads\n\n" .
               "Share your current setup and I'll recommend the best upgrade path!";
    }

    private function generateBudgetResponse($message, $products)
    {
        // Try to extract a budget figure from the message
        preg_match('/(\d[\d,]*)\s*(lkr|rs|k)?/i', $message, $matches);
        $budget = isset($matches[1]) ? (int) str_replace(',', '', $matches[1]) : null;
        if ($budget && isset($matches[2]) && strtolower($matches[2]) === 'k') {
            $budget *= 1000;
        }

        if ($budget) {
            $formatted = number_format($budget) . ' LKR';
            return "With a **{$formatted}** budget, here's what I'd suggest:\n\n" .
                   ($budget < 80000
                       ? "• **Office/Student PC**: Basic productivity — web, documents, light multitasking\n" .
                         "• Ryzen 3 / Intel Core i3, 8GB RAM, 256GB SSD, integrated graphics\n"
                       : ($budget < 150000
                           ? "• **Mid-Range Build**: Gaming at 1080p, content creation, coding\n" .
                             "• Ryzen 5 / Core i5, 16GB RAM, 512GB NVMe SSD, entry GPU\n"
                           : ($budget < 300000
                               ? "• **High-End Gaming Rig**: Smooth 1440p gaming, streaming\n" .
                                 "• Ryzen 7 / Core i7, 32GB DDR5, 1TB NVMe, mid-range GPU\n"
                               : "• **Workstation / Enthusiast**: 4K gaming, video editing, 3D rendering\n" .
                                 "• Ryzen 9 / Core i9, 32–64GB RAM, fast NVMe, high-end GPU\n"))) .
                   "\nWould you like me to recommend specific products from our store within this budget?";
        }

        return "I'd love to help you find the best value build! Please share your **budget in LKR** and your **primary use case** (gaming, office work, video editing, etc.) and I'll put together the perfect component list.";
    }

    private function generateWorkstationResponse($products)
    {
        return "For a **professional workstation**, focus on these priorities:\n\n" .
               "• **CPU**: High core count — AMD Threadripper, Ryzen 9, or Intel Core i9\n" .
               "• **RAM**: 32GB minimum; 64GB+ for video editing and 3D work\n" .
               "• **Storage**: Fast NVMe SSD for active projects + large HDD for archive\n" .
               "• **GPU**: Depends on workload:\n" .
               "  — Video editing: CUDA cores (NVIDIA RTX) for Adobe Premiere / DaVinci\n" .
               "  — 3D rendering: High VRAM GPU\n" .
               "  — CAD: Professional GPU (Quadro / Radeon Pro)\n" .
               "• **Cooling**: Liquid AIO or high-end air cooler for sustained performance\n\n" .
               "What software or tasks will this workstation run? I can tailor specific recommendations from our stock.";
    }

    private function generateComparisonResponse($message)
    {
        return "I'd be happy to compare products for you! To give you a useful breakdown, please tell me:\n\n" .
               "• The **two products** you want to compare (e.g., \"RTX 4070 vs RX 7800 XT\")\n" .
               "• Your **use case** (gaming at 1080p/1440p/4K, content creation, etc.)\n" .
               "• Your **budget** (optional)\n\n" .
               "I can compare specs, price-to-performance, and which one suits your needs better. What would you like to compare?";
    }

    private function getDefaultResponse()
    {
        return "I'm your **NovaLink AI** assistant — happy to help! I can assist with:\n\n" .
               "• Custom PC builds for any budget\n" .
               "• Component recommendations from our store\n" .
               "• Gaming, workstation, and office setups\n" .
               "• Upgrade advice for your existing PC\n" .
               "• Product comparisons and spec breakdowns\n" .
               "• Store info (location, hours, contact)\n\n" .
               "What would you like help with today?";
    }

    // ... (keep existing cache methods unchanged)
    private function generateCacheKey($messages, $context)
    {
        $messageContent = json_encode($messages) . json_encode($context);
        return 'llm_' . md5($messageContent);
    }

    private function getCachedResponse($cacheKey)
    {
        try {
            return Cache::remember($cacheKey, config('llm.cache.ttl', 3600), function () use ($cacheKey) {
                $cached = LLMCache::where('prompt_hash', $cacheKey)->first();
                return $cached ? $cached->response_text : null;
            });
        } catch (\Exception $e) {
            Log::error('DeepSeekService: Cache retrieval failed', ['error' => $e->getMessage()]);
            return null;
        }
    }

    private function cacheResponse($cacheKey, $messages, $response, $context, $tokensUsed)
    {
        try {
            LLMCache::updateOrCreate(
                ['prompt_hash' => $cacheKey],
                [
                    'prompt_text' => json_encode($messages),
                    'response_text' => $response,
                    'context_data' => $context ? json_encode($context) : null,
                    'tokens_used' => $tokensUsed
                ]
            );
        } catch (\Exception $e) {
            Log::error('DeepSeekService: Cache storage failed', ['error' => $e->getMessage()]);
            // Silent fail for cache errors
        }
    }
}