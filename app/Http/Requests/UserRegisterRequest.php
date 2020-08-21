<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' .$this->route('email'),
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required|string',
        ];
    }

    public function response(Array $errors)
    {
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
