<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    use HasFactory;

    protected $table = 'product_status';

    protected $fillable = [
        'status_name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'status_id');
    }

}
