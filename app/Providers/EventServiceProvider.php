<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\UserSubscribed; // Import your event
use App\Listeners\SendSubscriptionEmail; // Import your listener

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserSubscribed::class => [
            SendSubscriptionEmail::class,
        ],
        // CartUpdated::class => [
        //     // Listeners
        // ],
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
