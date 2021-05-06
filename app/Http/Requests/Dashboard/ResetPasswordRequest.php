<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'email' => 'required|exists:admin_password_resets,email',
            'token' => 'required|exists:admin_password_resets,token',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => trans(config('dashboard.trans_file').'password_is_required'),
            'password.min' => trans(config('dashboard.trans_file').'password_should_be_6_char'),
            'confirm_password.required' => trans(config('dashboard.trans_file').'confirm_password_is_required'),
            'confirm_password.same' => trans(config('dashboard.trans_file').'confirm_password_not_identical'),
        ];
    }
}
