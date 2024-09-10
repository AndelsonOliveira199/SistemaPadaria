<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ session('email_func')['nome'] }}</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/fonts/material-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background-image: url(/img/2021-10-11-como-montar-uma-padaria.jpg);
            background-size: cover;
        }
        h1{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>

    <div class="navbar-fixed">
        <nav class="cabecalho">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo"><img title="Compra e Venda" src="/img/logotipo-do-design-de-paes.avif" width="80px" height="50px" class="responsive-img" alt=""></a>
                <ul class="right hide-on-med-and-down">
                    <li title="{{ session('email_func')['nome'] }}"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcoes"><i class="material-icons left">account_circle</i> {{ session('email_func')['nome'] }} <i class="material-icons right">arrow_drop_down</i></a></li>
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
                <a href="#"><span class="white-text name">{{ session('email_func')['nome'] }}</span></a>
                <a href="#"><span class="white-text email">{{ session('email_func')['email'] }}</span></a>
                <a href="#"><span class="white-text email" style="text-transform: uppercase;">{{ session('email_func')['funcao'] }}</span></a>
            </div>
        </li>
        <li style="font-size: 20px;"><a href="{{ route('form_produtos_venda') }}" class="white-text modal-trigger"><i class="material-icons white-text">person</i> Atendimento <i class="material-icons white-text right">chevron_right</i></a></li>
        <li style="font-size: 20px;" title="De momento está função se encontra bloqueada"><a href="#" class="white-text modal-trigger"><i class="material-icons white-text">add_shopping_cart</i> Vendas <i class="material-icons white-text right">chevron_right</i></a></li>
        {{-- formulario_vendas_produtos --}}
        <li style="font-size: 20px;"><a href="{{ route('lista_produto') }}" class="white-text"><i class="material-icons white-text">add_shopping_cart</i> Produtos <i class="material-icons white-text right">chevron_right</i></a></li>
        {{-- <li style="font-size: 20px;"><a href="#" class="white-text"><i class="material-icons white-text">add_shopping_cart</i> Encomendas</a></li> --}}
        <li style="font-size: 20px;" title="Registrar Compra"><a href="#registro_compra" class="white-text modal-trigger"><i class="material-icons white-text">local_grocery_store</i> Compras <i class="material-icons white-text right">chevron_right</i></a></li>
        <li style="font-size: 20px;" title="Registrar Quantidade de Produtos a ser Feito"><a href="{{ route('produtos_vendas_registro_quant') }}" class="white-text modal-trigger"><i class="material-icons white-text">build</i> Stock <i class="material-icons white-text right">chevron_right</i></a></li>
        <li style="font-size: 20px;" title="{{ session('email_func')['nome'] }}"><a href="{{ route('logout') }}" class="white-text"><i class="material-icons white-text">exit_to_app</i> Terminar Sessão <i class="material-icons white-text right">chevron_right</i></a></li>
    </ul>

    <a href="#" title="Menu" data-activates="slide-out" style="background: rgb(255, 102, 0);" class="btn btn-large btn-floating button-collapse"><i class="material-icons">menu</i></a>

    <div class="row container">
        <div class="col s12 m6 l4">
            <div class="card-panel center white-text" style="background: rgba(0,0,0,0.6); border-radius: 20px; font-size: 20px;">
                <i class="material-icons large orange-text">add_shopping_cart</i><br>
                ATENDIMENTO <br>
                <a href="{{ route('form_produtos_venda') }}" title="Atender Cliente que não fizeram registro" class="btn btn-floating green waves-effect">
                    <i class="material-icons">add</i>
                </a>
            </div>
        </div>
        <div class="col s12 m6 l4">
            <div class="card-panel center white-text" style="background: rgba(0,0,0,0.6); border-radius: 20px; font-size: 20px;">
                <i class="material-icons large orange-text">local_grocery_store</i><br>
                COMPRAS <br>
                <a href="#registro_compra" title="Consultar Compras de Clientes para Serem Atendidos" class="btn btn-floating modal-trigger green waves-effect">
                    <i class="material-icons">add</i>
                </a>
            </div>
        </div>
        <div class="col s12 m6 l4">
            <div class="card-panel center white-text" style="background: rgba(0,0,0,0.6); border-radius: 20px; font-size: 20px;">
                <i class="material-icons large orange-text">local_grocery_store</i><br>
                PRODUTOS <br>
                <a href="{{ route('produtos_vendas_registro_quant') }}" title="Registrar Produtos para Vendas" class="btn btn-floating green waves-effect">
                    <i class="material-icons">add</i>
                </a>
            </div>
        </div>
    </div>
    
    {{-- FORMULÁRIO DE REGISTRO DE VENDAS --}}
    <div class="row">

        <div class="col s12 m6">
            <div class="modal" id="formulario_vendas_produtos" style="background: rgba(0,0,0,0.6);">
                <div class="modal-footer" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center"><i class="material-icons white-text">add_shopping_cart</i> Formulário de Registro de Compras</h5>
                </div>
                <div class="modal-content">
                    <form action="{{ route('registrar_vendas') }}" method="post">
                        @csrf
                        <div class="input-field m6">
                            <select name="nome_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o produto que o cliente deseja comprar</option>
                               
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="tipo_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o tipo de produto</option>
                                <option value="Americano">Americano</option>
                                <option value="Itáliano">Itáliano</option>
                                <option value="Integral">Integral</option>
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
                                <option value="" disabled selected>Selecione o preço deste produto</option>
                                <option value="100">100,00 KZ</option>
                                <option value="50">50,00 KZ</option>
                                <option value="25">25,00 KZ</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <input type="number" name="quantidade_produto" class="white-text" required id="quantidade_produto">
                            <label for="quantidade_produto" class="white-text" style="font-size: 20px;">Quantos produtos o cliente quer?</label>
                        </div>
                        <div class="input-field m6">
                            <select name="preco_sacola" class="white-text" required>
                                <option value="" disabled selected>O cliente deseja levar saco?</option>
                                <option value="10">Sim, deseja</option>
                                <option value="0">Não deseja!</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="nome_funcionario" class="white-text" required>
                                <option value="" disabled selected>Selecione a sua assinatura</option>
                                
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
    </div>

    {{-- FORMULÁRIO DE REGISTRO DE COMPRAS --}}
    <div class="row">
        <div class="col s12 m6">
            <div class="modal" id="registro_compra" style="background: rgba(0,0,0,0.6);">
                <div class="modal-footer" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center"><i class="material-icons white-text">local_grocery_store</i> Formulário de Consulta de Compras</h5>
                </div>
                <div class="modal-content">
                    <form action="{{ route('consultar_compra_cliente') }}" method="post">
                        @csrf
                        <div class="input-field m6">
                            <input type="text" name="nome_cliente" id="nome_cliente" required class="white-text">
                            <label for="nome_cliente" class="white-text" style="font-style: 20px;">
                                <i class="material-icons">person</i> Por favor, escreva o nome de um cliente para consultar compra
                            </label>
                        </div>
                        {{-- <div class="input-field m6">
                            <input type="datetime" title="Selecione a data de registro de compra do cliente" name="data_compra" id="nome_cliente" required class="white-text data">
                        </div> --}}
                        <div class="input-field m6">
                            <button type="submit" title="consultar compra" class="btn btn-floating green waves-effect">
                                <i class="material-icons">search</i>
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

    {{-- FORMULÁRIO DE REGISTRO DE QUANTIDADE DE PRODUTOS A SER FEITA --}}
    <div class="row">
        <div class="col s12 m6">
            <div class="modal" id="registrar_quant_prod" style="background: rgba(0,0,0,0.6);">
                <div class="modal-footer" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center"><i class="material-icons white-text">local_grocery_store</i> Formulário de Registro de Quantidade de Produtos</h5>
                </div>
                <div class="modal-content">
                    <form action="{{ route('registro_prod_vendas') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-field m6">
                            <select name="nome_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o produto a ser feito</option>
                                
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="tipo_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o tipo do produto a ser feito</option>
                                <option value="Americano">Americano</option>
                                <option value="Itáliano">Itáliano</option>
                                <option value="Integral">Integral</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <input type="number" placeholder="Selecione a Quantidade de Produtos a ser Feito" name="quant_prod_feita" required class="white-text" id="quant_prod_feita">
                        </div>
                        <div class="input-field m6">
                            <select name="preco_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o preço do produto a ser feito</option>
                                
                            </select>
                        </div>
                        <div class="input-field m6">
                            <input type="file" name="imagem_produto" title="Selecione a Imagem do Produto" class="white-text" required id="imagem_produto">
                        </div>
                        <div class="input-field m6">
                            <select name="nome_funcionario" class="white-text" required>
                                <option value="" disabled selected>Selecione a sua assinatura</option>
                                
                            </select>
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="consultar compra" class="btn btn-floating green waves-effect">
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

    <ul id="opcoes" class="dropdown-content">
        <li title="Terminar Sessão">
            <a href="{{ route('logout') }}" title="{{ session('email_func')['nome'] }}" class="orange-text"><i class="material-icons">exit_to_app</i> Terminar</a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
    </ul>

    
    
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
    </script>
</body>
</html>