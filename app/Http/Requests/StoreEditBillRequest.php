<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditBillRequest extends FormRequest
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
            'name'         => 'required|min:8|max:255',
            'address'      => 'required|min:3',
            'email'        => 'required|email|unique:users,email,'.$this->user()->id,
            'phone'        => 'required|min:6|max:10'
        ];
    }
    public function messages()
    {
        return [
                'max'       => ':attribute không được lớn hơn :max',    
                'email' => ':attribute cần nhập đúng định dạng',  
                'min' => ':attribute không được nhỏ hơn :min',
                'required'  => ':attribute không được để trống',
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
            'address'  => 'Địa chỉ',
            'name'   => 'Tên khách hàng',
            'email'  => 'Email',
            'phone'  => 'Số điện thoại'
        ];
    }
}
