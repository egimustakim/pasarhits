<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name'];

    public function setNameAttribute($value)
    {
        $this->attributes['name']= ucwords($value);
    }

}
