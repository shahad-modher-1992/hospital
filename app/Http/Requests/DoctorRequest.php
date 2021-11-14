<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name'=> "required",
            'phone' => "required|string|max:255",
            "room_no" => "numeric",
            "specialty_id" => "required|exists:specialties,id",
            "image"=> "required|mimes:png,jpg|file"
        ];

    }


}
