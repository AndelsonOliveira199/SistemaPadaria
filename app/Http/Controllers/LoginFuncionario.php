<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\LoginFuncionarioRequest;
use App\Models\tb_funcionario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class LoginFuncionario extends Controller
{
    // Verifica se o usuário está logado
    public function inicio(){
        if(session()->has('email_func')){
            return redirect()->route('produto');
        }else{
            // echo 'Funcionário Deslogado';
            return redirect()->route('login');
        }
    }
    // Apresenta o Formulário de login do funcionário
    public function login(){

        // Verifica se usuário está logado (se existe um usuário com sessão aberta)
        if(session()->has('email_func')){
            return redirect()->route('produto');
        }
        //Fim do mecanismo

        $erro = session('erro');
        $data = [];
        if(!empty($erro)){
            $data = [
                'erro' => $erro
            ];
        }
        return view('inicio', $data);
    }
    // Tratamento e validação dos dados de entrada de Login
    public function login_submit_funcionario(LoginFuncionarioRequest $request){
        if($request->isMethod('post')){

            $request->validated();

            $email_func = trim($request->input('email_func'));
            $bi_func = trim($request->input('bi_func'));

            $email_func = tb_funcionario::where('email', $email_func)->first();
            if(!$email_func){
                session()->flash('erro', 'Não existe nenhum funcionário com este email');
                return redirect()->route('login');
            }
            // Verifica se a senha está correcta ou não
            if(!Hash::check($bi_func , $email_func->bi)){
                session()->flash('erro', 'Senha Inválida!');
                return redirect()->route('login');
            }
            // Criação da sessão Após a validação dos dados de entrada de login do funcionário
            session()->put('email_func', $email_func);
            return redirect()->route('produto');
        }
    }
    // Método para terminar sessão
    public function terminar_sessao(){
        session()->forget('email_func');
        return redirect()->route('login');
    }
    // FUTURAMENTE SERÁ IMPLEMENTADA ESTÁ FUNÇÃO QUE PERMITE REGISTRAR FUNCIONÁRIOS QUE ACESSARAM O SISTEMA
    public function controle_sessao_funcionario(){
        // Como registrar uma sessão na base de dados
    }
}
