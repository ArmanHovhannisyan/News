<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
            'category_id'=> 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
            'title_hy' => 'required',
            'short_description_en' => 'required',
            'short_description_ru' => 'required',
            'short_description_hy' => 'required',
            'long_description_en' => 'required',
            'long_description_ru' => 'required',
            'long_description_hy' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
            'image_path.*' => 'mimes:jpeg,jpg,png',

        ];
    }
}
