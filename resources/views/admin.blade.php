<!DOCTYPE html>
<html lang="en">
{{-- AUTHOR: Andelson Bráulio Jaime de Oliveira --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GERENTE - {{ session('email_gerente')['sobrenome'] }}</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/fonts/material-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('.slider').slider({
                indicators: true
            });
            $('.modal').modal();
            $('select').material_select();
            $('.button-collapse').sideNav();
        });
        $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false,
            hover: true,
            gutter: 0,
            belowOrigin: true,
            alignment: 'left',
            stopPropagation: false
        });
    </script>
    <style>
        .balanco{
            margin-top: 10px;
        }
        body{
            background-image: url(/img/padaria-sucesso-do-negocio.jpg);
            background-size: cover;
        }
    </style>
</head>
<body>

    <div class="navbar-fixed">
        <nav class="cabecalho">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo"><img title="Compra e Venda" src="/img/logotipo-do-design-de-paes.avif" width="80px" height="50px" class="responsive-img" alt=""></a>
                <ul class="right hide-on-med-and-down">
                    <li title="{{ session('email_gerente')['nome'] }}"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcoes"><i class="material-icons left">account_circle</i> {{ session('email_gerente')['nome'] }}<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    {{-- SIDE NAV --}}
    <ul id="slide-out" class="side-nav" style="background: rgb(0, 0, 0, 0);">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="/img/tic_nas_empresas-1024x538.jpg" alt="">
                </div>
                <a href="#"><img src="/img/Braulio.png" class="circle" alt=""></a>
                <a href="#"><span class="white-text name">{{ session('email_gerente')['nome'] }}</span></a>
                <a href="#"><span class="white-text email">{{ session('email_gerente')['email'] }}</span></a>
                <a href="#"><span class="white-text email" style="text-transform: uppercase;">{{ session('email_gerente')['funcao'] }}</span></a>
            </div>
        </li>
        <li style="font-size: 20px;"><a href="" class="white-text"><i class="material-icons white-text">group</i> Funcionários <i class="material-icons white-text right">chevron_right</i></a></li>
        <li style="font-size: 20px;"><a href="#" data-beloworigin="true" data-activates="registros" class="white-text dropdown-button"><i class="material-icons white-text">local_grocery_store</i> Produtos <i class="material-icons white-text right">chevron_right</i></a></li>
        <li style="font-size: 20px;"><a href="" class="white-text"><i class="material-icons white-text">message</i> Comentários <i class="material-icons white-text right">chevron_right</i></a></li>
        <li style="font-size: 20px;"><a href="#" data-beloworigin="true" data-activates="comunicados" class="white-text dropdown-button"><i class="material-icons white-text">description</i> Comunicado <i class="material-icons white-text right">chevron_right</i></a></li>
        <li style="font-size: 20px;" title="{{ session('email_gerente')['nome'] }}"><a href="{{ route('sair') }}" class="white-text"><i class="material-icons white-text">exit_to_app</i> Terminar Sessão <i class="material-icons white-text right">chevron_right</i></a></li>
    </ul>

    <div class="row">
        <a href="#" title="Menu" data-activates="slide-out" style="background: rgb(255, 102, 0);" class="btn btn-large btn-floating button-collapse"><i class="material-icons">menu</i></a>
        <div class="container balanco">
            <div class="col s12 m6 l4">
                <div class="card-panel center" style="background: rgb(0, 0, 0, 0.6); border-radius: 10%;">
                    <i class="material-icons large orange-text">add_shopping_cart</i><br> <span style="font-size: 18px;" class="white-text">Vendas Diárias ({{ $lista_venda->count() }})</span>
                    <br>
                    <a href="#consulta_vendas" class="btn btn-floating waves-effect orange modal-trigger" title="Vendas diárias"><i class="material-icons">add</i></a>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card-panel center" style="background: rgb(0, 0, 0, 0.6); border-radius: 10%;">
                    <i class="material-icons large orange-text">local_grocery_store</i><br> <span style="font-size: 18px;" class="white-text">Compras Diárias ({{ $lista_compras->count() }})</span>
                    <br>
                    <a href="#consulta_compra" class="btn btn-floating waves-effect orange modal-trigger" title="Compras diárias"><i class="material-icons">add</i></a>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card-panel center" style="background: rgb(0, 0, 0, 0.6); border-radius: 10%;">
                    <i class="material-icons large orange-text">account_balance</i><br> <span style="font-size: 18px;" class="white-text">Lucro Líquido</span>
                    <br>
                    <a href="{{ route('lucro_da_empresa') }}" class="btn btn-floating waves-effect orange" title="Ver Lucro da Empresa"><i class="material-icons">add</i></a>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card-panel center" style="background: rgb(0, 0, 0, 0.6); border-radius: 10%;">
                    <i class="material-icons large orange-text">group</i><br> <span style="font-size: 18px;" class="white-text">Funcionários ({{ $funcionarios->count() }})</span>
                    <br>
                    <a href="{{ route('listar_funcionarios') }}" class="btn btn-floating waves-effect orange" title="Ver Dados dos Funcionários"><i class="material-icons">add</i></a>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card-panel center" style="background: rgb(0, 0, 0, 0.6); border-radius: 10%;">
                    <i class="material-icons large orange-text">local_grocery_store</i><br> <span style="font-size: 18px;" class="white-text">Produtos ({{ $produtos->count() }})</span>
                    <br>
                    <a href="{{ route('gestao_de_produtos') }}" class="btn btn-floating waves-effect orange" title="Consultar Produtos"><i class="material-icons">add</i></a>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card-panel center" style="background: rgb(0, 0, 0, 0.6); border-radius: 10%;">
                    <i class="material-icons large orange-text">chat</i><br> <span style="font-size: 18px;" class="white-text">Comentários ({{ $total_comentarios->count() }})</span>
                    <br>
                    <a href="{{ route('lista_comentario') }}" class="btn btn-floating waves-effect orange" title="Ver Comentários"><i class="material-icons">add</i></a>
                </div>
            </div>
        </div>
    </div>

    <ul id="registros" class="dropdown-content">
        <li title="Registrar Produtos">
            <a href="#registrar_produtos" class="orange-text modal-trigger"><i class="material-icons">edit</i> Registrar</a>
        </li>
    </ul>

    <ul id="opcoes" class="dropdown-content">
        <li title="Terminar Sessão">
            <a href="{{ route('sair') }}" class="orange-text"><i class="material-icons">exit_to_app</i> Terminar sessão</a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
    </ul>

    <ul id="comunicados" class="dropdown-content">
        <li title="Públicar comunicado">
            <a href="#registrar_comunicados" class="orange-text modal-trigger"><i class="material-icons">edit</i> Públicar</a>
        </li>
        <li title="Listar Comunicado">
            <a href="#" class="orange-text modal-trigger"><i class="material-icons">description</i> Listar</a>
        </li>
    </ul>

    <div class="row">
        <div class="modal" id="registrar_produtos" style="background: rgba(0,0,0,0.6);">
            <div class="modal-footer" style="background: rgb(255, 102, 0);">
                <h5 class="white-text center">
                    <i class="material-icons">add_shopping_cart</i> Formulário de Registro de Produtos</h5>
            </div>
            <div class="modal-content">
                <form action="{{ route('registro_de_produtos') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-field m6">
                        <select name="nome_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o nome do produto</option>
                            <option value="Pão">PÃO</option>
                            <option value="Bolo">BOLO</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <input type="file" name="foto_produto" title="Foto do Produto" class="white-text" required>
                    </div>
                    <div class="input-field m6">
                        <select name="tipo_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o tipo deste produto</option>
                            <option value="Americano">AMERICANO</option>
                            <option value="Itáliano">ITÁLIANO</option>
                            <option value="Portugués">PORTUGUÉS</option>
                            <option value="Integral">INTEGRAL</option>
                            <option value="Francês">FRANCÊS</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <select name="sabor_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o sabor do produto</option>
                            <option value="Salgado">SALGADO</option>
                            <option value="Doce">DOCE</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <select name="preco_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o preço do produto</option>
                            <option value="100">100,00 KZ</option>
                            <option value="50">50,00 KZ</option>
                            <option value="25">25,00 KZ</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <select name="iva_produto" class="white-text">
                            <option value="" disabled selected>Selecione o preço com iva do produto</option>
                            <option value="0.14">0,14</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <button type="submit" title="Registrar" class="btn btn-floating green waves-effect">
                            <i class="material-icons">send</i>
                        </button>
                        <a href="#" title="Fechar Janela" class="btn red btn-floating waves-effect modal-close">
                            <i class="material-icons">close</i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6">
            <div class="modal" id="registrar_comunicados" style="background: rgba(0,0,0,0.6)">
                <div class="modal-footer" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center"><i class="material-icons">border_color</i> Formulário de Registro de Comunicados</h5>
                </div>
                <div class="modal-content">
                    <form action="{{ route('comunicados') }}" method="post">
                        @csrf
                        <div class="input-field m6">
                            <input type="text" name="titulo" id="titulo" class="white-text" required>
                            <label for="titulo" class="white-text" style="font-size: 20px;">
                                Título do Comunicado
                            </label>
                        </div>
                        <div class="input-field m6">
                            <textarea name="conteudo" id="conteudo" required class="white-text materialize-textarea" cols="30" rows="10"></textarea>
                            <label for="conteudo" class="white-text" style="font-size: 18px;">
                                <i class="material-icons">description</i> Conteúdo do Comunicado</label>
                        </div>
                        <div class="input-field m6">
                            <select name="o_gerente" class="white-text" required>
                                <option value="" disabled selected>O GERENTE</option>
                                <option value="{{ session('email_gerente')['id'] }}">{{ session('email_gerente')['nome'] }}</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="Anúnciar" class="btn btn-floating green waves-effect">
                                <i class="material-icons">send</i>
                            </button>
                            <a href="#" title="Fechar Janela" class="btn red btn-floating waves-effect modal-close">
                                <i class="material-icons">close</i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6 l6">
            <div class="modal" id="consulta_vendas" style="background: rgba(0,0,0,0.6);">
                <div class="modal-footer" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center">Formulário de Consulta de Vendas</h5>
                </div>
                <div class="modal-content">
                    <form action="{{ route('consultar_vendas') }}" method="post">
                        @csrf
                        <div class="input-field m6">
                            <input type="date" title="Escolha uma data para consultar vendas" name="vendas_pesq" id="pesquisar" class="white-text" required style="border-radius: 10px; background: rgb(255, 102, 0);">
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="Consultar Vendas" class="btn btn-floating green waves-effect">
                                <i class="material-icons">search</i>
                            </button>
                            <a href="#" title="Fechar Janela" class="btn btn-floating red waves-effect modal-close">
                                <i class="material-icons">close</i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- CONTROLE DE COMPRAS --}}
    <div class="row">
        <div class="col s12 m6 l6">
            <div class="modal" id="consulta_compra" style="background: rgba(0,0,0,0.6);">
                <div class="modal-footer" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center">Formulário de Consulta de Compras de Clientes</h5>
                </div>
                <div class="modal-content">
                    <form action="{{ route('consultar_compra') }}" method="post">
                        @csrf
                        <div class="input-field m6">
                            <input type="date" title="Escolha uma data para consultar compras" name="compra_pesq" id="pesquisar" class="white-text" required style="border-radius: 10px; background: rgb(255, 102, 0);">
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="Consultar Compras" class="btn btn-floating green waves-effect">
                                <i class="material-icons">search</i>
                            </button>
                            <a href="#" title="Fechar Janela" class="btn btn-floating red waves-effect modal-close">
                                <i class="material-icons">close</i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @if(Session::has('message'))
        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton" : false,
            }
            toastr.success("{{ Session::get('message') }}",{timeOut: 1000});
        </script>
    @endif

</body>
</html>