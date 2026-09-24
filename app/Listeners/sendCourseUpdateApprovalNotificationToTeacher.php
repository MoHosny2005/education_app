<?php

namespace App\Listeners;

use App\Events\updateCourseApproval;
use App\Models\teacher;
use App\Notifications\teacherNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendCourseUpdateApprovalNotificationToTeacher
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
        $course_title = $event->course_title;

        $teacher = $event->teacher;
        $details = "Course Updating Approval";
          $content = "Your requested update for the course " . $course_title . " has been " . $event->action .  " If You Have Any Problems please contact us" ;
           $teacher->notify(new teacherNotification($content , $details));
    }
}
