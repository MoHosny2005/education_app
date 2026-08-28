<?php

namespace App\Listeners;

use App\Events\changeCourseStatus;
use App\Models\teacher;
use App\Notifications\teacherNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendNotificationToTeacher
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
        $course = $event->course ;
         $date = $course->created_at ;
         $teacher_id = $course->teacher_id ;
         $teacher = teacher::find($teacher_id);
        $details = "Course Activation Status";
        $content = "Your Course " . $course->title . "  Created From: " . $date->diffForHumans() . " Has Been " . $event->status .  " If You Have Any Problems Connect With Admin" ;
        $teacher->notify(new teacherNotification($content , $details));
    }
}
