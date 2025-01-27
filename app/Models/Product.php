<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\URL;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'category_id',
        'brand_id',
        'item_code',
        'description',
        'keywords',
        'tax_id',
    ];

    public function attribute()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id')->with('attribute_values');
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttr::class, 'product_id', 'id')->with('images');
    }

    protected function Image(): Attribute
    {
        return Attribute::make(function ($value) {
            return URL::to($value);
        });
    }
}
