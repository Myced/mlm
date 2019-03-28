<?php

namespace App\Listeners;

use Notification;
use App\Models\Order;
use App\Events\OrderPaid;
use App\Models\OrderPoint;
use App\Models\GeneologyDepth;
use App\Models\GeneologyLevel;
use App\Models\OrderCommission;
use App\Models\MembershipLevel;
use App\Notifications\PointsReceived;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\CommissionReceived;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPaidListener implements ShouldQueue
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

        $max = 0;

        $geneologDepth = GeneologyDepth::find(1);

        $commissionDepth = $geneologDepth->depth;

        $max = $commissionDepth;

        $pointsDepth = $geneologDepth->points_level;

        if($pointsDepth > $max)
        {
            $max = $pointsDepth;
        }

        //add points to the person who made the order
        $order->user->userData->addPoints($order->points);


        for($i = 1; $i <= $max; $i++)
        {
            $beneficiary = Order::getBeneficiary($order->user, $i); //UserData object

            if(is_null($beneficiary))
            {
                //meaning there is not parent and hence the rest too
                // will not exist.
                break;
            }

            //add points to the user before giving commissions.
            if($i <= $pointsDepth)
            {
                if(!is_null($order->points))
                {
                    $orderPoint = new OrderPoint;

                    $orderPoint->order_id = $order->id;
                    $orderPoint->user_id = $beneficiary->user_id;
                    $orderPoint->points = $order->points;
                    $orderPoint->save();

                    $beneficiary->addPoints($order->points);
                    $beneficiary->refresh();

                    $this->sendPointsAddedNotification($beneficiary, $orderPoint);
                }
            }

            //save the commission
            if($i <= $commissionDepth)
            {
                if($this->canReceiveCommission($beneficiary))
                {
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

        }
    }

    private function canReceiveCommission($userData)
    {
        //user must be at least on level 1
        //user must have at least 1 recruit
        if($userData->membership_level >= 1)
        {
            if($userData->getChildrenCount() > 0)
            {
                return true;
            }
        }

        return false;
    }

    private function calculateCommission($total, $percentage)
    {
        return ceil(($percentage/100) * $total);
    }

    private function notifyUser($user, $commission)
    {
        Notification::send($user, new CommissionReceived($commission));
    }

    private function sendPointsAddedNotification($userData, $orderPoint)
    {
        $userData->user->notify(new PointsReceived($orderPoint));
    }
}
