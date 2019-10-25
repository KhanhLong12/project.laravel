<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
             'email'        => 'required|e-mail',
             'password'     => 'required|min:8',
             'username'     => 'required|min:5|max:50',
             'phone'        => 'numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute Không được để trống',
            'numeric' => ':attribute phải là kiểu số',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute Không được lớn hơn :max',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'Email',
            'username' => 'Tên',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
        ];
    }
}
