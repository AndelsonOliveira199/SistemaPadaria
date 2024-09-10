<?php

use App\Http\Controllers\Admin_Controller;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ComunicadoController;
use App\Http\Controllers\LoginFuncionario;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RegistroProdutosVendaController;
use App\Http\Controllers\TbCompraController;
use App\Http\Controllers\TbFuncionarioController;
use App\Http\Controllers\TbVendaController;
use App\Models\Registro_produtos_venda;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});
Route::get('/bem_vindos', function(){
    return view('bem_vindos');
});
Route::get('/admin', [ComentarioController::class, 'total_comentarios'])->name('comentarios');

Route::get('/', [LoginFuncionario::class, 'login'])->name('login');
Route::post('/login_submit_func', [LoginFuncionario::class, 'login_submit_funcionario'])->name('login_submit_func');


Route::get('/admin', [Admin_Controller::class, 'listar_vendas'])->name('listar_vendas');
Route::get('/painel_funcionario', [TbVendaController::class, 'produtos'])->name('produto');
Route::get('/formulario_atendimento', [TbFuncionarioController::class, 'listar_produtos_venda'])->name('form_produtos_venda');
Route::get('/comunicados', [ComunicadoController::class, 'listar_comunicado_cliente'])->name('anuncio_comunicados');

Route::get('/nossos_produtos', [ProdutoController::class, 'nossos_produtos'])->name('nossos_produtos');
Route::get('/registro_funcionario', [Admin_Controller::class, 'registros_funcionarios'])->name('registros_funcionarios');
Route::post('/registro', [Admin_Controller::class, 'cadastrar_funcionarios'])->name('registro_funcionario');
Route::get('/listar_funcionarios', [Admin_Controller::class, 'listar_funcionarios'])->name('listar_funcionarios');
Route::get('/lista_produto', [TbVendaController::class, 'lista_produtos'])->name('lista_produto');

Route::post('/registro_produtos', [Admin_Controller::class, 'registrar_produtos'])->name('registro_de_produtos');
Route::get('/gestao_de_produtos', [Admin_Controller::class, 'listar_produtos'])->name('gestao_de_produtos');
Route::post('/vendas', [TbVendaController::class, 'registrar_vendas'])->name('registrar_vendas');
Route::get('/compras_produtos_clientes', [TbCompraController::class, 'listar_prod_vendas'])->name('compras_produtos');
Route::post('/registro_prod_vendas', [RegistroProdutosVendaController::class, 'registrar_produtos_vende'])->name('registro_prod_vendas');
Route::post('/vendas_obtidas', [Admin_Controller::class, 'visualizar_vendas_obtidas'])->name('view_vendas');
Route::post('/registro_compra_cliente', [TbCompraController::class, 'registro_compra_clientes'])->name('registro_compra_cliente');
Route::post('/resultado_compra_cliente', [TbFuncionarioController::class, 'consulta_compras_clientes'])->name('consultar_compra_cliente');
Route::get('/formulario_registro_venda/{id}', [TbFuncionarioController::class, 'formulário_registro_vendas'])->name('form_registro_vendas');
Route::post('/comunicados', [ComunicadoController::class, 'registrar_comunicados'])->name('comunicados');
Route::post('/consulta_venda_admin', [Admin_Controller::class, 'consulta_vendas_admin'])->name('consultar_vendas');
Route::post('/consulta_compra_clientes_admin', [Admin_Controller::class, 'consultar_dados_compra'])->name('consultar_compra');
Route::post('/comentários_clientes', [ComentarioController::class, 'registrar_comentario'])->name('comentario_cliente');
Route::get('/lista_comentarios', [Admin_Controller::class, 'listar_comentarios'])->name('lista_comentario');
// FORMULÁRIO DE COMPRA DE PRODUTOS DO CLIENTE
Route::get('/form_compra_prod_clientes/{id}', [TbCompraController::class, 'mostrar_form_compra_prod'])->name('form_compra_prod_clientes');
Route::post('/submit_compra_prod_clientes', [TbCompraController::class, 'submit_dados_compra_prod_cliente'])->name('form_submit_compra_prod_clientes');

Route::get('/form_atendimento_cli/{id}', [TbFuncionarioController::class, 'form_atendimento_cli'])->name('form_atendimento_cli');
Route::get('/lucro_empresa', [Admin_Controller::class, 'lucro_empresa'])->name('lucro_da_empresa');
Route::post('/minhas_contas', [ClientesController::class, 'verificar_minhas_contas'])->name('minhas_contas');
Route::get('/form_edit_prod/{id_produto}', [Admin_Controller::class, 'form_edit_prod'])->name('form_edit_prod');
Route::post('/form_submit_prod', [Admin_Controller::class, 'form_submit_prod'])->name('form_submit_prod');
Route::post('/eliminar_produto/{id_produto}', [Admin_Controller::class, 'eliminar_produto'])->name('eliminar_produto');
Route::get('/editar_dados_func/{id_func}', [Admin_Controller::class, 'editar_dados_func'])->name('editar_dados_func');
Route::post('/eliminar_funcionario/{id_funcionarios}', [Admin_Controller::class, 'eliminar_funcionarios'])->name('eliminar_dados_funcionario');
Route::get('/registro_quant_produtos', [RegistroProdutosVendaController::class, 'registro_quant_venda_prod'])->name('produtos_vendas_registro_quant');
Route::get('/form_registro_prod_venda/{id_produtos}', [RegistroProdutosVendaController::class, 'formulario_registro_prod_venda'])->name('form_registro_prod_venda');
Route::post('/registro_produto_venda', [RegistroProdutosVendaController::class, 'registrar_produtos_vendas'])->name('registro_produto_venda');

Route::get('/acesso_reservado_do_gerente', [Admin_Controller::class, 'login_do_gerente'])->name('login_gerente');
Route::post('/login_gerente_acesso', [Admin_Controller::class, 'login_submit_admin'])->name('login_submit_admin');
Route::post('/verifica_codigo_acesso', [Admin_Controller::class, 'verifica_codigo_acesso'])->name('verifica_codigo_acesso');
Route::post('/registrar-me', [Admin_Controller::class, 'registrar_me'])->name('registrar-me');
Route::get('/sair', [Admin_Controller::class, 'sair_admin'])->name('sair');
// Route para terminar sessão do funcionário
Route::get('/terminar_sessao', [LoginFuncionario::class, 'terminar_sessao'])->name('logout');