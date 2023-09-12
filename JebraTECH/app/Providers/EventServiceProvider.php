<?php

namespace App\Providers;

use App\Events\BlockWriter;
use App\Listeners\BlockWrittinglistener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BlockWriter::class => [
            BlockWrittinglistener::class,
        ],

    ];


    public function boot(): void
    {
        //
    }


    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
