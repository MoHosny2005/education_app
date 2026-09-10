<?php

namespace App\Listeners;

use App\Events\changeCourseStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail ;
use App\Mail\teacherMail ;

class sendEmailToTeacher
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(changeCourseStatus $event): void
    {
        $teacher = $event->teacher ;
         $course = $event->course ;
         $date = $course->created_at ;
          $details = "Course Activation Status";
        $content = "Your Course " . $course->title . "  Created From: " . $date->diffForHumans() . " Has Been " . $event->status .  " If You Have Any Problems Connect With Admin" ;
        Mail::to($teacher->email)->send(new teacherMail($content , $details , $teacher));
       
    }
}
