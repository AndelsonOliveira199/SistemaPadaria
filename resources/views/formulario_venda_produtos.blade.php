<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário de Atendimento ao Cliente</title>
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
                    <li title="{{ session('email_func')['nome'] }}"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcoes"><i class="material-icons left">menu</i> Opções de Menus <i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="">
            <table class="responsive-table centered" style="background: rgba(0,0,0,0.6); font-size: 18px; margin-top: 20px;">
                <thead style="background: rgba(255, 102, 0);" class="white-text">
                    <th>ID</th>
                    <th>PRODUTO</th>
                    <th>TIPO</th>
                    <th>QUANTIDADE FEITA</th>
                    <th>PREÇO</th>
                    <th>LUCRO ESPERADO</th>
                    <th>LOGO DO PRODUTO</th>
                    <th>GERÊNCIAMENTO</th>
                </thead>
                <tbody class="white-text">
                    @forelse ($prod_venda as $prod)
                        <tr>
                            <td>{{ $prod->id_registro }}</td>
                            <td>{{ $prod->produto }}</td>
                            <td>{{ $prod->tipo }}</td>
                            <td>{{ $prod->quant }}</td>
                            <td>{{ $prod->preco }} KZ</td>
                            <td>{{ $prod->lucro }} KZ</td>
                            <td><img src="/foto_produtos/{{ $prod->imagem }}" style="border-radius: 50%; font-size: 200px; height: 100px;" alt=""></td>
                            <td>
                                <a href="{{ route('form_atendimento_cli', ['id' =>$prod->id_registro]) }}" title="Registrar Venda" class="btn btn-floating green waves-effect">
                                    <i class="material-icons">add_shopping_cart</i>
                                </a>
                                <a href="#" title="Atualizar Quantidade de Vendas" class="btn btn-floating blue waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <p class="white-text center" style="background: rgba(0,0,0,0.6);">Tabela de atendimento indisponível!</p>
                    @endforelse
                </tbody>
            </table>
        <p class="white-text center container" style="font-size: 20px; background: rgba(255, 102, 0);"><i class="material-icons">add_shopping_cart</i> <b>TABELA DE ATENDIMENTO AO CLIENTE</b></p>
        <p class="white-text center" style="background: rgba(255, 102, 0); font-size: 18px;">Nesta sessão é onde serão atendidos os clientes pela qual não fizeram registro</p>
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