<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\subject;
use App\Models\course;

class update_course extends Model
{
     protected $table = 'updated_course';
     protected $fillable = [
        'title',
        'course_id',
        'requirment_id' ,
        'description' ,
        'short_description' ,
        'price' ,
        'discount' ,
        'status' ,
        'image' ,
    ];

    //requirment_id relationship
    public function requirment(){
        return $this->belongsTo(subject::class , 'requirment_id' );
    }

    //course_id relationship
    public function course(){
        return $this->belongsTo(course::class , 'course_id');
    }
}
