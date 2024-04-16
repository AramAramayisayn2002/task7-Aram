<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBooksRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'string|required',
            'description' => 'string|max:1000|required',
            'publication_year' => 'integer|max:2024|required',
            'authors' => 'required'
        ];
    }
}
