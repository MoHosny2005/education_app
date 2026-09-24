<?php

namespace App\Listeners;

use App\Events\updateCourseApproval;
use App\Mail\teacherMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class sendCourseUpdateApprovalEmailToTeacher implements ShouldQueue
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
    public function handle(updateCourseApproval $event): void
    {
        $teacher = $event->teacher ;
        $course_title = $event->course_title;
         $details = "Course Updating Approval";
          $content = "Your requested update for the course " . $course_title . " has been " . $event->action .  " If You Have Any Problems please contact us" ;
          Mail::to($teacher->email)->send(new  teacherMail($content , $details , $teacher));
    }
}
