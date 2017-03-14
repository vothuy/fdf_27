<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'cateName' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cateName.required' => trans('label.notification.please enter catename'),
            'description.required' => trans('label.notification.please enter desciption'),
        ];
    }
}
