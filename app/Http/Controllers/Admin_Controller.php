<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Models\Comentario;
use App\Models\Gerente;
use App\Models\Produto;
use App\Models\tb_compra;
use App\Models\tb_funcionario;
use App\Models\tb_Venda;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver;

class Admin_Controller extends Controller
{
    public $resultado, $prod;
    public function registros_funcionarios(){
        return view('registro_funcionarios');
    }
    public function cadastrar_funcionarios(Request $request){
        if($request->isMethod('post')){
            $nome = $request['nome'];
            $foto = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_funcionario'), $foto);
            $email = $request['email'];
            $telefone = $request['telefone'];
            $bi = $request['bi'];
            $data_nasc = $request['data_nasc'];
            $idade = $request['idade'];
            $funcao = $request['funcao'];
            $registrar = new tb_funcionario();
            $registrar->nome = $nome;
            $registrar->foto = $foto;
            $registrar->email = $email;
            $registrar->telefone = $telefone;
            $registrar->bi = Hash::make($bi);
            $registrar->data_nasc = $data_nasc;
            $registrar->idade = $idade;
            $registrar->funcao = $funcao;
            $registrar->save();
            if($registrar){
                return redirect('/listar_funcionarios')->with('message','Funcionário Registrado com Sucesso');
            }else{
                return redirect('/listar_funcionarios')->with('message','Erro ao Registrar Funcionário');
            }
        }
    }
    public function listar_funcionarios(){
        $lista = tb_funcionario::all();
        return view('registro_funcionarios', compact('lista'));
    }
    public function registrar_produtos(Request $request){
        if($request->isMethod('post')){
            $nome_produto = $request->input('nome_produto');
            $foto_produto = $request->file('foto_produto')->getClientOriginalName();
            $request->foto_produto->move(public_path('foto_produtos'), $foto_produto);
            $tipo_produto = $request->input('tipo_produto');
            $sabor_produto = $request->input('sabor_produto');
            $preco_produto = $request->input('preco_produto');
            $iva_produto = $request->input('iva_produto');
            $total_com_iva = $preco_produto * $iva_produto;
            $registrar_produtos = new Produto();
            $registrar_produtos->nome_produto = $nome_produto;
            $registrar_produtos->foto_produto = $foto_produto;
            $registrar_produtos->tipo_produto = $tipo_produto;
            $registrar_produtos->sabor = $sabor_produto;
            $registrar_produtos->preco = $preco_produto;
            $registrar_produtos->iva = $total_com_iva;
            $registrar_produtos->save();
            if($registrar_produtos){
                return redirect('/gestao_de_produtos')->with('message', 'Produto Registrado com Sucesso!');
            }else{
                return redirect('/gestao_de_produtos')->with('message', 'Erro ao registrar produto');
            }
        }
    }
    public function listar_produtos(){
        $produtos = Produto::all();
        return view('lista_produtos_stock', compact(['produtos']));
    }
    public function listar_vendas(){
        $lista_venda = tb_Venda::all();
        $lista_compras = tb_compra::all();
        $total_comentarios = Comentario::all();
        $produtos = Produto::all();
        $funcionarios = tb_funcionario::all();

        return view('admin', compact('lista_venda','lista_compras','total_comentarios','produtos','funcionarios'));
    }
    public function visualizar_vendas_obtidas(){
        $resultado = DB::table('tb__vendas')
        ->join('produtos','tb__vendas.produto_id','=','produtos.id_produtos')
        ->join('tb_funcionarios','tb__vendas.funcionario_id','=','tb_funcionarios.id_funcionarios')
        ->select('tb__vendas.*', 'tb_funcionarios.nome as nome_funcionario','tb__vendas.lucro_final as lucro','tb__vendas.created_at as data','produtos.nome_produto as nome_produto','tb__vendas.tipo_produto as tipo','tb__vendas.preco_produto as preco','tb__vendas.quantidade as quantidade')->get();
        return view('visualizar_vendas', compact('resultado'));
    }
    public function comunicado(){
        return view('comunicado');
    }
    public function consulta_vendas_admin(Request $request){
        if($request->isMethod('post')){
            $total = 0;
            $vendas_pesq = $request->input('vendas_pesq');
            $consultar_vendas = DB::table('tb__vendas')
            ->join('produtos','tb__vendas.produto_id','=','produtos.id_produtos')
            ->join('tb_funcionarios','tb__vendas.funcionario_id','=','tb_funcionarios.id_funcionarios')->where('tb__vendas.created_at','LIKE','%'.$vendas_pesq.'%')
            ->select('tb__vendas.*', 'tb_funcionarios.nome as nome_funcionario','tb__vendas.lucro_final as lucro','tb__vendas.created_at as data','produtos.nome_produto as nome_produto','tb__vendas.tipo_produto as tipo','tb__vendas.preco_produto as preco','tb__vendas.quantidade as quantidade')->get();
            return view('visualizar_vendas', compact('consultar_vendas', 'total'));
        }
    }
    public function consultar_dados_compra(Request $request){
        if($request->isMethod('post')){
            $total = 0;
            $total_compra = 0;
            $compra_pesq = $request->input('compra_pesq');
            $consultar_compras = DB::table('tb_compras')
            ->join('produtos','tb_compras.produto_id','=','produtos.id_produtos')->where('tb_compras.created_at','LIKE','%'.$compra_pesq.'%')
            ->select('tb_compras.*', 'tb_compras.nome_cliente as cliente','tb_compras.quantidade_compra as quantidade','tb_compras.preco_produto as preco_prod','produtos.nome_produto as produto','tb_compras.tipo_produto as tipo','tb_compras.preco_total as total','tb_compras.sacola as sacola','tb_compras.status_atendimento as status','tb_compras.created_at as data_compra')->get();
            return view('lista_compra_cliente_admin', compact('consultar_compras', 'total','total_compra'));
        }
    }
    public function listar_comentarios(){
        $listar = Comentario::all();
        return view('lista_comentarios_admin', compact('listar'));
    }
    public function lucro_empresa(){
        $lucro_total = 0;
        $lucro = tb_Venda::all();
        return view('lucro_empresa', compact('lucro','lucro_total'));
    }
    public function form_login_gerente(){
        return view('login_do_gerente');
    }
    public function form_edit_prod($id_produto){
        $edit_prod = Produto::find($id_produto);
        // $edit_prod = DB::table('produtos')->find($id)->whereColumn('id_produtos');

        return view('formulario_edit_produtos', ['edit_prod' =>$edit_prod]);
    }
    public function form_submit_prod(Request $request){
        if($request->isMethod('post')){
            $id_produtos = $request['id_produto'];
            $produto_nome = $request['produto_nome'];
            $tipo_produto = $request['tipo_produto'];
            $sabor_produto = $request['sabor_produto'];
            $preco_produto = $request['preco_produto'];
            $iva_produto = $request['iva_produto'];
            $total_iva = $preco_produto * $iva_produto;

            $atualizar = Produto::find($id_produtos);
            $atualizar->nome_produto = $produto_nome;
            $atualizar->tipo_produto = $tipo_produto;
            $atualizar->sabor = $sabor_produto;
            $atualizar->preco = $preco_produto;
            $atualizar->iva = $total_iva;
            $atualizar->save();
            if($atualizar){
                return redirect('/gestao_de_produtos')->with('message', 'Produto Editado com Sucesso!');
            }else{
                return redirect('/gestao_de_produtos')->with('message', 'Erro ao Editar Produto');
            }
        }
    }
    // Eliminar Produto
    public function eliminar_produto($id_produto){
        $eliminar_produto = Produto::find($id_produto);
        $eliminar_produto->delete();
        if($eliminar_produto){
            return redirect('/gestao_de_produtos')->with('message', 'Produto Eliminado com Sucesso!');
        }else{
            return redirect('/gestao_de_produtos')->with('message', 'Erro ao Eliminar Produto!');
        }
    }
     // Eliminar Dados do Funcionário
     public function eliminar_funcionarios($id_funcionarios){
        $eliminar_dados_func = tb_funcionario::find($id_funcionarios);
        $eliminar_dados_func->delete($id_funcionarios);
        if($eliminar_dados_func){
            return redirect('/listar_funcionarios')->with('message', 'Dados Eliminado com Sucesso!');
        }else{
            return redirect('/listar_funcionarios')->with('message', 'Erro ao Eliminar Dados do Funcionário!');
        }
    }

    // Verifica Código de Acesso de Registro do Gerente
    public function verifica_codigo_acesso(Request $request){
        if($request->isMethod('post')){
            $codigo_acesso = $request->input('codigo_acesso');
            $verifica = DB::table('gerentes')->where('codigo_acesso',$codigo_acesso)->exists();
            if($verifica){
                return view('form_registro_admin');
                // echo 'Parabéns!!!';
            }else{
                return view('login_do_gerente')->with('message', 'Erro ao Cadastrar-se, o código de acesso está errado');
            }
        }
    }
    // Registrar-me
    public function registrar_me(Request $request, $id=4){
        if($request->isMethod('post')){
            $id;
            $nome_gerente = $request['nome_gerente'];
            $sobrenome_gerente = $request['sobrenome_gerente'];
            $foto_gerente = $request->file('foto_gerente')->getClientOriginalName();
            $request->foto_gerente->move(public_path('foto_gerente'), $foto_gerente);
            $bi_gerente = $request['bi_gerente'];
            $telefone_gerente = $request['telefone_gerente'];
            $email_gerente = $request['email_gerente'];
            $registrar_me = Gerente::find($id);
            $registrar_me->nome = $nome_gerente;
            $registrar_me->sobrenome = $sobrenome_gerente;
            $registrar_me->foto = $foto_gerente;
            $registrar_me->bi = Hash::make($bi_gerente);
            $registrar_me->telefone = $telefone_gerente;
            $registrar_me->email = $email_gerente;
            $registrar_me->save();
            if($registrar_me){
                return redirect('/acesso_reservado_do_gerente')->with('message', 'Registro Feito com Sucesso!');
            }else{
                return redirect('/acesso_reservado_do_gerente')->with('message', 'Erro ao Se Registrar!');
            }
        }
    }

    // Verifica se o usuário está logado
    public function login_gerente(){
        if(session()->has('email_gerente')){
            return redirect()->route('listar_vendas');
        }else{
            return redirect()->route('login_gerente');
        }
    }
    // Apresenta o Formulário de login do funcionário
    public function login_do_gerente(){
        if(session()->has('email_gerente')){
            return redirect()->route('listar_vendas');
        }
        $erro = session('erro');
        $data = [];
        if(!empty($erro)){
            $data = [
                'erro' =>$erro
            ];
        }
        return view('login_do_gerente', $data);
    }


    // Tratamento e Submição dos dados de Login
    public function login_submit_admin(LoginAdminRequest $request){
        if($request->isMethod('post')){
            $request->validated();

            $email_gerente = trim($request->input('email_gerente'));
            $senha_gerente = trim($request->input('senha_gerente'));

            $email_gerente = Gerente::where('email',$email_gerente)->first();
            if(!$email_gerente){
                session()->flash('erro', 'Lamentamos senhor gerente, não conseguimos lhe reconhecer');
                return redirect()->route('login_gerente');
            }
            // Verificação da senha encriptada
            if(!Hash::check($senha_gerente, $email_gerente->bi)){
                session()->flash('erro', 'A sua senha está errada senhor gerente');
                return redirect()->route('login_gerente');
            }
            // Criação da sessão Após a validação dos dados de entrada de login do gerente
            session()->put('email_gerente', $email_gerente);
            return redirect()->route('listar_vendas');
        }
    }
    // Método para terminar a sessão do gerente
    public function sair_admin(){
        session()->forget('email_gerente');
        return redirect()->route('login_gerente');
    }

}
