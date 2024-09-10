<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\tb_funcionario;
use App\Models\tb_Venda;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TbVendaController extends Controller
{
    public function lista_produtos(){
        $prod = Produto::all();
        return view('produtos_venda', compact('prod'));
    }
    public function registrar_vendas(Request $request){
        if($request->isMethod('post')){
            $nome_produto = $request->input('nome_produto');
            $tipo_produto = $request->input('tipo_produto');
            $sabor_produto = $request->input('sabor_produto');
            $preco_produto = $request->input('preco_produto');
            $quantidade_produto = $request->input('quantidade_produto');
            $preco_sacola = $request->input('preco_sacola');
            $lucro_final = $preco_produto * $quantidade_produto + $preco_sacola;
            $nome_funcionario = $request->input('nome_funcionario');
            $venda = new tb_Venda();
            $venda->produto_id = $nome_produto;
            $venda->tipo_produto = $tipo_produto;
            $venda->sabor_produto = $sabor_produto;
            $venda->preco_produto = $preco_produto;
            $venda->quantidade = $quantidade_produto;
            $venda->valor_sacola = $preco_sacola;
            $venda->lucro_final = $lucro_final;
            $venda->funcionario_id = $nome_funcionario;
            $venda->save();
            if($venda){
                return redirect('/painel_funcionario')->with('message', 'Venda Feita com Sucesso!');
            }else{
                return redirect('/painel_funcionario')->with('message', 'Erro ao Registrar Venda');
            }
        }
    }
    public function produtos(){
        $produtos = Produto::all();
        // $funcionario = tb_funcionario::all();
        return view('funcionario', compact('produtos'));
    }
}
