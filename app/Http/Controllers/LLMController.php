<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Services\DeepSeekService;
use App\Models\AIConversation;
use App\Models\AIMessage;
use App\Models\Product;

class LLMController extends Controller
{
    private $deepSeekService;

    public function __construct(DeepSeekService $deepSeekService)
    {
        $this->deepSeekService = $deepSeekService;
    }

    public function show()
    {
        try {
            Log::info('LLMController: show method called');
            
            $products = Product::with(['features'])
                ->where('status_id', 1)
                ->get()
                ->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'type' => $product->type,
                        'tags' => $product->tags,
                        'desc' => $product->description,
                        'dis_price' => $product->discounted_price,
                        'ret_price' => $product->retail_price,
                        'features' => $product->features->pluck('feature_name')->toArray(),
                        'warranty' => $product->warranty,
                        'in_stock' => $product->in_stock,
                        'image' => asset($product->image),
                    ];
                });

            Log::info('LLMController: Products loaded', ['count' => count($products)]);

            // Get or create conversation using session only
            $conversation = $this->getOrCreateConversation();
            Log::info('LLMController: Conversation loaded', ['conversation_id' => $conversation->id]);
            
            $messages = $conversation->messages()->latest()->take(20)->get()->reverse();
            Log::info('LLMController: Messages loaded', ['count' => count($messages)]);

            return view('LLM.llm', [
                'products' => $products,
                'conversation' => $conversation,
                'messages' => $messages
            ]);

        } catch (\Exception $e) {
            Log::error('LLMController show method error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Fallback view with empty data
            return view('LLM.llm', [
                'products' => [],
                'conversation' => null,
                'messages' => collect()
            ]);
        }
    }

    public function chat(Request $request)
    {
        Log::info('LLMController: chat method called', ['input' => $request->all()]);
        
        DB::beginTransaction();
        
        try {
            $request->validate([
                'message' => 'required|string|max:1000'
            ]);

            $userMessage = $request->input('message');
            $products = $request->input('products', []);
            
            Log::info('LLMController: Validated input', [
                'message_length' => strlen($userMessage),
                'products_count' => count($products)
            ]);

            // Get or create conversation using session only
            $conversation = $this->getOrCreateConversation();
            Log::info('LLMController: Conversation retrieved', ['conversation_id' => $conversation->id]);

            // Save user message
            $userMessageRecord = AIMessage::create([
                'conversation_id' => $conversation->id,
                'role' => 'user',
                'content' => $userMessage
            ]);
            Log::info('LLMController: User message saved', ['message_id' => $userMessageRecord->id]);

            // Prepare system prompt with product context
            $systemPrompt = $this->buildSystemPrompt($products);
            Log::info('LLMController: System prompt prepared', ['length' => strlen($systemPrompt)]);

            // Get conversation history (last 10 messages for context)
            $recentMessages = $conversation->messages()
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get()
                ->reverse()
                ->map(function ($msg) {
                    return [
                        'role' => $msg->role,
                        'content' => $msg->content
                    ];
                })
                ->toArray();

            Log::info('LLMController: Recent messages loaded', ['count' => count($recentMessages)]);

            // Build messages array for API
            $messages = [
                ['role' => 'system', 'content' => $systemPrompt]
            ];
            
            $messages = array_merge($messages, $recentMessages);
            $messages[] = ['role' => 'user', 'content' => $userMessage];

            Log::info('LLMController: Sending request to DeepSeek API', [
                'total_messages' => count($messages),
                'last_message' => substr($userMessage, 0, 100) . '...'
            ]);

            // Call DeepSeek API
            $aiResponse = $this->deepSeekService->chat($messages, ['products' => $products]);
            Log::info('LLMController: DeepSeek API response', ['success' => $aiResponse['success']]);

            if ($aiResponse['success']) {
                // Save AI response
                $aiMessageRecord = AIMessage::create([
                    'conversation_id' => $conversation->id,
                    'role' => 'assistant',
                    'content' => $aiResponse['content'],
                    'tokens_used' => $aiResponse['tokens_used'] ?? 0
                ]);
                Log::info('LLMController: AI message saved', ['message_id' => $aiMessageRecord->id]);

                // Update conversation
                $conversation->update([
                    'message_count' => $conversation->message_count + 2,
                    'title' => $conversation->title ?: $this->generateTitle($userMessage)
                ]);
                Log::info('LLMController: Conversation updated');

                DB::commit();

                return response()->json([
                    'success' => true,
                    'response' => $aiResponse['content'],
                    'message_id' => $aiMessageRecord->id
                ]);

            } else {
                DB::rollBack();
                Log::error('LLMController: DeepSeek API failed', ['error' => $aiResponse['error'] ?? 'Unknown error']);
                
                return response()->json([
                    'success' => false,
                    'response' => $aiResponse['content'] ?? 'Sorry, the AI service is currently unavailable.'
                ]);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('LLMController: Validation error', ['errors' => $e->errors()]);
            
            return response()->json([
                'success' => false,
                'response' => 'Invalid input. Please check your message and try again.'
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('LLMController: Unexpected error in chat method', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'response' => 'Sorry, I encountered an unexpected error. Please try again.'
            ]);
        }
    }

    public function getConversationHistory()
    {
        try {
            Log::info('LLMController: getConversationHistory called');
            
            $conversation = $this->getOrCreateConversation();
            Log::info('LLMController: Conversation found', ['id' => $conversation->id]);

            $messages = $conversation->messages()
                ->orderBy('created_at', 'asc')
                ->get()
                ->map(function ($message) {
                    return [
                        'id' => $message->id,
                        'role' => $message->role,
                        'content' => $message->content,
                        'timestamp' => $message->created_at->toISOString()
                    ];
                });

            Log::info('LLMController: Messages retrieved', ['count' => count($messages)]);

            return response()->json([
                'success' => true,
                'messages' => $messages,
                'conversation_title' => $conversation->title
            ]);

        } catch (\Exception $e) {
            Log::error('LLMController: getConversationHistory error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'error' => 'Failed to load conversation history'
            ]);
        }
    }

    public function clearConversation()
    {
        try {
            Log::info('LLMController: clearConversation called');
            
            $conversation = $this->getOrCreateConversation();
            Log::info('LLMController: Conversation to clear', ['id' => $conversation->id]);
            
            $messageCount = $conversation->messages()->count();
            $conversation->messages()->delete();
            $conversation->delete();
            
            Log::info('LLMController: Conversation cleared', ['deleted_messages' => $messageCount]);

            // Create a new empty conversation
            $newConversation = $this->getOrCreateConversation(true);
            Log::info('LLMController: New conversation created', ['id' => $newConversation->id]);

            return response()->json([
                'success' => true,
                'message' => 'Conversation cleared successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('LLMController: clearConversation error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'error' => 'Failed to clear conversation'
            ]);
        }
    }

    private function getOrCreateConversation($forceNew = false)
    {
        try {
            $sessionId = session()->getId();
            Log::info('LLMController: getOrCreateConversation', ['sessionId' => $sessionId, 'forceNew' => $forceNew]);
            
            if ($forceNew) {
                // Delete old conversation and create new one
                $deleted = AIConversation::where('session_id', $sessionId)->delete();
                Log::info('LLMController: Force new conversation', ['deleted_count' => $deleted]);
            }
            
            $conversation = AIConversation::where('session_id', $sessionId)->first();
            
            if (!$conversation) {
                Log::info('LLMController: Creating new conversation');
                $conversation = AIConversation::create([
                    'session_id' => $sessionId,
                    'title' => 'New Conversation',
                    'message_count' => 0
                ]);
                
                // Add welcome message
                AIMessage::create([
                    'conversation_id' => $conversation->id,
                    'role' => 'assistant',
                    'content' => 'Hello! I\'m your NovaLink AI assistant. How can I help you with PC building today?'
                ]);
                
                Log::info('LLMController: New conversation created with welcome message', ['id' => $conversation->id]);
            } else {
                Log::info('LLMController: Existing conversation found', ['id' => $conversation->id]);
            }
            
            return $conversation;
            
        } catch (\Exception $e) {
            Log::error('LLMController: getOrCreateConversation error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    private function buildSystemPrompt($products)
    {
        $productContext = $this->prepareProductContext($products);
        
        return "You are NovaLink AI, an expert PC building assistant for NovaLink Computers. You help users build PCs, recommend components, and provide technical advice.

Available Products in Store:
{$productContext}

Guidelines:
- Be helpful, friendly, and professional
- Recommend specific products from available inventory when possible
- Provide technical explanations in simple terms
- Suggest compatible components when discussing builds
- Mention prices and key features when recommending products
- If unsure about something, admit it rather than guessing
- Keep responses concise but informative
- Focus on helping users make informed decisions

Always prioritize recommending from the available products list above.";
    }

    private function prepareProductContext($products)
    {
        if (empty($products)) {
            return "No specific products available at the moment.";
        }

        $context = "";
        foreach ($products as $product) {
            $context .= "• {$product['name']} ({$product['type']}) - \${$product['dis_price']}";
            if (!empty($product['features'])) {
                $context .= " - Features: " . implode(', ', array_slice($product['features'], 0, 3));
            }
            $context .= "\n";
        }
        return $context;
    }

    private function generateTitle($firstMessage)
    {
        $message = strtolower($firstMessage);
        if (str_contains($message, 'gaming')) return 'Gaming PC Discussion';
        if (str_contains($message, 'budget')) return 'Budget PC Build';
        if (str_contains($message, 'workstation')) return 'Workstation Setup';
        if (str_contains($message, 'upgrade')) return 'PC Upgrade Advice';
        if (str_contains($message, 'laptop')) return 'Laptop Recommendation';
        
        return 'PC Building Assistance';
    }
}