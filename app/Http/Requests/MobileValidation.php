<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobileValidation extends FormRequest
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
           'mobile_title' => 'required|max:200',
           'mobile_description' => 'required',
           'short_description' => 'required|min:100|max:500',
           'mobile_tags' => 'required',
           'brand_id' => 'required',
           'mobile_image' => 'required',
        ];
    }
}
