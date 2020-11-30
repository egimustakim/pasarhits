<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = [
        'size_id', 'product_id', 'stock'
    ];

    public function size()
    {
        return $this->hasOne('App\Size', 'id', 'size_id');
    }

    public function product()
    {
        return $this->belongTo('App\Product', 'product_id', 'id');
    }
}
