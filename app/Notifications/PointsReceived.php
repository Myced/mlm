<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PointsReceived extends Notification
{
    use Queueable;

    private $orderPoint;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($orderPoint)
    {
        $this->orderPoint = $orderPoint;
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
        $message = "You have just received "
                    . " <strong>" . $this->orderPoint->points . " "
                    . "</strong> Points "
                    . " From an order made by <strong>"
                    . $this->orderPoint->order->user->name
                    . " </strong>";

        return [
            'icon' => 'fa fa-plus-circle',
            'class' => 'info',
            'heading' => ' Points Received',
            'title' => 'You have just received ' . $this->orderPoint->points . ' Points',
            'order_point_id' => $this->orderPoint->id,
            'message' => $message
        ];
    }
}
