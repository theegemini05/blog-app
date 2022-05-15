<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Listeners\SendPostSubscriptions;
use App\Mail\PostSubscriptions;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen(
            PostCreated::class,
            [SendPostSubscriptions::class, 'handle']
        );
    }
}
