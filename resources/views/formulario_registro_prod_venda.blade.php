<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORMULÁRIO DE REGISTRO DE PRODUTOS A VENDA</title>
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

    <div class="row">
        <div class="col s12 m6 l6 offset-l3">
            <div class="card-panel" style="background: rgba(0,0,0,0.6);">
                <form action="{{ route('registro_produto_venda') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-field m6">
                        <select name="nome_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o produto</option>
                            <option value="{{ $id_produtos['id_produtos'] }}">{{ $id_produtos['nome_produto'] }}</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <input type="file" name="foto_prod" class="white-text" title="Logotipo do Produto" id="foto_prod" required>
                    </div>
                    <div class="input-field m6">
                        <select name="tipo_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o tipo do produto</option>
                            <option value="{{ $id_produtos['tipo_produto'] }}">{{ $id_produtos['tipo_produto'] }}</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <select name="sabor_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o sabor do produto</option>
                            <option value="{{ $id_produtos['sabor'] }}">{{ $id_produtos['sabor'] }}</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <select name="preco_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o preço do produto</option>
                            <option value="{{ $id_produtos['preco'] }}">{{ $id_produtos['preco'] }} KZ</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <input type="number" name="quant_prod_feito" class="white-text" id="quant_prod_feito" required>
                        <label for="quant_prod_feito" class="white-text" style="font-size: 20px;">Informe a quantidade a ser feita</label>
                    </div>
                    <div class="input-field m6">
                        <select name="nome_funcionario" class="white-text" required>
                            <option value="" disabled selected>Selecione a sua assinatura</option>
                            <option value="{{ session('email_func')['id_funcionarios'] }}">{{ session('email_func')['nome'] }}</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <button type="submit" class="btn btn-floating green waves-effect" title="Registrar">
                            <i class="material-icons">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/painel_funcionario') }}" class="orange-text"><i class="material-icons">person</i> {{ session('email_func')['nome'] }}</a>
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