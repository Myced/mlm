<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        'App\Events\OrderPlaced' => [
            'App\Listeners\OrderPlacedListener'
        ],

        'App\Events\OrderConfirmed' => [
            'App\Listeners\OrderConfirmedListener'
        ],

        'App\Events\OrderCancelled' => [
            'App\Listeners\OrderCancelledListener'
        ],
        'App\Events\OrderPaid' => [
            'App\Listeners\OrderPaidListener'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
