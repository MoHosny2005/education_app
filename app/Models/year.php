<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\subject;

class year extends Model
{
    protected $fillable = [
        'year_name'
    ];


    public function subject(){
       return $this->hasMany(subject::class);
    }
}
