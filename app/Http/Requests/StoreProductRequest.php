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
            'content'      => 'required|min:5',
            'origin_price' => 'required|numeric',
            'category_id'  => 'integer',
            'status'       => 'in:0,1,2',
            'sale_price'   => 'required|numeric',
            'quantity'     => 'required|numeric',
            'images.*'     => 'max:2000|mimes:jpeg,jpg,png,gif',
            'images'       => 'required',
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
            'images.*.mimes'        => ':attribute sai định dạng',
            'images.*.max' => ':attribute kích thước không được vượt quá 2MB',
            'name.max'       => ':attribute không được lớn hơn :max',    
            'content.min'       => ':attribute không được nhỏ hơn :max',    
            'images.required'  => ':attribute không được để trống',
            'required'  => ':attribute không được để trống',
            'in'        => 'chọn không đúng :attribute',
            'integer'   => 'Chưa chọn :attribute',
            'min'       => ':attribute không được nhỏ hơn :min',
            'numeric'   => ':attribute nhập vào phải là kiểu số',
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
            'category_id'   => 'danh mục',
            'images'        => 'Ảnh sản phẩm',
            'status'        => 'trạng thái',
            'images.*'      => 'Ảnh',
            'name'          => 'Tên sản phẩm',
            'origin_price'  => 'Giá nhập vào',
            'sale_price'    => 'Giá bán',
            'quantity'    => 'Số lượng',
            'content'       => 'nội dung',
        ];
    }
}
