<?php

namespace App\Listeners;

use App\Events\AppointmentCancelled;
use App\Models\Appointment;
use App\Services\TwilioSMS;
use Carbon\Carbon;

class SendAppointmentCancelledSMSNotification extends TwilioSMS
{
    /**
     * Handle the event.
     *
     * @param  AppointmentCancelled  $event
     * @return void
     */
    public function handle(AppointmentCancelled $event)
    {
        $this->send($event->appointment->patient->phone_no, $this->message($event->appointment));
    }

    private function message(Appointment $appointment): string
    {
        $date = (new Carbon($appointment->date))->format('m-d-Y');
        return "\nHello {$appointment->patient->full_name}!\n Your appointment on {$date}  with {$appointment->dentist->full_name}  for {$appointment->service->name} is cancelled for reason:\n {$appointment->remarks}";
    }
}
