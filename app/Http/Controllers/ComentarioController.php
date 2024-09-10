<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    public function registrar_comentario(Request $request){
        if($request->isMethod('post')){
            $email_cliente = $request->input('email_cliente');
            $comentarios = $request->input('comentarios');
            $registrar = new Comentario();
            $registrar->email_cliente = $email_cliente;
            $registrar->comentarios = $comentarios;
            $registrar->save();
            if($registrar){
                return redirect('/')->with('message','Comentário Enviado com Sucesso');
            }else{
                return redirect('/')->with('message','Erro ao Enviar Comentário!');
            }
        }
    }
}
