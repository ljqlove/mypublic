<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'password' => 'required|regex:/^\S{6,20}$/',
            'email' =>'required|email'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => '密码必填',
            'password.regex' => '密码格式不正确',
            'email.required'=>'邮箱必填',
            'email.email'=>'邮箱格式不正确'
        ];
    }
}
