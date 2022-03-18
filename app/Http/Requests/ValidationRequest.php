<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
            "title"=>"required|unique:books",
            "author"=>"required",
            "total_books"=>"required",
        ];
    }
    public function messages()
    {
        return[
            'title.required' => 'Title is required'
        ];
    }
}
