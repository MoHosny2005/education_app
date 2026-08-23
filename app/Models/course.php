<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\subject;
use App\Models\teacher;

class course extends Model
{
    protected $fillable = [
        'title',
        'subject_id' ,
        'teacher_id' ,
        'requirment_id' ,
        'description' ,
        'short_description' ,
        'price' ,
        'discount' ,
        'status' ,
        'image' ,
    ];


    //subject_id relationship
    public function subject(){
        return $this->belongsTo(subject::class);
    }

    //teacher_id relationship
    public function teacher(){
        return $this->belongsTo(teacher::class);
    }

    //requirment_id relationship
    public function requirment(){
        return $this->belongsTo(subject::class , 'requirment_id' );
    }
}
