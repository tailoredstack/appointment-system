<?php

namespace App\Http\Requests\Admin\Secretary;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSecretary extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.secretary.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'admin_users_id' => ['required', 'integer'],
            'email' => ['required', 'email', Rule::unique('secretary', 'email'), 'string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone_no' => ['required', Rule::unique('secretary', 'phone_no'), 'string'],
            
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
