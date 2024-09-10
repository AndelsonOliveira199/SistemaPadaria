<?php

namespace App\Http\Controllers;

use App\Models\Registro_produtos_venda;
use App\Models\tb_compra;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TbFuncionarioController extends Controller
{
    public function consulta_compras_clientes(Request $request){
        if($request->isMethod('post')){
            $nome_cliente = $request->input('nome_cliente');
            // $data_compra = $request->input('data_compra');
            $consultar = DB::table('tb_compras')
            ->join('produtos','tb_compras.produto_id','=','produtos.id_produtos')
            ->where('nome_cliente','LIKE','%'.$nome_cliente.'%')
            ->select('tb_compras.id_compras as id_compras','tb_compras.nome_cliente as cliente','tb_compras.preco_total as preco','produtos.nome_produto as produto','tb_compras.tipo_produto as tipo','tb_compras.preco_produto as preco_prod','tb_compras.quantidade_compra as quantidade','tb_compras.sacola as saco','tb_compras.created_at as data_compra')->get();
            return view('resultado_consulta_compra', compact('consultar'));
        }
    }
    // MÉTODO PARA MOSTRAR FORMULÁRIO DE REGISTRO DE VENDAS
    public function formulário_registro_vendas($id){
        // $produto = DB::table('tb_compras')
        // ->get();
        $dados_compra = DB::table('tb_compras')->where('id_compras', $id)->first();
        return view('formulario_registro_de_vendas', compact('dados_compra'));
    }
    public function listar_produtos_venda(){
        $prod_venda = DB::table('registro_produtos_vendas')
        ->join('produtos','registro_produtos_vendas.produto_id','=','produtos.id_produtos')
        ->select('registro_produtos_vendas.id as id_registro','produtos.nome_produto as produto','registro_produtos_vendas.tipo_produto as tipo','registro_produtos_vendas.quant_prod_feita as quant','registro_produtos_vendas.preco_produto as preco', 'registro_produtos_vendas.lucro_esperado as lucro','registro_produtos_vendas.imagem_produto as imagem')->get();
        return view('formulario_venda_produtos', compact('prod_venda'));
    }
    // ATENDIMENTO PARA OS CLIENTES QUE NÃO FIZERAM CADASTRO EM CASA
    public function form_atendimento_cli($id){
        $form_id = DB::table('registro_produtos_vendas')
        ->join('produtos','registro_produtos_vendas.produto_id','=','produtos.id_produtos')
        ->select('registro_produtos_vendas.produto_id as produto_id','produtos.nome_produto as produto','registro_produtos_vendas.tipo_produto as tipo','registro_produtos_vendas.quant_prod_feita as quant','registro_produtos_vendas.preco_produto as preco')
        ->where('id',$id)->first();
        return view('form_atendimento_cli', compact('form_id'));
    }
    
}
