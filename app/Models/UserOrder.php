<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'total_amount',
        'coupon',
        'payment_method',
        'shipping_method',
    ];
}