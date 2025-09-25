<?php

return [
    'deepseek' => [
        'api_key' => env('DEEPSEEK_API_KEY'),
        'base_url' => env('DEEPSEEK_API_URL', 'https://api.deepseek.com/v1'),
        'model' => env('DEEPSEEK_MODEL', 'deepseek-chat'),
        'max_tokens' => (int) env('DEEPSEEK_MAX_TOKENS', 2000), // Cast to integer
        'temperature' => 0.7,
    ],
    
    'cache' => [
        'enabled' => env('LLM_CACHE_ENABLED', true),
        'ttl' => (int) env('LLM_CACHE_TTL', 3600), // Cast to integer
    ],
    
    'limits' => [
        'max_messages_per_conversation' => 50,
        'max_conversations_per_user' => 10,
    ],
];