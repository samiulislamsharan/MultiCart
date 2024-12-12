<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'attributes_id',
        'value'
    ];

    public function singleAttribute()
    {
        return $this->hasOne(Attribute::class, 'id', 'attributes_id');
    }
}