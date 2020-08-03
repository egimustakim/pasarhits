<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminroles extends Model
{
    protected $table = 'adminroles';

    protected $fillable = ['role_id', 'admin_id'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
