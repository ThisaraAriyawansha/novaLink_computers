<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    use HasFactory;

    protected $table = 'product_features';

    protected $fillable = [
        'product_id',
        'feature_name',
        'feature_value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
