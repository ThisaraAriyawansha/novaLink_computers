<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'image',
        'date',
        'title',
        'description',
        'tag'
    ];

    protected $casts = [
        'date' => 'date', // Cast the 'date' column to a Carbon instance
    ];
}