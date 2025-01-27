<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\URL;

class HomeBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'image',
        'link',
    ];

    protected function Image(): Attribute
    {
        return Attribute::make(function ($value) {
            return URL::to($value);
        });
    }
}