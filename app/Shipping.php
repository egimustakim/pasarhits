<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';

    protected $fillable = ['name', 'type'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = strtoupper($value);
    }
}
