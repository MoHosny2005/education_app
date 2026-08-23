<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\subject;

class teacher extends Authenticatable
{
    protected $fillable = [
        'name' ,
        'email' ,
        'password' ,
        'phone' ,
        'age' ,
        'city',
        'gender' ,
        'subject_id' ,
        'bio' ,
        'img' ,
    ];


   public function subject(){
    return $this->belongsTo(subject::class);
   }

  protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
