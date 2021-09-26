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
        return Appointment::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.appointment.columns.date'),
            trans('admin.appointment.columns.dentist_id'),
            trans('admin.appointment.columns.end'),
            trans('admin.appointment.columns.id'),
            trans('admin.appointment.columns.remarks'),
            trans('admin.appointment.columns.service_id'),
            trans('admin.appointment.columns.start'),
            trans('admin.appointment.columns.status'),
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
            $appointment->date,
            $appointment->dentist_id,
            $appointment->end,
            $appointment->id,
            $appointment->remarks,
            $appointment->service_id,
            $appointment->start,
            $appointment->status,
        ];
    }
}
