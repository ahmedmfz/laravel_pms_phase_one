<?php

namespace App\Http\Requests\order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
           'customer_name'=>'required|string|min:3',
           'customer_email'=>'required|email|min:3',
           'user_id'=>'nullable|integer',
           'phone'=>'required|digits:11',
           'total'=>'required|integer',
           'address'=>'required|string',
        ];
    }
}
