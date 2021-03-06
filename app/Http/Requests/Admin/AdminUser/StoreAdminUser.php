<?php

namespace App\Http\Requests\Admin\AdminUser;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StoreAdminUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $data = $this->only(collect($this->rules())->keys()->all());

        if (array_has($data, 'from_registration_page')) {
            return true;
        }

        return Gate::allows('admin.admin-user.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'email' => ['required', 'email', Rule::unique('admin_users', 'email'), 'string'],
            'first_name' => ['nullable', 'string'],
            'forbidden' => ['required', 'boolean'],
            'language' => ['required', 'string'],
            'last_name' => ['nullable', 'string'],
            'password' => ['required', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            'phone_no' => ['nullable', 'string', 'starts_with:+63,09'],
            'roles' => ['required'],
            'from_registration_page' => ['nullable', 'boolean'],
        ];

        if (Config::get('admin-auth.activation_enabled')) {
            $rules['activated'] = ['required', 'boolean'];
        }

        return $rules;
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getModifiedData(): array
    {

        $data = $this->only(collect($this->rules())->keys()->all());

        if (!Config::get('admin-auth.activation_enabled')) {
            $data['activated'] = true;
        }
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $data['roles'] = [$data['roles']];

        return $data;
    }
}
