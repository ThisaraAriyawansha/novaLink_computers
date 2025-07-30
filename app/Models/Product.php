<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'brand',
        'type',
        'tags',
        'description',
        'discounted_price',
        'retail_price',
        'warranty',
        'in_stock',
        'qty',
        'status_id',
        'image',
        'deal_start',
        'deal_end',
    ];

    // Relationship with Product Features
    public function features()
    {
        return $this->hasMany(ProductFeature::class, 'product_id');
    }

    // Relationship with Product Tags
    public function tags()
    {
        return $this->hasMany(ProductTag::class, 'product_id');
    }

    // Relationship with Product Status
    public function status()
    {
        return $this->belongsTo(ProductStatus::class, 'status_id');
    }

    // In Product model
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }






    // Enable timestamps (created_at and updated_at)
    public $timestamps = true;
}
