<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['name'];

    public function meta()
    {
        return $this->belongsTo('App\Meta', 'size_id', 'id');
    }
}
