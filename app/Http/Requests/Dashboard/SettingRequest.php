<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'project_name.*' => 'required',
            'contact_us_email' => 'nullable|email',
            'contact_us_mobile' => 'nullable|digits_between:9,12',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'snapchat_url' => 'nullable|url',
            'whatsapp_number' => 'nullable|digits_between:9,12',
            'logo' => 'nullable|mimes:jpeg,jpg,png|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'project_name.*.required' => trans(config('dashboard.trans_file').'name_is_required'),
        ];
    }

}
