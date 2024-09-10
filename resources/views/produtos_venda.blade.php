<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRODUTOS</title>
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
    <style>
        body{
            background-image: url(/img/padaria-ou-loja-de-pao.jpg);
            background-size: cover;
        }
        table {
            font-size: 20px;
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
            <table class="responsive-table centered highlight" style="background: rgba(0,0,0,0.6); margin-top: 20px;">
                <thead style="background: rgb(255, 102, 0);" class="white-text">
                    <th>ID</th>
                    <th>PRODUTO</th>
                    <th>LOGOTIPO</th>
                    <th>TIPO</th>
                    <th>SABOR</th>
                    <th>PREÇO</th>
                </thead>
                <tbody class="grey-text">
                    @forelse ($prod as $lista_prod)
                        <tr>
                            <td>{{ $lista_prod->id_produtos }}</td>
                            <td>{{ $lista_prod->nome_produto }}</td>
                            <td><img src="/foto_produtos/{{ $lista_prod->foto_produto }}" width="100px" height="50px" style="border-radius: 100%;" class="responsive-img materialboxed" alt=""></td>
                            <td>{{ $lista_prod->tipo_produto }}</td>
                            <td>{{ $lista_prod->sabor }}</td>
                            <td>{{ $lista_prod->preco }} KZ</td>
                        </tr>
                    @empty
                        <div class="container white-text" style="background: rgba(0,0,0,0.6); font-size: 20px;">
                            Lista de Produtos Vazia
                        </div>
                    @endforelse
                </tbody>
            </table>

            <h5 class="center white-text" style="background: rgb(255, 102, 0);">
                <i class="material-icons">build</i> TABELA DE PRODUTOS</h5>
    </div>

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/painel_funcionario') }}" title="Voltar ao Painel" class="orange-text modal-trigger waves-effect">
                <i class="material-icons">person</i> {{ session('email_func')['nome'] }}
            </a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
    </ul>
    
</body>
</html>