<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\year ;
use App\Models\teacher;
use App\Models\course;

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

    //courses relationship
    public function course(){
        return $this->hasMany(course::class);
    }

    //required courses relationship
    public function requiredByCourse(){
        return $this->hasMany(course::class , 'requirment_id');
    }
}
