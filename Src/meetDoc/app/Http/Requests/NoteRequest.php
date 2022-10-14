<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     * @author Mohamed Eldefrawy
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     * @author Mohamed Eldefrawy
     */
    public function rules(): array
    {
        return [
            "notes" => "required|text"
        ];
    }
}
