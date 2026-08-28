<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class teacherNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $content , $details  ;
    public function __construct($content , $details )
    {
        $this->content = $content ;
        $this->details = $details ;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
  
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'content' => $this->content ,
            'details' => $this->details ,

        ];
    }
}
