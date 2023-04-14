<?php

namespace App\Providers;

use App\Events\ElementCreated;
use App\Listeners\ElementLinkBinder;
use App\Models\Element;
use App\Observers\ElementObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
//        ElementCreated::class => [
//            ElementLinkBinder::class
//        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Element::observe(new ElementObserver());
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
