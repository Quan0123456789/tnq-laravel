<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
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
    public function rules(Request $request)
    {
        // dd($request->all());
        return [
            'productname' => 'required',
            'price' => 'required|integer|digits_between:1,30000000',
            'discount' => 'required|integer|digits_between:1,99',
            'description' => 'required',
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages() {
        return [
             'productname.required' => 'Phải nhập tên sản phẩm',
             'price.digits_between'  => 'Giá sản phẩm phải lớn hơn 0',
             'discount.digits_between'  => 'Chiết khấu phải trong khoảng 0 đến 100',
             'description.required'  => 'Không được để trống',
             'title.required'  => 'Không được để trống',
        ];
      }
}
