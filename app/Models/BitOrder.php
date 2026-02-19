<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BitOrder extends Model
{
    protected $table = 'bitorders';

    protected $fillable = [
        'customer_id',
        'address_line1',
        'address_line2',
        'city',
        'postal_code',
        'additional_information',
        'product_id',
        'product_name',
        'price',
        'payment_status_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class);
    }
}
