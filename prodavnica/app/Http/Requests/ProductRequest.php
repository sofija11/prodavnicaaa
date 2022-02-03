<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'product_name' => 'required|unique:products,name|regex:/^[a-zA-Z0-9_ ]*/',
            'code' => 'required|unique:products,code|alpha_num',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'categories' => 'required|exists:categories,id',
            // 'images[]' => 'image|bail|mimes:jpg,jpeg,png',
            // ne radi za vise slika validacija, pa sam to uradila u kontroleru
        ];
    }
}
