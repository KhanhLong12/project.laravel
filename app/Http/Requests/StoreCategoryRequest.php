<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
             'name'        => 'required|min:3|max:255',
             'description'     => 'required|min:5|max:100',
             'images' => 'required|image|max:2000',
        ];
    }
    public function messages()
    {
        return [
            'images.*.max' => ':attribute không đưuọc vượt quá 2M',
            'images.*.image' => ':attribute sai định dạng',
            'required' => ':attribute Không được để trống',
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
            'images' => 'ảnh',
            'name' => 'tên',
            'description' => 'Mô tả',
        ];
    }
}
