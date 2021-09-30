<?php

namespace App\Exports;

use App\Models\Appointment;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AppointmentExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Appointment::where('dentist_id', auth()->user()->id)->with(['dentist', 'patient', 'service'])->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.appointment.columns.id'),
            trans('admin.appointment.columns.dentist_id'),
            trans('admin.appointment.columns.service_id'),
            trans('admin.appointment.columns.patient_id'),
            trans('admin.appointment.columns.date'),
            trans('admin.appointment.columns.start'),
            trans('admin.appointment.columns.end'),
            trans('admin.appointment.columns.status'),
            trans('admin.appointment.columns.remarks'),
        ];
    }

    /**
     * @param Appointment $appointment
     * @return array
     *
     */
    public function map($appointment): array
    {
        return [
            $appointment->id,
            $appointment->dentist->full_name,
            $appointment->service->name,
            $appointment->patient->full_name,
            $appointment->date,
            $appointment->start,
            $appointment->end,
            $appointment->status,
            $appointment->remarks,
        ];
    }
}
