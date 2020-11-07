<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function image()
    {
        return $this->belongsTo('App\Models\Products\Image', 'image_id');
    }

    public function warehouses()
    {
        return $this->hasMany('App\Models\Products\Warehouse');
    }
}
