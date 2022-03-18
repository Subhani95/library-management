<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShelfRequest extends FormRequest
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
            //
            "name"=>"required|unique:bookshelf",
            "number"=>"required|unique:bookshelf",
            "location"=>"required|unique:bookshelf",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('message.name_required'),
            'name.unique'=>trans('message.name_unique'),
            'number.required'=>'Shelf Number is required',
            'number.unique'=>'Shelf Number should be unique',
            'location.required'=>'Shelf Location is Required',
            'location.unique'=>'Location of Shelf is already available'

        ];
    }
}
