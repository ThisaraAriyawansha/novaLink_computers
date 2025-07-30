<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BitOrder extends Model
{
    // Specify the table name
    protected $table = 'bitorders';

    // Mass assignable fields
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
}
