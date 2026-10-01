<?php

namespace App\Models;
use App\Models\course;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable = [
        'course_id' ,
        'title' ,
    ];


    // course relationship
    public function course(){
        return $this->belongsTo(course::class) ;
    }
}



