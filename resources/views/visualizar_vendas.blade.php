<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONTROLE DE VENDAS</title>
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
        <h5 class="center white-text" style="background: rgb(255, 102, 0);">CONTROLE DIÁRIO DE VENDAS</h5>
        <p class="white-text" style="font-size: 20px;">
            
            <?php $total = 0; ?>
        </p>
                <table class="responsive-table centered highlight" style="background: rgba(0,0,0,0.6);">
                    <thead style="background: rgb(255, 102, 0);" class="white-text">
                        <th>PRODUTO</th>
                        <th>TIPO</th>
                        <th>PREÇO</th>
                        <th>QUANT. VENDIDO</th>
                        <th>LUCRO FINAL</th>
                        <th>NOME DO FUNCIONÁRIO</th>
                        <th>DATA</th>
                        {{-- <th>IMAGEM</th>  --}}
                    </thead>
                    @forelse ($consultar_vendas as $prod)
                    <tbody class="grey-text">
                        <tr>
                            <td>{{ $prod->nome_produto }}</td>
                            <td>{{ $prod->tipo }}</td>
                            <td>{{ $prod->preco }} KZ</td>
                            <td>{{ $prod->quantidade }}</td>
                            <td>{{ $prod->lucro }} KZ</td>
                            <td>{{ $prod->nome_funcionario }}</td>
                            <td>{{ $prod->data }}</td>
                            @php
                                $total += $prod->lucro;
                            @endphp
                            {{--<td><img src="/foto_produtos/{{ $prod->imagem_prod }}" class="responsive-img materialboxed" width="50px" height="50px" alt=""></td> --}}
                            
                        </tr>
                    </tbody>
                    @empty
                    <p class="orange-text center">Vendas de Produtos Indispóniveis!</p>
                    @endforelse
                </table>

                <div class="col s12 m5 l3 white-text">
                    <div class="card-panel center" style="background: rgb(255, 102, 0);">
                        <span class="white-text" style="font-size: 30px;">
                            <i class="material-icons">local_grocery_store</i> Vendas
                            ({{ $consultar_vendas->count(); }})
                        </span>
                    </div>
                </div>

                @if ($total != 0)
                <div class="col s12 l3 white-text" style="font-size: 30px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">  
                    <div class="card-panel center" style="background: rgb(47, 238, 21);">
                        <i class="material-icons">local_atm</i> Lucro: {{ $total }} KZ
                    </div>
                </div>
                @else
                <div class="col s12 l3 white-text" style="font-size: 30px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">  
                    <div class="card-panel center" style="background: rgb(238, 21, 21);">
                        <i class="material-icons">local_atm</i> Lucro: {{ $total }} KZ
                    </div>
                </div>
                @endif

        
    </div>

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/admin') }}" class="orange-text"><i class="material-icons">person</i> {{ session('email_gerente')['sobrenome'] }}</a>
        </li>
        <li title="Consultar Vendas por Data">
            <a href="#consulta_vendas" class="orange-text modal-trigger waves-effect">
                 <i class="material-icons">search</i> Consultar Vendas
            </a>
        </li>
    </ul>

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
    
</body>
</html>