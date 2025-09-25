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
        $this->maxTokens = (int) config('llm.deepseek.max_tokens');
        
        Log::info('DeepSeekService: Initialized', [
            'api_key_set' => !empty($this->apiKey)
        ]);
    }

    public function chat($messages, $context = null)
    {
        Log::info('DeepSeekService: chat method called');

        // Try DeepSeek API first
        $apiResponse = $this->callDeepSeekAPI($messages, $context);
        
        if ($apiResponse['success']) {
            return $apiResponse;
        }
        
        // If API fails, use local fallback
        Log::warning('DeepSeekService: API failed, using fallback');
        return $this->localFallback($messages, $context);
    }

    private function callDeepSeekAPI($messages, $context)
    {
        $cacheKey = $this->generateCacheKey($messages, $context);
        
        // Check cache first
        if (config('llm.cache.enabled')) {
            $cachedResponse = $this->getCachedResponse($cacheKey);
            if ($cachedResponse) {
                return [
                    'success' => true,
                    'content' => $cachedResponse,
                    'tokens_used' => 0,
                    'cached' => true
                ];
            }
        }

        try {
            $requestData = [
                'model' => $this->model,
                'messages' => $messages,
                'max_tokens' => $this->maxTokens,
                'temperature' => 0.7,
                'stream' => false
            ];

            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ])->post($this->baseUrl . '/chat/completions', $requestData);

            if ($response->successful()) {
                $result = $response->json();
                $content = $result['choices'][0]['message']['content'];
                $tokensUsed = $result['usage']['total_tokens'] ?? 0;
                
                // Cache successful response
                if (config('llm.cache.enabled')) {
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
                
                Log::error('DeepSeekService: API failed', [
                    'status' => $response->status(),
                    'error' => $errorData['error']['message'] ?? $errorBody
                ]);

                return [
                    'success' => false,
                    'error' => $errorData['error']['message'] ?? 'API request failed'
                ];
            }

        } catch (\Exception $e) {
            Log::error('DeepSeekService: API exception', [
                'message' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    private function localFallback($messages, $context)
    {
        // Extract the last user message
        $lastUserMessage = '';
            $lastUserMessage = null; 
            foreach (array_reverse($messages) as $message) {
                if ($message['role'] === 'user') {
                    $lastUserMessage = $message['content'];
                    break;
                }
            }
        
        if (empty($lastUserMessage)) {
            $lastUserMessage = end($messages)['content'] ?? '';
        }

        Log::info('DeepSeekService: Using local fallback', ['message' => $lastUserMessage]);

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

        // Greetings
        if (in_array($message, ['hi', 'hello', 'hey', 'hola', 'greetings'])) {
            return "Hello! I'm NovaLink AI assistant. I can help you with PC building advice, component recommendations, and technical guidance. How can I assist you today?";
        }

        // Gaming PC requests
        if (str_contains($message, 'gaming') || str_contains($message, 'game')) {
            return $this->generateGamingPCResponse($products);
        }

        // Video editing requests
        if (str_contains($message, 'video edit') || str_contains($message, 'edit')) {
            return $this->generateVideoEditingResponse($products);
        }

        // Upgrade requests
        if (str_contains($message, 'upgrade') || str_contains($message, 'improve')) {
            return $this->generateUpgradeResponse($products);
        }

        // Component comparison
        if (str_contains($message, 'compare') || str_contains($message, 'vs')) {
            return $this->generateComparisonResponse($message);
        }

        // Budget requests
        if (str_contains($message, 'budget') || str_contains($message, '$') || str_contains($message, 'price')) {
            return $this->generateBudgetResponse($message, $products);
        }

        // Default response
        return "I'd be happy to help you with PC building! Could you please provide more details about what you're looking for? For example:\n\n• What's your budget?\n• What will you use the PC for (gaming, video editing, etc.)?\n• Do you need specific components or a complete build?\n\nThis will help me give you the best recommendations from our available products.";
    }

    private function generateGamingPCResponse($products)
    {
        $gamingProducts = array_filter($products, function($product) {
            return str_contains(strtolower($product['type']), 'gaming') || 
                   str_contains(strtolower($product['name']), 'gaming') ||
                   str_contains(strtolower($product['name']), 'tuf') ||
                   str_contains(strtolower($product['name']), 'rog');
        });

        if (empty($gamingProducts)) {
            return "For gaming PCs, I recommend looking at our ASUS TUF GAMING F15 or MSI gaming laptops. For custom builds, consider components like the Intel Core i9 processor and compatible motherboards. What's your budget range?";
        }

        $response = "Here are some excellent gaming options from our store:\n\n";
        
        foreach (array_slice($gamingProducts, 0, 3) as $product) {
            $response .= "• **{$product['name']}** - \${$product['dis_price']}\n";
            if (!empty($product['features'])) {
                $response .= "  Features: " . implode(', ', array_slice($product['features'], 0, 2)) . "\n";
            }
            $response .= "\n";
        }

        $response .= "Would you like me to suggest a custom gaming PC build based on your budget?";
        
        return $response;
    }

    private function generateVideoEditingResponse($products)
    {
        return "For video editing, I recommend focusing on:\n\n" .
               "• **Processor**: Intel Core i9 (\$85,000) - Excellent for rendering\n" .
               "• **RAM**: G.SKILL Trident Z Neo 16GB (\$18,000) or Corsair Vengeance LPX 16GB (\$12,500)\n" .
               "• **Storage**: 1TB HDD (\$20,000) for storage + consider SSD for faster performance\n" .
               "• **Graphics**: GTX 1050Ti 4GB (\$30,000) for basic editing, or consider higher-end options\n\n" .
               "What's your specific video editing software and budget?";
    }

    private function generateUpgradeResponse($products)
    {
        return "To help you upgrade your PC, I'll need to know:\n\n" .
               "1. Your current PC specifications\n" .
               "2. What you use the PC for\n" .
               "3. Your upgrade budget\n\n" .
               "Based on our available products, common upgrades include:\n" .
               "• **RAM Upgrade**: G.SKILL Trident Z Neo 16GB (\$18,000)\n" .
               "• **Storage**: 1TB HDD (\$20,000) or consider SSD options\n" .
               "• **Graphics Card**: GTX 1050Ti 4GB (\$30,000)\n" .
               "• **Cooling**: MSI MAG Coreliquid 240R (\$38,000)\n\n" .
               "What component are you thinking of upgrading?";
    }

    private function generateComparisonResponse($message)
    {
        if (str_contains($message, '4070') || str_contains($message, '7800')) {
            return "While I don't have RTX 4070 or RX 7800 XT in stock currently, here's a general comparison:\n\n" .
                   "**RTX 4070 vs RX 7800 XT**:\n" .
                   "• **RTX 4070**: Better ray tracing, DLSS 3 support, more efficient\n" .
                   "• **RX 7800 XT**: Better raw performance for the price, more VRAM\n" .
                   "• **Recommendation**: For gaming at 1440p, both are excellent. Choose based on price and feature preferences.\n\n" .
                   "We have a GTX 1050Ti available, or I can suggest other components for your build.";
        }
        
        return "I can help compare PC components! Please specify which components you'd like to compare (e.g., processors, graphics cards, etc.).";
    }

    private function generateBudgetResponse($message, $products)
    {
        // Extract budget amount
        preg_match('/\$?(\d+)/', $message, $matches);
        $budget = $matches[1] ?? 100000; // Default $100,000 if no budget specified

        return "For a budget of \${$budget}, here are some great options:\n\n" .
               "**Gaming Laptop**: ASUS TUF GAMING F15 (\$255,000) - Excellent performance\n" .
               "**Desktop Build**: \n" .
               "• Intel Core i9 (\$85,000)\n" .
               "• MSI Motherboard (\$50,000)\n" .
               "• 16GB RAM (\$12,500-\$18,000)\n" .
               "• GTX 1050Ti (\$30,000)\n\n" .
               "Would you like me to create a detailed build within your budget?";
    }

    // ... keep the existing cache methods unchanged
    private function generateCacheKey($messages, $context)
    {
        $messageContent = json_encode($messages) . json_encode($context);
        return 'llm_' . md5($messageContent);
    }

    private function getCachedResponse($cacheKey)
    {
        try {
            return Cache::remember($cacheKey, config('llm.cache.ttl'), function () use ($cacheKey) {
                $cached = LLMCache::where('prompt_hash', $cacheKey)->first();
                return $cached ? $cached->response_text : null;
            });
        } catch (\Exception $e) {
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
            // Silent fail for cache errors
        }
    }
}