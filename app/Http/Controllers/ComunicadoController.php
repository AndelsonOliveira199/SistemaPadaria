<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ComunicadoController extends Controller
{
    public function registrar_comunicados(Request $request){
        if($request->isMethod('post')){
            $titulo = $request->input('titulo');
            $conteudo = $request->input('conteudo');
            $o_gerente = $request->input('o_gerente');
            $registrar = new Comunicado();
            $registrar->titulo = $titulo;
            $registrar->conteudo = $conteudo;
            $registrar->gerente_id = $o_gerente;
            $registrar->save();
            if($registrar){
                return redirect('/admin')->with('message', 'Comunicado Anunciado com Sucesso!');
            }else{
                return redirect('/admin')->with('message', 'Erro ao Anunciar Comunicado!');
            }
        }
    }
    public function listar_comunicado_cliente(){
        $listar = DB::table('comunicados')->join('gerentes','comunicados.gerente_id','=','gerentes.id')
        ->select('comunicados.titulo as titulo','comunicados.conteudo as conteudo','gerentes.nome as gerente','gerentes.sobrenome as sobrenome','comunicados.created_at as data_comunicado')->get();
        return view('comunicado', ['listar' =>$listar]);
    }
}
