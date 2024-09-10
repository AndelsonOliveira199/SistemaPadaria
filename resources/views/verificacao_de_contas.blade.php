<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MINHAS CONTAS</title>
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

    <div class="row">
        <h5 class="white-text center" style="background: rgb(255, 102, 0);">BALANÇO DA MINHA CONTA DE COMPRAS DIÁRIAS</h5>
        <p class="white-text container" style="background: rgba(0,0,0,0.6);">
            
        </p>
        
            
                <table class="responsive-table centered highlight" style="background: rgba(0,0,0,0.6);">
                    <thead style="background: rgb(255, 102, 0);" class="white-text">
                        <th>CLIENTE</th>
                        <th>PRODUTO</th>
                        <th>QUANT.COMPRA</th>
                        <th>TIPO</th>
                        <th>CUSTO</th>
                        <th>CUSTO TOTAL</th>
                        <th title="Gestão de contas">GESTÃO</th>
                    </thead>
                    @forelse ($verifica as $prod)
                    <tbody class="grey-text">
                        <tr>
                            <td>{{ $prod->cliente }}</td>
                            <td>{{ $prod->produto }}</td>
                            <td>{{ $prod->quantidade }}</td>
                            <td>{{ $prod->tipo }}</td>
                            <td>{{ $prod->preco }} KZ</td>
                            <td>{{ $prod->total_pagar }} KZ</td>
                            <td>
                                <a href="#" title="Alterar quantidade do produto" style="background: rgb(255, 102, 0);" class="btn btn-floating waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                    <p class="white-text center" style="background: rgba(0,0,0,0.6);">Não Conseguimos Encontrar Nenhuma conta neste Nome!</p>
                    @endforelse
                </table>
        
    </div>

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/') }}" class="orange-text"><i class="material-icons">home</i> Início</a>
        </li>
        <li title="Verificar Contas">
            <a href="#form_contas" class="orange-text modal-trigger"><i class="material-icons">attach_money</i> Contas</a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
    </ul>

    
    <div class="col s12 m6">
        <div class="modal" id="form_contas" style="background: rgba(0,0,0,0.6);">
            <div class="modal-footer" style="background: rgb(255, 102, 0);">
                <h5 class="white-text center"><i class="material-icons">local_atm</i> Verificação de Contas</h5>
            </div>
            <div class="modal-content">
                <form action="#" method="post">
                    @csrf
                    <div class="input-field m6">
                        <input type="text" name="cliente" id="cliente" class="white-text" required>
                        <label for="cliente" class="white-text" style="font-size: 20px;">
                            <i class="material-icons">person</i> Por favor, digite o nome que fez o registro de compra
                        </label>
                    </div>
                    <div class="input-field m6">
                        <input type="date" title="Por favor, indique o dia pela qual fez a compra" name="data" id="data" class="white-text" required>
                    </div>
                    <div class="input-field m6">
                        <button type="submit" title="Consultar Contas" class="btn btn-floating waves-effect green">
                            <i class="material-icons">search</i>
                        </button>
                        <a href="#" title="Fechar Formulário" class="btn btn-floating red waves-effect modal-close">
                            <i class="material-icons">close</i>
                        </a>
                    </div>
                </form>
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