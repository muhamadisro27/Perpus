<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'category_books_id' => 'required',
            'publisher_books_id' => 'required',
            'title' => 'required|min:10|max:60',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'synopsis' => 'required|min:50',
            'author' => 'required|min:3|max:20',
            'total_page' => 'required|integer',
            'total_stock' => 'required|integer',
            'publish_year' => 'required|integer|min:4'
        ];
    }
}
