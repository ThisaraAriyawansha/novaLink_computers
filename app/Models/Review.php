<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'name', 'email', 'rating', 'message','status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}