<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'nome' => 'required',
            'cpf' => 'required|size:11',
            'email' => 'required|email|unique:users,email',
            'telefone' => 'required',
            'password' => 'required|min:3',
        
        ];
    }

    public function messages(): array {
        return [
            "nome.required" => "O campo de nome é obrigatório.",
            "cpf.required" => "O CPF é obrigatório.",
            "cpf.size" => "O CPF precisa ter 11 dígitos.",
            "email.required" => "O campo de email é obrigatório.",
            "email.unique" => "Esse email já está sendo usado por outra pessoa.",
            "email.email" => "Por favor, informe um endereço de email válido.",
            "telefone.required" => "O telefone é obrigatório",
            "password.required" => "Voce precisa de uma senha para fazer login no sistema.",
            "password.size" => "A senha precisa ter no mínimo 3 caracteres.",
        ];

    }
}
