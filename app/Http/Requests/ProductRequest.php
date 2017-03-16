<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('label.notification.please enter name'),
            'category_id.required' => trans('label.notification.please enter category_id'),
            'price.required' => trans('label.notification.please enter price'),
            'amount.required' => trans('label.notification.please enter amount'),
            'image.required' => trans('label.notification.please enter image'),
        ];
    }
}
