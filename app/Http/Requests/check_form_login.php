<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class check_form_login extends FormRequest
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
            'first_name' => 'bail|required|alpha|max:100',
            'last_name' => 'bail|required|string|max:100',
            'email' => 'bail|required|email|unique:users',
            'phone' => 'bail|required|numeric|digits_between:10,15',
            'password' => 'bail|required|min:8',
            'confirm_password' => 'bail|required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' =>'Trường này không được để trống',
            'first_name.alpha' =>'Sai kiểu dữ liệu',
            'first_name.max' =>'Chuỗi kí tự quá dài',
            'last_name.required' =>'Trường này không được để trống',
            'last_name.alpha' =>'Sai kiểu dữ liệu',
            'last_name.max' =>'Chuỗi kí tự quá dài',
            'email.required' =>'Trường này không được để trống',
            'email.email' =>'Định dạng của Mail là Gmail',
            'email.unique' =>'Email này đã tồn tại',
            'phone.required' =>'Trường này không được để trống',
            'phone.numeric' =>'Sai kiểu dữ liệu',
            'phone.digits_between' =>'Chuỗi kí tự từ 10 - 15',
            'password.required' =>'Trường này không được để trống',
            'password.min' =>'Chuỗi kí tự quá ngắn',
            'confirm_password.required' =>'Trường này không được để trống',
            'confirm_password.same' =>'Mật khẩu không khớp'
        ];
    }
}
