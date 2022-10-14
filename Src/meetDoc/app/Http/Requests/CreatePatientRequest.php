<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'weight' => ['numeric'],
            'height' => ['numeric'],
            'gender' => ['string'],
            'age' => ['numeric'],
            'bloodType' => ['string'],
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'clinicCode' => 'required|string',
            'phone' => 'required',
        ];
    }
}
