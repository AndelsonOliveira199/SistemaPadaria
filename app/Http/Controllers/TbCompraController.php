<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Registro_produtos_venda;
use App\Models\tb_compra;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TbCompraController extends Controller
{
    public function listar_prod_vendas(){
        $item = Produto::all();
        $result = DB::table('produtos')
        ->join('registro_produtos_vendas','produtos.id_produtos','=','registro_produtos_vendas.produto_id')
        ->select('produtos.nome_produto as produto_nome','registro_produtos_vendas.id as id_registro','registro_produtos_vendas.tipo_produto as tipo_produto','registro_produtos_vendas.quant_prod_feita as quantidade_feita','registro_produtos_vendas.preco_produto as preco_prod','registro_produtos_vendas.imagem_produto as imagem_prod')->get();
        return view('compras_produto_clientes', compact('result','item'));
    }
    public function registro_compra_clientes(Request $request){
        if($request->isMethod('post')){

            // $reduzir_quant = Registro_produtos_venda::find($id);
            // $id = $request->input('id');

            $nome_cliente = $request->input('nome_cliente');
            $nome_produto = $request->input('nome_produto');
            $preco_produto = $request->input('preco_produto');
            $tipo_produto = $request->input('tipo_produto');
            $quant_produto = $request->input('quant_produto');
            $valor_saco = $request->input('valor_saco');
            $preco_total = $preco_produto * $quant_produto + $valor_saco;
            // $quant_resto = $reduzir_quant->quant_prod_feita - $quant_produto;

            // $atualiza_quant = Registro_produtos_venda::find($id);

            $registrar = new tb_compra();
            $registrar->nome_cliente = $nome_cliente;
            $registrar->produto_id = $nome_produto;
            $registrar->preco_produto = $preco_produto;
            $registrar->tipo_produto = $tipo_produto;
            $registrar->quantidade_compra = $quant_produto;
            $registrar->sacola = $valor_saco;
            $registrar->preco_total = $preco_total;

            // $atualiza_quant->quant_prod_feita = $quant_resto;
            $registrar->save();
            if($registrar){
                return redirect('/')->with('message', 'Dados de Compras realizado com Sucesso!');
            }else{
                return redirect('/')->with('message', 'Erro ao Registrar Dados de Compra');
            }
        }
    }
    public function mostrar_form_compra_prod($id_clientes){
        $dados_compra = DB::table('registro_produtos_vendas')->where('id',$id_clientes)->first();
        return view('form_compra_produtos_clientes', compact('dados_compra'));
    }
    public function submit_dados_compra_prod_cliente(Request $request){
        if($request->isMethod('post')){
                $nome_cliente = $request->input('nome_cliente');
                $nome_produto = $request->input('nome_produto');
                $preco_produto = $request->input('preco_produto');
                $tipo_produto = $request->input('tipo_produto');
                $quantidade_feita = $request->input('quantidade_feita');
                $quant_compra = $request->input('quant_compra');
                $quantidade_restante = $quantidade_feita - $quant_compra;
                $valor_saco = $request->input('valor_saco');
                $preco_final = $preco_produto * $quant_compra + $valor_saco;
            if($quantidade_feita < $quant_compra){
                return redirect('/')->with('message', 'Pedimos Desculpas pela indisponibilidade de compra!');
            }else{
                $registro_compra = new tb_compra();
                $registro_compra->nome_cliente = $nome_cliente;
                $registro_compra->produto_id = $nome_produto;
                $registro_compra->preco_produto = $preco_produto;
                $registro_compra->tipo_produto = $tipo_produto;
                $registro_compra->quantidade_compra = $quant_compra;
                $registro_compra->quantidade_disponivel = $quantidade_restante;
                $registro_compra->sacola = $valor_saco;
                $registro_compra->preco_total = $preco_final;
                $registro_compra->save();
                if($registro_compra){
                    return redirect('/')->with('message', 'Compra Realizada com Sucesso!');
                }else{
                    return redirect('/')->with('message', 'Erro ao Realizar Compra!');
                }
            }
        }
    }
}
