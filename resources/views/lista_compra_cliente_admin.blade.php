<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LISTA - COMPRAS</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/fonts/material-icons.css">
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/materialize.min.js"></script>
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
        <h5 class="center white-text" style="background: rgb(0, 0, 0, 0.6);"><i class="material-icons">add_shopping_cart</i> <br> CONTROLE DE COMPRAS DIÁRIAS</h5>
        
                <table class="responsive-table centered highlight" style="background: rgba(0,0,0,0.6);">
                    <thead style="background: rgb(255, 102, 0);" class="white-text">
                        <th>CLIENTE</th>
                        <th>PRODUTO</th>
                        <th>PREÇO</th>
                        <th>TIPO DO PRODUTO</th>
                        <th>QUANTIDADE COMPRADO</th>
                        <th>VALOR DO SACO</th>
                        <th>TOTAL PAGO</th>
                    </thead>
                    @forelse ($consultar_compras as $prod)
                    <tbody class="grey-text">
                        <tr>
                            <td>{{ $prod->cliente }}</td>
                            <td>{{ $prod->produto }}</td>
                            <td>{{ $prod->preco_prod }} KZ</td>
                            <td>{{ $prod->tipo }}</td>
                            <td>{{ $prod->quantidade }}</td>
                            <td>{{ $prod->sacola }} KZ</td>
                            <td>{{ $prod->total }} KZ</td>
                            {{--<td><img src="/foto_produtos/{{ $prod->imagem_prod }}" class="responsive-img materialboxed" width="50px" height="50px" alt=""></td> --}}
                            <?php $total_compra += $prod->total ?>
                        </tr>
                    </tbody>
                    @empty
                    <p class="red white-text center" style="font-size: 18px;">Não Foram Encontrados Nenhum Registro de Compras Nesta Data!</p>
                    @endforelse
                </table>
                <div class="col s12 l3 white-text" style="font-size: 30px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">  
                    <div class="card-panel center" style="background: rgb(255, 102, 0);">
                        {{-- <i class="material-icons">add_shopping_cart</i><br> --}}
                        <span class="white-text">TOTAL COMPRAS: {{ $consultar_compras->count(); }}</span>
                    </div>
                </div>
                <div class="col s12 l3 white-text" style="font-size: 30px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">  
                    <div class="card-panel center" style="background: rgb(255, 102, 0);">
                        Lucro: {{ $total_compra }} KZ
                    </div>
                </div>

        
    </div>

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/admin') }}" class="orange-text"><i class="material-icons">person</i> {{ session('email_gerente')['sobrenome'] }}</a>
        </li>
        <li title="Consultar Compras de Clientes por Data">
            <a href="#consulta_vendas" class="orange-text modal-trigger waves-effect">
                 <i class="material-icons">search</i> Consultar Compras
            </a>
        </li>
    </ul>

    <div class="row">
        <div class="col s12 m6 l6">
            <div class="modal" id="consulta_vendas" style="background: rgba(0,0,0,0.6);">
                <div class="modal-footer" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center"><i class="material-icons">https</i> <br>Formulário de Consulta de Compras</h5>
                </div>
                <div class="modal-content">
                    <form action="{{ route('consultar_compra') }}" method="post">
                        @csrf
                        <div class="input-field m6">
                            <input type="date" title="Escolha uma data para consultar compras" name="compra_pesq" id="pesquisar" class="white-text" required style="border-radius: 10px; background: rgb(255, 102, 0);"> 
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="Consultar compras" class="btn btn-floating green waves-effect">
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
    
</body>
</html>