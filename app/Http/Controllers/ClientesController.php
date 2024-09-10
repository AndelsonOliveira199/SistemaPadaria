<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function compras_produtos(){
        return View('compras_produto_clientes');
    }
    public function verificar_minhas_contas(Request $request){
        if($request->isMethod('post')){
            $cliente = $request['cliente'];
            $data_compra = $request->input('data');
            $verifica = DB::table('tb_compras')->where('tb_compras.nome_cliente','LIKE','%'.$cliente.'%')->where('tb_compras.created_at','LIKE','%'.$data_compra.'%')
            ->join('produtos','tb_compras.produto_id','=','produtos.id_produtos')
            ->select('tb_compras.nome_cliente as cliente','tb_compras.id_compras as codigo_compra','produtos.nome_produto as produto','tb_compras.quantidade_compra as quantidade','tb_compras.preco_produto as preco','tb_compras.preco_total as total_pagar','tb_compras.tipo_produto as tipo')->get();
            return view('verificacao_de_contas', compact('verifica'));
        }
    }
}
