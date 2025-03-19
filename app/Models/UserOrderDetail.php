<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'product_attr_id',
        'total_amount',
        'quantity',
    ];
}