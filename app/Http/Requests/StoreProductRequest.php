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
            'images.*'     => 'image|max:2000',
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
                'image'     => ':attribute sai định dạng',
                'max'       => ':attribute kích thước không được vượt quá :max',
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
                'content'       => 'nội dung',
            ];
    }
}
