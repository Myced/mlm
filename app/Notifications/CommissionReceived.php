<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommissionReceived extends Notification
{
    use Queueable;

    public $commission;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($commission)
    {
        $this->commission = $commission;
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
        $message = "You have just received a commission "
                    . " of <strong>" . number_format($this->commission->commission) . " FCFA"
                    . "</strong>"
                    . " From an order made by <strong>"
                    . $this->commission->order->user->name
                    . " </strong>"
                    . "<br>"
                    . "You are receiving this commission because this person "
                    . "is on your geneology tree Level " . $this->commission->level;

        return [
            'icon' => 'fa fa-dollar-sign',
            'class' => 'info',
            'heading' => 'Received Commission',
            'title' => 'You have a received a commission',
            'commission_id' => $this->commission->id,
            'message' => $message
        ];
    }
}
