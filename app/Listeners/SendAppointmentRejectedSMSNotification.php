<?php

namespace App\Listeners;

use App\Events\AppointmentCancelled;
use App\Events\AppointmentRejected;
use App\Models\Appointment;
use App\Services\TwilioSMS;
use Carbon\Carbon;

class SendAppointmentRejectedSMSNotification extends TwilioSMS
{
    /**
     * Handle the event.
     *
     * @param  AppointmentRejected  $event
     * @return void
     */
    public function handle(AppointmentRejected $event)
    {
        $this->send($event->appointment->patient->phone_no, $this->message($event->appointment));
    }

    private function message(Appointment $appointment): string
    {
        $date = (new Carbon($appointment->date))->format('m-d-Y');
        return "\nHello {$appointment->patient->full_name}!\n Your appointment on {$date}  with {$appointment->dentist->full_name} for {$appointment->service->name} is rejected for reason:\n {$appointment->remarks}";
    }
}
