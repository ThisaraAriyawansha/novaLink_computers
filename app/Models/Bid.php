<?php

// app/Models/Bid.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'bid_amount','customer_id','status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
