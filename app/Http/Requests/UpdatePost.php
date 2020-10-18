<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
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
            'title' => 'required|min:5',
            'brand' => 'required',
            'location' => 'required',
            'ades' => 'required|min:30',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'neg' => 'required','cond' => 'required',
            'phone' => ['required','numeric','regex:/^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/'],
            //"image"    => "required|array|min:1",
            //"image.*"  => "required|distinct|min:3|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "termsandconditions" => "required",
            // 'name' => 'required|min:3|max:20',
            // 'email' => 'required|email',
        ];
    }
    public function messages()

    {
        return [
            'title.required' => 'A great title needs at least 60 characters',
            'title.min:10' => 'A great title needs at least 10 characters',

            'brand.required' => 'Please select brand also.',
            'location.required' => 'Please select location also.',

            //"image.required"    => "Please select at least one image.",

            // 'name.required' => 'Please enter your name to show in ad detail.',
            // 'email.required' => 'Please enter your email.',

            'phone.required' => 'Phone number is required',

            'ades.required' => 'Describe what makes your ad unique',

            'ades.required' => 'Describe what makes your ad unique',
            'ades.min:30' => 'Describe what makes your ad unique atleast in 30 charactors',

            'termsandconditions.required' => 'Please Accept our term and condition.',
        ];

    }
}
