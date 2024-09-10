<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ACESSO RESERVADO DO GERENTE</title>
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
        .login{
            margin-top: 50px;
        }
        .login .card{
            border-radius: 20px;
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
        <div class="col s12 m6 l4 offset-l4 login">
            <div class="card" style="background: rgba(0,0,0,0.6);">
                <div class="card-action" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center"><i class="material-icons medio">https</i> <br> LOGIN - GERENTE</h5>
                </div>
                <div class="card-content">
                    <form action="{{ route('login_submit_admin') }}" method="post">
                        @csrf
                        <div class="input-field m6">
                            <input type="text" name="email_gerente" id="email_gerente" class="white-text">
                            <label for="email_gerente" class="white-text" style="font-size: 20px;">
                                <i class="material-icons">account_circle</i> E-mail Pessoal
                            </label>
                        </div>
                        <div class="input-field m6">
                            <input type="password" name="senha_gerente" id="senha_gerente" class="white-text">
                            <label for="senha_gerente" class="white-text" style="font-size: 20px;">
                                <i class="material-icons">https</i> Código Secreto
                            </label>
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="Entrar" class="btn btn-floating waves-effect" style="background: rgb(255, 102, 0);">
                                <i class="material-icons">send</i>
                            </button>
                            <a href="#codigo_acesso" title="Registrar-me" class="btn btn-floating blue waves-effect modal-trigger">
                                <i class="material-icons">border_color</i>
                            </a>
                        </div>
                    </form>
                </div>
                {{-- ERROS DE VALIDAÇÃO --}}
                @if($errors->any())
                <div class="white-text" style="background: rgba(228, 91, 67, 0.6); font-size: 16px;">
                    <ul>
                        @foreach ($errors->all() as $erros)
                            <li><b>{{ $erros }}</b></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- ERROS DE LOGIN --}}
            @if(isset($erro))
                <div class="white-text center" style="background: rgba(228, 91, 67, 0.6);">{{ $erro }}</div>
            @endif
            </div>
        </div>
    </div>

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/') }}" class="orange-text"><i class="material-icons">home</i> Início</a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
    </ul>

    <div class="modal" id="codigo_acesso" style="background: rgba(0,0,0,0.6);">
        <div class="modal-content">
            <form action="{{ route('verifica_codigo_acesso') }}" method="post">
                @csrf
                <div class="input-field m6">
                    <input type="number" name="codigo_acesso" id="codigo_acesso" required class="white-text">
                    <label for="codigo_acesso" class="white-text" style="font-size: 20px;">
                        <i class="material-icons">https</i> Por digite o código de acesso para se registrar
                    </label>
                </div>
                <div class="input-field m6">
                    <button type="submit" title="verificar" class="btn btn-floating green waves-effect">
                        <i class="material-icons">send</i>
                    </button>
                    <a href="#" title="Fechar Formulário" class="btn btn-floating red waves-effect modal-close">
                        <i class="material-icons">close</i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    
    @if(Session::has('message'))
        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton" : false,
            }
            toastr.success("{{ Session::get('message') }}",{timeOut: 1200});
        </script>
    @endif
    
</body>
</html>