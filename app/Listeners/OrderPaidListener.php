<?php

namespace App\Listeners;

use Notification;
use App\Models\Order;
use App\Events\OrderPaid;
use App\Models\GeneologyLevel;
use App\Models\OrderCommission;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\CommissionReceived;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPaidListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPaid  $event
     * @return void
     */
    public function handle(OrderPaid $event)
    {
        //get beneficiaries and give them their benefits.
        $order = $event->order;
        $depth = \App\Functions::getGeneologyDepth();


        for($i = 1; $i <= $depth; $i++)
        {
            $beneficiary = Order::getBeneficiary($order->user, $i);

            if(is_null($beneficiary))
            {
                //meaning there is not parent and hence the rest too
                // will not exist.
                break;
            }

            //save the commission
            $commission  = new OrderCommission;

            $commission->order_id = $order->id;
            $commission->user_id = $beneficiary->user->id;
            $commission->level = $i;
            $commission->percentage = $percentage = GeneologyLevel::getLevelBenefit($i);
            $commission->order_value = $order->total;
            $commission->commission = $this->calculateCommission($order->total, $percentage);

            $commission->save();

            $this->notifyUser($beneficiary->user, $commission);
        }
    }

    private function calculateCommission($total, $percentage)
    {
        return ceil(($percentage/100) * $total);
    }

    private function notifyUser($user, $commission)
    {
        Notification::send($user, new CommissionReceived($commission));
    }
}
