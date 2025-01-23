<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId = $this->route('user');  // Aquí asegúrate de que se pasa correctamente
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $userId,  // Este es el ID del usuario
            'password' => 'nullable|min:8',
            'roles' => 'required|array|min:1',
            'roles.*' => 'exists:roles,name', // Valida que los roles existan en la base de datos
        ];
    }


    /**
     * Custom attributes for validation.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'roles' => 'Roles',
        ];
    }

    /**
     * Custom messages for validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'email.required' => 'The email is required.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'roles.required' => 'At least one role is required.',
        ];
    }
}
