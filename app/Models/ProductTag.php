<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;

    protected $table = 'product_tags';

    protected $fillable = [
        'product_id',
        'tag_name',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
