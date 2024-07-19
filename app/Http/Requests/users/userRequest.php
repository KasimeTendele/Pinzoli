<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'postnom'=>['required','min:3'],
            'prenom'=>['required','min:3'],
            'email'=>['required','min:3'],
            'avatar'=>['required','min:3'],
            'password'=>['required','min:8'],
            'famille_id'=>['required'],
            'sexe'=>['required'],
        ];
    }
}
