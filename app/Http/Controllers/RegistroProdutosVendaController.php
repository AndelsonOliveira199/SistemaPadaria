<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Registro_produtos_venda;
use App\Models\tb_funcionario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class RegistroProdutosVendaController extends Controller
{
    public function registrar_produtos_vendas(Request $request){
        if($request->isMethod('post')){
            $nome_produto = $request['nome_produto'];
            $tipo_produto = $request['tipo_produto'];
            $quant_prod_feita = $request['quant_prod_feito'];
            $preco_produto = $request['preco_produto'];
            $lucro_eperado = $preco_produto * $quant_prod_feita;
            $foto_prod = $request->file('foto_prod')->getClientOriginalName();
            $request->foto_prod->move(public_path('foto_produtos'), $foto_prod);
            $nome_funcionario = $request['nome_funcionario'];
            $registro = new Registro_produtos_venda();
            $registro->produto_id = $nome_produto;
            $registro->tipo_produto = $tipo_produto;
            $registro->quant_prod_feita = $quant_prod_feita;
            $registro->preco_produto = $preco_produto;
            $registro->lucro_esperado = $lucro_eperado;
            $registro->imagem_produto = $foto_prod;
            $registro->funcionario_id = $nome_funcionario;
            $registro->save();
            if($registro){
                return redirect('/painel_funcionario')->with('message','Produto Registro com Sucesso');
            }else{
                return redirect('/painel_funcionario')->with('message','Erro ao Fazer Registro!');
            }
        }
    }
    public function registro_quant_venda_prod(){
        $produtos = Produto::all();
        
        return view('registro_quant_prod_vendas', ['produtos' =>$produtos]);
    }
    public function formulario_registro_prod_venda($id_produtos){
        $id_produtos = Produto::find($id_produtos);
        $funcionarios = tb_funcionario::all();

        return view('formulario_registro_prod_venda', ['id_produtos' =>$id_produtos], ['funcionarios' =>$funcionarios]);
    }
}
