<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COMENTÁRIOS</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/fonts/material-icons.css">
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <style>
        /* body{
            background-image: url(/img/padaria-ou-loja-de-pao.jpg);
            background-size: cover;
        } */
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
        <div class="col s12 m6 l3 offset-l4" style="border-radius: 10px;">
            @forelse ($listar as $list)
                <div class="card" style="background: rgb(255, 102, 0);">
                    <div class="card-action" style="background: rgb(255, 102, 0);">
                        <div class="chip">
                            <img src="/img/gmail.png" alt="">
                                {{ $list->email_cliente }}
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="white-text">
                            {{ $list->comentarios }}
                        </p>
                    </div>
                    <div class="card-action white-text">
                        {{ $list->created_at }}
                        <a href="#" title="Eliminar Comentário" class="btn btn-floating red waves-effect right">
                            <i class="material-icons">delete</i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="card-action" style="background: rgba(0,0,0,0.6)">
                    <p class="white-text center">Não Foram Encontrado Nenhum Comentário!</p>
                </div>
            @endforelse
        </div>
    </div>

    

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/admin') }}" class="orange-text"><i class="material-icons">person</i> {{ session('email_gerente')['sobrenome'] }}</a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
    </ul>
    
</body>
</html>