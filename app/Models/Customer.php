<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Specify which fields are mass assignable
    protected $fillable = [
        'username',
        'password',
        'fname',
        'lname',
        'phone',
        'email',
    ];

    // Hide the password field from being exposed
    protected $hidden = [
        'password',
    ];
}
