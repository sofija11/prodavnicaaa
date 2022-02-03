<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category' => 'required|unique:categories,name|regex:/^[a-zA-Z0-9_ ]{4,150}$/',
        ];
    }

    
    public function messages()
    {
        return [
            'category.regex' => 'Allow only letters, numbers, underscores and white spaces with min 4 characters, max 100',
        ];
    }
}
