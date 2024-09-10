<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COMUNICADOS</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/fonts/material-icons.css">
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.button-collapse').sideNav();
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

    <div class="">
        <nav class="cabecalho">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo"><img title="Compra e Venda" src="/img/logotipo-do-design-de-paes.avif" width="80px" height="50px" class="responsive-img" alt=""></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li title="OPÇÕES DE MENUS"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcoes"><i class="material-icons left">menu</i> OPÇÕES<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li title="OPÇÕES DE MENUS"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcao"><i class="material-icons left">menu</i> OPÇÕES<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    
    <div class="row">
        <div class="col s12 m6 l7 offset-l3">
            @forelse ($listar as $list)
                <div class="card" style="background: rgba(0,0,0,0.6);">
                    <div class="card-action" style="background: rgb(255, 102, 0);">
                        <h5 class="white-text center" style="text-transform: uppercase;">{{ $list->titulo }}</h5>
                    </div>
                    <div class="card-content">
                        <p class="white-text" style="font-size: 18px;">
                            {{ $list->conteudo }}
                        </p>
                        <p class="center" style="margin-top: 10px; font-size: 25px;">
                            <b class="white-text">O GERENTE: </b>
                            <br>
                            <p class="white-text center" style="text-transform: uppercase; font-size: 19px;">
                                {{ $list->gerente }} de {{ $list->sobrenome }}
                            </p>
                        </p>
                        <p class="white-text" style="font-size: 20px; margin-top: 20px;">
                            LUANDA, aos, {{ $list->data_comunicado }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="card-action" style="background: rgba(0,0,0,0.6)">
                    <p class="white-text center" style="font-size: 20px;">
                        Aguardando novos comunicados....
                        Por favor volte mais tarde
                        <div class="container progress orange">
                            <div class="indeterminate white" style="width: 70%;"></div>
                        </div>
                    </p>
                    
                </div>
            @endforelse
        </div>
    </div>

    

    <ul id="opcao" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/') }}" class="orange-text"><i class="material-icons">home</i> Início</a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
    </ul>
    
</body>
</html>