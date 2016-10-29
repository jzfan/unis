<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SuplierRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'company' => 'required|unique:supliers,company,'. $request->input('id'),
            'email' => 'required|email|max:255|unique:supliers,email,'. $request->input('id'),
            'manager' => 'required',
            'tel' => 'required',
            'address' => 'required',
            'status' => 'required',
        ];
    }
}
