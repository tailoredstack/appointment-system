<?php

namespace App\Http\Requests\Admin\Dentist;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDentist extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.dentist.edit', $this->dentist);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'admin_users_id' => ['sometimes', 'integer'],
            'email' => ['sometimes', 'email', Rule::unique('dentist', 'email')->ignore($this->dentist->getKey(), $this->dentist->getKeyName()), 'string'],
            'first_name' => ['sometimes', 'string'],
            'last_name' => ['sometimes', 'string'],
            'phone_no' => ['nullable', Rule::unique('dentist', 'phone_no')->ignore($this->dentist->getKey(), $this->dentist->getKeyName()), 'string'],
            
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
