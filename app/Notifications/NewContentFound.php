<?php

namespace App\Notifications;

use App\Models\WatchJob;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContentFound extends Notification
{
    public function toArray()
    {
        return [
            'title'=>$this->title,
            'job_name'=>$this->watchJob->name,
            'job_url'=>$this->watchJob->url,
            'job_last_tag_count'=>$this->watchJob->last_tag_count
        ];
    }

    use Queueable;

    protected $title = "Changes found on the web page you are watching.";

    /**
     * Create a new notification instance.
     */
    protected $watchJob;
    public function __construct(WatchJob $watchJob)
    {
        //
        $this->watchJob = $watchJob;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line($this->title)
                    ->action('Go to the website', url($this->watchJob->url))
                    ->line('May be it is a new job posted!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

}
