<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommissionPaid extends Notification
{
    use Queueable;

    private $payout;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($payout)
    {
        $this->payout = $payout;
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
        if(empty($payout->network))
        {
            $paymentMethod = "MTN Mobile Money";
        }
        elseif($payout->network == 'mtn')
        {
            $paymentMethod = "MTN Mobile Money";
        }
        else {
            $paymentMethod = "Orange Money";
        }

        $message = "You have been paid a commission of  "
                    . "<strong>" . number_format($this->payout->amount) . " FCFA"
                    . "</strong> through "
                    . "<strong>" . $paymentMethod . ".</strong>"
                    . " This payment was done through the number <strong>"
                    . $this->payout->user->userData->payout_number
                    . ".</strong>"
                    . "<br>"
                    . "This payout is for <strong>" . $this->payout->month_name
                    . " " . $this->payout->year
                    . "</strong>";

        return [
            'icon' => 'fa fa-euro-sign',
            'class' => 'success',
            'heading' => 'Commission Paid',
            'title' => 'You have been paid a commission',
            'payout_id' => $this->payout->id,
            'message' => $message
        ];
    }
}
