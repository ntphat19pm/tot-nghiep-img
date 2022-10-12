<?php

namespace App\Http\Requests\Danhmuc;

use Illuminate\Foundation\Http\FormRequest;

class addRequest extends FormRequest
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
            'tendanhmuc' => 'required|unique:danhmuc'
        ];
    }
    public function messages()
    {
        return [
            'tendanhmuc.required' => 'Danh mục không được bỏ trống',
            'tendanhmuc.unique'=>'Danh mục này đã có.'
        ];
    }
}
