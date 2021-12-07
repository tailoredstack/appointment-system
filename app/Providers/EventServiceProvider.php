<?php

namespace App\Providers;

use App\Events\AppointmentAccepted;
use App\Events\AppointmentCancelled;
use App\Events\AppointmentRejected;
use App\Events\ClientArrived;
use App\Listeners\ClientArrivedActivity;
use App\Listeners\SendAppointmentAcceptedSMSNotification;
use App\Listeners\SendAppointmentCancelledSMSNotification;
use App\Listeners\SendAppointmentRejectedSMSNotification;
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
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AppointmentCancelled::class => [
            SendAppointmentCancelledSMSNotification::class
        ],
        AppointmentAccepted::class => [
            SendAppointmentAcceptedSMSNotification::class
        ],
        AppointmentRejected::class => [
            SendAppointmentRejectedSMSNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
