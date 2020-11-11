<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;


class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id', 'brand_id', 'color_id', 'material_id', 'price', 'sku', 'user_id', 'isPublished'
    ];

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function brand()
    {
        return $this->hasOne('App\Brand', 'id', 'brand_id');
    }

    public function color()
    {
        return $this->hasOne('App\Color', 'id', 'color_id');
    }

    public function material()
    {
        return $this->hasOne('App\Material', 'id', 'material_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function meta()
    {
        return $this->hasMany('App\Meta', 'product_id', 'id');
    }

    public function image()
    {
        return $this->hasMany('App\Image', 'product_id', 'id');
    }

}
