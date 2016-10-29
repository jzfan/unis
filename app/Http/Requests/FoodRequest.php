<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
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
            'shop_id' => 'exists:shops,id',
            'name' => 'required|alpha_dash',
            'description' => 'max:255',
            'price' => 'required|numeric',
            'price' => 'numeric',
            'status' => 'boolean',

        ];
    }
}
