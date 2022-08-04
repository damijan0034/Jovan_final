<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id'=>['required'],
            'name'=>['string','required'],
            'slug'=>['string','required'],
            'brand'=>['string','required'],
            'small_description'=>['string','nullable'],
            'description'=>['string','nullable'],
            'original_price'=>['integer','required'],
            'selling_price'=>['integer','required'],
            'quantity'=>['integer','required'],

            'image'=>['nullable']

        ];
    }
}
