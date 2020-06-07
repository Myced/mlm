<?php

namespace App\Listeners;

use App\Events\OrderConfirmed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmedListener
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
     * @param  OrderConfirmed  $event
     * @return void
     */
    public function handle(OrderConfirmed $event)
    {
        //
    }
}
