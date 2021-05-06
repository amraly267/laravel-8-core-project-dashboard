<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
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
            'email' => 'required|email|exists:admins,email',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans(config('dashboard.trans_file').'email_is_required'),
            'email.email' => trans(config('dashboard.trans_file').'invalid_email'),
            'email.exists' => trans(config('dashboard.trans_file').'email_not_exist'),
        ];
    }
}
