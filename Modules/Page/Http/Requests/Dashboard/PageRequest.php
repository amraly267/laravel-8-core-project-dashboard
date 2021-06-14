<?php

namespace Modules\Page\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title.*' => 'required',
            'description.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.*.required' => trans('page::dashboard.title_is_required'),
            'description.*.required' => trans('page::dashboard.content_is_required'),
        ];
    }
}
