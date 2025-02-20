<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_type',
        'product_id',
        'product_attr_id',
        'quantity',
    ];

    protected $hidden = [
        'id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id')->with('productAttributes');
    }
}
