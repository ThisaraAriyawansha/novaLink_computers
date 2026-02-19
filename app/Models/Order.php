<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'qty',
        'payment_id',
        'shop_order_status',
    ];

    // Valid statuses a shop owner can set
    const STATUSES = [
        'pending'    => ['label' => 'Pending',    'color' => '#e65100', 'bg' => '#fff3e0'],
        'processing' => ['label' => 'Processing', 'color' => '#1565c0', 'bg' => '#e3f2fd'],
        'shipped'    => ['label' => 'Shipped',    'color' => '#6a1b9a', 'bg' => '#f3e5f5'],
        'delivered'  => ['label' => 'Delivered',  'color' => '#2e7d32', 'bg' => '#e8f5e9'],
        'cancelled'  => ['label' => 'Cancelled',  'color' => '#c62828', 'bg' => '#ffebee'],
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
