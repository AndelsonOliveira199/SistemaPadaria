<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email_gerente' => ['required', 'email'],
            'senha_gerente' => ['required', 'max:14', 'min:14']
        ];
    }
    public function messages()
    {
        return [
            'email_gerente.required' => 'O campo email é de preenchimento obrigatório',
            'email_gerente.email' => 'Digite um email válido',
            'senha_gerente.required' => 'O campo senha é de preenchimento obrigatório',
            'senha_gerente.max' => 'A senha tem que ter no máximo :max caracteres',
            'senha_gerente.min' => 'A senha tem que ter no mínimo :min caracteres'
        ];
    }
}
