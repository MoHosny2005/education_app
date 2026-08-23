<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\year ;
use App\Models\teacher;

class subject extends Model
{
    protected $fillable = [
        'name' ,
        'year_id' ,
        'dependency' ,
    ];


    public function year(){
        return $this->belongsTo(year::class );
    }

    public function teacher(){
        return $this->hasMany(teacher::class);
    }
}
