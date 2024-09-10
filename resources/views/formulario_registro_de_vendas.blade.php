<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão de Compras</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/fonts/material-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
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
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('select').material_select();
        });
    </script>
    <style>
        body{
            background-image: url(/img/padaria-ou-loja-de-pao.jpg);
            background-size: cover;
        }
        table {
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="navbar-fixed">
        <nav class="cabecalho">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo"><img title="Compra e Venda" src="/img/logotipo-do-design-de-paes.avif" width="80px" height="50px" class="responsive-img" alt=""></a>
                <ul class="right hide-on-med-and-down">
                    <li title="MENUS DE OPÇÕES"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcoes"><i class="material-icons left">menu</i> Menu de Opções<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    {{-- FORMULÁRIO DE REGISTRO DE VENDAS --}}
    <div class="row">

        <div class="col s12 m6 l7 offset-l3">
            <div class="card" style="background: rgba(0,0,0,0.6);">
                <div class="card-action" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center"><i class="material-icons white-text">add_shopping_cart</i> Formulário de Registro de Vendas</h5>
                </div>
                <div class="card-content">
                    <form action="{{ route('registrar_vendas') }}" method="post">
                        @csrf
                        <div class="input-field m6">
                            <select name="nome_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o produto que o cliente desejou</option>
                                <option value="{{ $dados_compra->produto_id }}">{{ $dados_compra->produto_id }}</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="tipo_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o tipo de produto que o cliente desejou</option>
                                <option value="{{ $dados_compra->tipo_produto }}">{{ $dados_compra->tipo_produto }}</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="sabor_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o sabor do produto que o cliente desejou</option>
                                <option value="Salgado">SALGADO</option>
                                <option value="Doce">DOCE</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="preco_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o preço do produto que o cliente escolheu</option>
                                <option value="{{ $dados_compra->preco_produto }}">{{ $dados_compra->preco_produto }} KZ</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="quantidade_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione a quantidade de produtos que o cliente escolheu</option>
                                <option value="{{ $dados_compra->quantidade_compra }}">{{ $dados_compra->quantidade_compra }}</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="preco_sacola" class="white-text" required>
                                <option value="" disabled selected>O cliente deseja levar saco?</option>
                                <option value="{{ $dados_compra->sacola }}">{{ $dados_compra->sacola }}</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="nome_funcionario" class="white-text" required>
                                <option value="" disabled selected>Selecione a sua assinatura</option>
                                    <option value="{{ session('email_func')['id_funcionarios'] }}">{{ session('email_func')['nome'] }}</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="Registrar" class="btn btn-floating green waves-effect">
                                <i class="material-icons">save</i>
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
        <li title="Voltar ao Painel">
            <a href="{{ url('/painel_funcionario') }}" class="orange-text"><i class="material-icons">home</i> Início</a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
    </ul>

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