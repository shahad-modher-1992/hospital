<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'name'=> 'required|string|max:255',
            'phone' => "required",
            "email" => 'required|email',
            'status' => 'required',
            'date' => 'required|date',
            "message" => "required|string|max:1000",
            'user_id' => 'required|integer|exists:users,id',
            'doctor_id' => 'required|integer|exists:doctors,id'
        ];
    }
}
