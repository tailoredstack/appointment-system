<?php

namespace App\Listeners;

use App\Events\AppointmentAccepted;
use App\Models\Appointment;
use App\Services\TwilioSMS;
use Carbon\Carbon;

class SendAppointmentAcceptedSMSNotification extends TwilioSMS
{
    /**
     * Handle the event.
     *
     * @param  AppointmentAccepted  $event
     * @return void
     */
    public function handle(AppointmentAccepted $event)
    {
        $this->send($event->appointment->patient->patient->phone_no, $this->message($event->appointment));
    }

    private function message(Appointment $appointment)
    {
        $date = (new Carbon($appointment->date))->format('m-d-Y');
        return "\nHello {$appointment->patient->full_name}!\n Your appointment on {$date}  with {$appointment->dentist->full_name}  for {$appointment->service->name} is accepted";
    }
}
