<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentarioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required',
            'autor' => 'required',
            'resumo' => 'required'
        ];
    }

    public function messages(): array {
        return [
            "titulo.required" => "O campo de titulo é obrigatório.",
            "autor.required" => "O campo de autor é obrigatório.",
            "resumo.required" => "O campo de resumo é obrigatório."
        ];

    }
}
