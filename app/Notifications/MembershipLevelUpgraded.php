<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MembershipLevelUpgraded extends Notification
{
    use Queueable;

    protected $newLevel;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newLevel)
    {
        $this->newLevel = $newLevel;
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
        $message = "<strong>Congratulations!!</strong> <br>"
                    . "Your membership level has been upgraded to "
                    . " <strong>" . $this->newLevel->title . " (Level " . $this->newLevel->level . ") "
                    . "</strong> <br> "
                    . "Thanks for being an active member on our platform";

        return [
            'icon' => 'fa fa-trophy',
            'class' => 'info',
            'heading' => 'Membership Upgraded',
            'title' => 'You are now a <strong> ' . $this->newLevel->title . '</strong> Member',
            'level_id' => $this->newLevel->id,
            'message' => $message
        ];
    }
}
