<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowerRequest extends FormRequest
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
            "name"=>"required",
            "email"=>"required|unique:borrowerdetail",
            "phone"=>"required|unique:borrowerdetail",
            "address"=>"required"
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('message.name_required'),
            'email.required'=>'Email is Rquired',
            'email.unique'=>'Email Already taken',
            'phone.required'=>'Phone is Required',
            'phone.unique'=>'Email Phone Number should be unique taken',
            'address.required'=>'Address is Required',
        ];
    }
        
}
