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

    <div class="row container">
        {{-- <h5 class="white-text" style="background: rgb(255, 102, 0);">LISTA DE PRODUTOS FEITOS A VENDA</h5> --}}
        <div class="col s12 m6 l7 offset-l3">
            <div class="card" id="comprar_produto" style="background: rgba(0,0,0,0.6)">
                <div class="card-action" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center"><i class="material-icons">add_shopping_cart</i> Formulário de Compras de Produtos</h5>
                </div>
                <div class="card-content">
                    <form action="{{ route('form_submit_compra_prod_clientes') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $dados_compra->id }}">
                        <div class="input-field m6">
                            <input type="text" name="nome_cliente" style="background: rgb(255, 102, 0); border-radius: 10px;" class="white-text" required id="nome_cliente">
                            <label for="nome_cliente" class="white-text" style="font-size: 20px;">
                                <i class="material-icons">person</i> Por favor, informe-nos o seu nome
                            </label>
                        </div>
                        <div class="input-field m6">
                            <select name="nome_produto" style="background: rgb(255, 102, 0); border-radius: 10px;" class="white-text" required>
                                <option value="" disabled selected>Selecione o código do produto escolhido (Nome do Produto)</option>
                                <option value="{{ $dados_compra->produto_id }}">Pão</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="preco_produto" style="background: rgb(255, 102, 0); border-radius: 10px;" class="white-text" required>
                                <option value="" disabled selected>Selecione o preço produto</option>
                                <option value="{{ $dados_compra->preco_produto }}">{{ $dados_compra->preco_produto }} KZ</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="tipo_produto" style="background: rgb(255, 102, 0); border-radius: 10px;" class="white-text" required>
                                <option value="" disabled selected>Selecione o tipo do produto</option>
                                <option value="{{ $dados_compra->tipo_produto }}">{{ $dados_compra->tipo_produto }}</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="quantidade_feita" title="Quantidade de produtos dispóniveis" style="background: rgb(255, 102, 0); border-radius: 10px;" class="white-text" required>
                                <option value="{{ $dados_compra->quant_prod_feita }}" selected title="Quantidade de produto dispónivel">{{ $dados_compra->quant_prod_feita }}</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <div class="input-field m6">
                                <input type="number" style="background: rgb(255, 102, 0); border-radius: 10px;" name="quant_compra" class="white-text" required id="quant_compra">
                                <label for="quant_compra" class="white-text" style="font-size: 20px;">
                                    Quantos Produtos quer Comprar?
                                </label>
                            </div>
                        </div>
                        <div class="input-field m6">
                            <select name="valor_saco" style="background: rgb(255, 102, 0); border-radius: 10px;" class="white-text" required>
                                <option value="" disabled selected>Deseja adicionar um saco?</option>
                                <option value="10">Sim, desejo</option>
                                <option value="0">Não obrigado!</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="Registrar" class="btn btn-floating waves-effect" style="background: rgb(7, 216, 25);">
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
        <li title="Voltar ao Painel">
            <a href="{{ url('/') }}" class="orange-text"><i class="material-icons">home</i> Início</a>
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