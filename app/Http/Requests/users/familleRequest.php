<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class familleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom'=>['required','min:3'],
            'email'=>['required','min:5'],
            'telephone'=>['required','min:8'],
            'adresse'=>['required','min:10'],
            'type'=>['required']
        ];
    }
}
