<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nossos Produtos</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/fonts/material-icons.css">
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/materialize.min.js"></script>
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
                    <li title="OPÇÕES DE MENUS"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcoes"><i class="material-icons left">menu</i> OPÇÕES<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="container">
        <h5 class="center white-text" style="background: rgb(255, 102, 0);">LISTA COMPLETA DOS NOSSOS PRODUTOS E SEUS PREÇARIOS</h5>
        <p class="white-text" style="background: rgba(0,0,0,0.6); font-size: 18px;">
            Nesta sessão, encontram a lista completa dos produtos
            que a padaria X faz para satisfazer a petite de seus carissímos clientes
        </p>
        </div>
        <div class="col s12">
            <table class="responsive-table highlight" style="background: rgba(0,0,0,0.6); border-radius: 10px;">
                <thead style="background: rgb(255, 102, 0);" class="white-text">
                    <th>ID</th>
                    <th>PRODUTO</th>
                    <th>IMAGEM</th>
                    <th>TIPO</th>
                    <th>SABOR</th>
                    <th>PREÇO</th>
                </thead>
                <tbody class="grey-text">
                    @forelse ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id_produtos }}</td>
                            <td>{{ $produto->nome_produto }}</td>
                            <td><img src="/foto_produtos/{{ $produto->foto_produto }}" class="responsive-img materialboxed" style="border-radius: 50%;" width="100px" height="50px" alt=""></td>
                            <td>{{ $produto->tipo_produto }}</td>
                            <td>{{ $produto->sabor }}</td>
                            <td>{{ $produto->preco }},00 KZ</td>
                        </tr>
                    @empty
                        <div class="container white-text" style="background: rgba(0,0,0,0.6);">
                            Pedimos desculpas pela indisponibilidade dos nossos produtos caro cliente!
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/') }}" class="orange-text"><i class="material-icons">home</i> Início</a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
        {{-- <li title="Consultar produtos">
            <a href="#" class="orange-text"><i class="material-icons">search</i> Consultar</a>
        </li> --}}
    </ul>
    
</body>
</html>