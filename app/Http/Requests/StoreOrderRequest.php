<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
             'address'       => 'required|min:5',
             'city'       => 'required',
             'name'     => 'required|min:5|max:50',
             'phone'        => 'required|numeric',
             'district' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute Không được để trống',
            'email' => ':attribute cần nhập đúng định dạng',
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
            'city' => 'Tỉnh/Thành Phố',
            'name' => 'Tên',
            'address' => 'Địa chỉ nhận hàng',
            'district' => 'Quận/Huyện',
            'phone' => 'Số điện thoại',
        ];
    }
}
