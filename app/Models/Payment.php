<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'customer_id',
        'total',
        'note',
        'payment_status_id',
        'address1',
        'address2',
        'city',
        'postal_code' ,
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relationship with PaymentStatus
    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class);
    }

    // Enable timestamps (created_at and updated_at)
    public $timestamps = true;
}

