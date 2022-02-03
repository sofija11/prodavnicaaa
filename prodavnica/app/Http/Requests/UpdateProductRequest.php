<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_name_edit' => 'required|regex:/^[a-zA-Z0-9_ ]*/',
            'code_edit' => 'required|alpha_num',
            'description_edit' => 'required|string',
            'price_edit' => 'required|numeric',
            'categories_edit' => 'required|exists:categories,id',
        ];
    }

}
