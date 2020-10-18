<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogValidation extends FormRequest
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
           'blog_title' => 'required|max:200',
           'blog_description' => 'required',
           'short_description' => 'required|min:100|max:500',
           'blog_tags' => 'required',
           'category_id' => 'required',
           'blog_image' => 'required',
        ];
    }
}
