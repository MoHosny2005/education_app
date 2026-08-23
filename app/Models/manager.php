<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class manager extends Authenticatable
{
    protected $fillable = [
        'name' ,
        'email' ,
        'password' ,
        'age' ,
        'gender' ,
        'city' ,
        'img' ,
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

   protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
