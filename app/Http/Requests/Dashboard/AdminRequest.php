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
        $adminId = request()->id ?? null;

        return [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,except,'.$adminId,
            'password' => 'required|min:6',
            'mobile' => 'required|digits_between:9,12|unique:admins,mobile,except,'.$adminId,
            'image' => 'nullable|mimes:jpeg,jpg,png|max:5120',
        ];
    }
}
