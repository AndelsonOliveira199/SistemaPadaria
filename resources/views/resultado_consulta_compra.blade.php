<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Compra do Cliente</title>
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
        <div class="">
            <h5 class="white-text center orange"><i class="material-icons white-text">local_grocery_store</i> <b>RESULTADOS DA LISTA DE COMPRAS</b></h5>
            <table class="responsive-table centered highlight" style="background: rgba(0,0,0,0.6);">
                <thead class="orange white-text">
                    <th>CLIENTE</th>
                    <th>PRODUTO</th>
                    <th>TIPO</th>
                    <th>PREÇO</th>
                    <th>QUANTIDADE</th>
                    <th>PAGAMENTO COM SACO</th>
                    <th>TOTAL A PAGAR</th>
                    <th>DATA DE COMPRA</th>
                    <th><i class="material-icons">build</i></th>
                </thead>
                <tbody class="grey-text" style="font-size: 20px;">
                    @forelse ($consultar as $consulta)
                    <tr>
                        <td>{{ $consulta->cliente }}</td>
                        <td>{{ $consulta->produto }}</td>
                        <td>{{ $consulta->tipo }}</td>
                        <td>{{ $consulta->preco_prod }} KZ</td>
                        <td>{{ $consulta->quantidade }} Pães</td>
                        <td>{{ $consulta->saco }} KZ</td>
                        <td>{{ $consulta->preco }} KZ</td>
                        <td>{{ $consulta->data_compra }}</td>
                        <td>
                            <a href="{{ route('form_registro_vendas', ['id' =>$consulta->id_compras]) }}" title="Adicionar Produto na Lista de Vendas" class="btn btn-floating green waves-effect">
                                <i class="material-icons white-text">add_shopping_cart</i>
                            </a>
                        </td>
                    </tr>
                    @empty
                        <div class="red white-text center" style="font-size: 20px;">Não conseguimos encontrar nenhuma compra deste cliente!</div>
                    @endforelse
                </tbody>
            </table>
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