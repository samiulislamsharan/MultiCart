<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\URL;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'parent_category_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->with('productAttributes');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id', 'id');
    }

    protected function Image(): Attribute
    {
        return Attribute::make(function ($value) {
            return URL::to($value);
        });
    }
}