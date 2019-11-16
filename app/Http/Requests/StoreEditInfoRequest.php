<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditInfoRequest extends FormRequest
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
             'email'        => 'required|email|unique:users,email,'.$this->user()->id,
             'sex'          => 'in:0,1,2',
             'fullname'     => 'required|min:5|max:50',
             'phone'        => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute Không được để trống',
            'email' => ':attribute cần nhập đúng định dạng',
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
            'fullname' => 'Tên',
            'sex' => 'Giới tính',
            'phone' => 'Số điện thoại',
        ];
    }
}
