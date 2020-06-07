<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRecruited extends Notification
{
    use Queueable;

    private $newUser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $newUser)
    {
        $this->newUser = $newUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
        $message = "A new user <strong>(" . $this->newUser->name . ")</strong>"
                    . " has been registered under you. "
                    . " Registration was done on "
                    . $this->newUser->created_at->format(\App\Functions::DATE_FORMAT)
                    . "<br>"
                    . "You will be receiving commissions for every purchase "
                    . " made by this person. "
                    . " <strong> Congratulations!! </strong>";
        return [
            'icon' => 'icon-user',
            'class' => 'success',
            'heading' => 'Member Recruited',
            'title' => 'You have a recruited a new member',
            'user_id' => $this->newUser->id,
            'message' => $message
        ];
    }
}
