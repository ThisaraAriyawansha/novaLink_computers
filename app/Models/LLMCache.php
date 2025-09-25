<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LLMCache extends Model
{
    use HasFactory;

    protected $table = 'llm_cache';

    protected $fillable = [
        'prompt_hash',
        'prompt_text',
        'response_text',
        'context_data',
        'tokens_used'
    ];

    protected $casts = [
        'context_data' => 'array'
    ];
}