<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id', 'brand_id', 'color_id', 'material_id', 'price', 'user_id', 'isPublished'
    ];

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function category()
    {
        return $this->hasOne('App\Category', 'category_id', 'id');
    }

    public function brand()
    {
        return $this->hasOne('App\Brand', 'brand_id', 'id');
    }

    public function color()
    {
        return $this->hasOne('App\Color', 'color_id', 'id');
    }

    public function material()
    {
        return $this->hasOne('App\Material', 'material_id', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'user_id', 'id');
    }

}
