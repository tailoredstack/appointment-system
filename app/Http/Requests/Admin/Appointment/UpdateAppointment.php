<?php

namespace App\Http\Requests\Admin\Appointment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAppointment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.appointment.edit', $this->appointment);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'date' => ['sometimes', 'date'],
            'dentist_id' => ['sometimes', 'integer'],
            'end' => ['sometimes', 'date_format:H:i:s'],
            'remarks' => ['sometimes', 'required_if:status,rejected,cancelled'],
            'service_id' => ['sometimes', 'integer'],
            'start' => ['sometimes', 'date_format:H:i:s'],
            'status' => ['sometimes', 'string'],
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
