<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = [
        'size_id', 'product_id', 'sku', 'stock'
    ];
}
