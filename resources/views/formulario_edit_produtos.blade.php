<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão de Produtos</title>
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
                    <li title="MENUNS DE OPÇÕES"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcoes"><i class="material-icons left">menu</i> Menus de Opções<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12 m6 l6 offset-l3">
            <div class="card" style="background: rgba(0,0,0,0.6);">
                <div class="card-action" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center"><i class="material-icons">edit</i> Edição de Produtos</h5>
                </div>
                <div class="card-content">
                    <form action="{{ route('form_submit_prod') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_produto" value="{{ $edit_prod['id_produtos'] }}">
                        <div class="input-field m6">
                            <div class="input-field m6">
                                <input type="text" value="{{ $edit_prod['nome_produto'] }}" name="produto_nome" class="white-text" required id="nome_produto">
                                <label for="nome_produto" class="white-text" style="font-size: 20px;">
                                    Nome do Produto
                                </label>
                            </div>
                        </div>
                        <div class="input-field m6">
                            <input type="text" value="{{ $edit_prod['tipo_produto'] }}" name="tipo_produto" class="white-text" required id="tipo_produto">
                            <label for="tipo_produto" class="white-text" style="font-size: 20px;">
                                Tipo do Produto
                            </label>
                        </div>
                        <div class="input-field m6">
                            <input type="text" value="{{ $edit_prod['sabor'] }}" name="sabor_produto" class="white-text" required id="sabor_produto">
                            <label for="sabor_produto" class="white-text" style="font-size: 20px;">
                                Sabor do Produto
                            </label>
                        </div>
                        <div class="input-field m6">
                            <input type="number" value="{{ $edit_prod['preco'] }}" name="preco_produto" class="white-text" required id="preco_produto">
                            <label for="preco_produto" class="white-text" style="font-size: 20px;">
                                <i class="material-icons">attach_money</i> Preço do Produto
                            </label>
                        </div>
                        <div class="input-field m6">
                            <select name="iva_produto" class="white-text">
                                <option value="" disabled selected>Selecione o valor iva do produto</option>
                                <option value="0.14">0,14</option>
                            </select>
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="Salvar Edição" style="background: rgb(255, 102, 0);" class="btn btn-floating waves-effect">
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
            <a href="{{ url('/gestao_de_produtos') }}" class="orange-text"><i class="material-icons">home</i> Início</a>
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