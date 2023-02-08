<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignupRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:cubers,name|max:100',
            'username' => 'required|alpha_dash|unique:users,username|max:30',
            'email' => 'required|email:dns|unique:users,email|max:30',
            'password' => ['required', Password::min(8)
                    ->letters()
                    ->numbers()
            ],
        ];
    }
}
