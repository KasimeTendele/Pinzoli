<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeadRequest extends FormRequest
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
            'nom'=>['required','string','min:3'],
            'postnom'=>['required','string','min:3'],
            'prenom'=>['required','string','min:3'],
            'sexe'=>['required','string'],
            'commentaire'=>['required','string','min:3'],
            'famille_id'=>['required','string'],
            'cimetiere_id'=>['required','string'],
            'date_naissance'=>['required','min:3'],
            'date_deces'=>['required','min:3'],
            'date_enterrement'=>['required','min:3'],
            'avatar_def'=>['required','min:3'],
            'avatar_cim'=>['required','min:3'],
            'oraison'=>['required','min:3']
        ];
    }
}
