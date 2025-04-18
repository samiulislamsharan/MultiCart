<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id',
        'attribute_value_id',
    ];

    public function attribute_values()
    {
        return $this->hasOne(AttributeValue::class, 'id', 'attribute_value_id');
    }
}