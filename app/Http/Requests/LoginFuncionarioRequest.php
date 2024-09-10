<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFuncionarioRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email_func' => ['required', 'email'],
            'bi_func' => ['required', 'min:14', 'max:14']
        ];
    }
    public function messages()
    {
        return [
            'email_func.required' => 'O campo email é de preenchimento obrigatório',
            'email_func.email' => 'Não reconhecemos este email, por favor digite um email válido',
            'bi_func.required' => 'O campo senha é de preenchimento obrigatório',
            'bi_func.min' => 'O valor da senha tem que ter no mínimo :min caracteres',
            'bi_func.max' => 'O valor da senha tem que ter no máximo :max caracteres'
        ];

    }
}
