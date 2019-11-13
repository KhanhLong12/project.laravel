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
             'email'        => 'required|email',
             'password'     => 'required|min:8',
             'role'       => 'in:0,1,2',
             'sex'       => 'in:0,1,2',
             'username'     => 'required|min:5|max:50',
             'phone'        => 'numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute Không được để trống',
            'numeric' => ':attribute phải là kiểu số',
            'in' => 'chọn :attribute',
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
            'role' => 'quyền',
            'sex' => 'Giới tính',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
        ];
    }
}
