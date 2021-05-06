<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $adminId = request()->admin ?? null;

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$adminId.',id',
            'mobile' => 'required|digits_between:9,12|unique:admins,mobile,'.$adminId.',id',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:5120',
        ];

        if(\Route::currentRouteName() == 'admins.update')
        {
            $rules['password'] = 'nullable|min:6';
        }
        else
        {
            $rules['password'] = 'required|min:6';
        }

        return $rules;
    }
}
