<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:5',
            'password' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('label.please enter name') ,
            'name.min' => trans('label.name must be at least 5 characters') ,
            'password.required' => trans('label.please enter password') ,
            'fullname.required' => trans('label.please enter fullname') ,
            'email.required' => trans('label.please enter email') ,
            'address.required' => trans('label.please enter address') ,
            'phone.required' => trans('label.please enter phone') ,
        ];
    }
}
