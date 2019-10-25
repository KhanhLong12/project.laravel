<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreProductRequest extends FormRequest
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
            'content'      => 'required|min:8',
            'origin_price' => 'required|numeric',
            'sale_price'   => 'required|numeric',
        ];
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
                'required'  => ':attribute không được để trống',
                'min'       => ':attribute không được nhỏ hơn :min',
                'max'       => ':attribute không được lớn hơn :max',
                'numeric'   => ':attribute nhập vào phải là kiểu số'
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
                'name' => 'Tên sản phẩm',
                'origin_price' => 'Giá nhập vào',
                'sale_price' => 'Giá bán',
                'content' => 'nội dung',
            ];
    }
}
