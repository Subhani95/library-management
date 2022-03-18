<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            "title" => "required|unique:books",
            "author" => "required",
            "total_books" => "required",
            "category_id"=>"required|in:1,2,3,4,5",
            "bookShelf_id"=>"required|in:1,2,3,4",
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('message.title_required'),
            'title.unique'=> trans('message.title_unique'),
            'author.required'=>trans('message.author_required'),
            'total_books.required'=>trans('message.total_books_required'),
            'category_id.in'=>trans('message.category_id_in'),
            'bookShelf_id.in'=>trans('message.bookShelf_id_in'),
            

        ];
    }
}



