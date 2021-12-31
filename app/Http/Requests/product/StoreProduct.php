<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'category_id'=>['required','integer','max:1000'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer','max:100000'],
            'qty' => ['required', 'integer','max:5000'],
            'image' => ['required','image','max:5000','mimes:jpeg,jpg,png,pdf,gif'],
        ];
    }
}
