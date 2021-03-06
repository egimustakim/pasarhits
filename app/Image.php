<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['product_id', 'name', 'guide'];

    public function product()
    {
        return $this->belongTo('App\Product', 'product_id', 'id');
    }
}
