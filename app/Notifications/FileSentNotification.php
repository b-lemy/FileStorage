<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FileSentNotification extends Notification
{
    use Queueable;

    protected $file;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($fileSent)
    {
      $this->file = $fileSent;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('hey '. $this->file->firstname . ' sent you an file')
                    ->action('Notification Action', url('/home'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
          "name" => $this->file->firstname
        ];
    }
}
