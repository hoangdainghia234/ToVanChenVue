<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
        return [
            'email' => 'unique:users|required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email null',
            'email.unique'  => 'Email unique',
            'password.required'  => 'Password null',
        ];
    }
}
