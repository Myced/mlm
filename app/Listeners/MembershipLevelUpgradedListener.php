<?php

namespace App\Listeners;

use App\Models\OrderCommission;
use App\Models\MembershipLevel;
use App\Events\MembershipLevelUpgraded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\LevelUpgradeCommission;
use App\Notifications\MembershipLevelUpgraded as UpgradeNotification;

class MembershipLevelUpgradedListener
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
     * @param  MembershipLevelUpgraded  $event
     * @return void
     */
    public function handle(MembershipLevelUpgraded $event)
    {
        $user = $event->user;
        $newLevel = $event->newLevel;
        $oldLevel = $event->oldLevel;

        if($oldLevel == 0)
        {
            //then u should receive a commission of 5% of level 1;
            $membershipLevel = MembershipLevel::where('level', '=', 1)->first();
            $amount = $membershipLevel->points * 1000;
            $percentage = 5;

            $commission  = new OrderCommission;

            $commission->order_id = '-1';
            $commission->user_id = $user->id;
            $commission->percentage = $percentage;
            $commission->order_value = $amount;
            $commission->commission = $this->calculateCommission($amount, $percentage);

            $commission->save();

            $user->notify(new LevelUpgradeCommission($commission));
        }

        //notify the user of the level change.
        $user->notify(new UpgradeNotification($newLevel));
    }

    private function calculateCommission($total, $percentage)
    {
        return ceil(($percentage/100) * $total);
    }
}
