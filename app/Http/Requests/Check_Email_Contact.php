<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Check_Email_Contact extends FormRequest
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
            "email" =>"bail|required|email"
        ];
    }
    public function messages()
    {
        return [
            'email.required' =>'Trường này không được để trống',
            'email.email' =>'Không phải định dạng Gmail',
        ];
    }
}
