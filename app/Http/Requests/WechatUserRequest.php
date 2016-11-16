<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WechatUserRequest extends FormRequest
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
            'school_id' => 'required|exists:schools,id',
            'campus_id' => 'required|exists:campuses,id',
            'dorm_id'   => 'required|exists:dorms,id',
            'room_number'   => 'required|max:255',
            'phone' => 'required|digits_between:13000000000,18999999999'
        ];
    }
}
