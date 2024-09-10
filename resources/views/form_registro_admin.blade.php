<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRAR-ME</title>
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
                    <h5 class="white-text center"><i class="material-icons large">person</i> <br> REGISTRAR-ME</h5>
                </div>
                <div class="card-content">
                    <form action="{{ route('registrar-me') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-field m6">
                            <input type="text" name="nome_gerente" id="nome_gerente" required class="white-text">
                            <label for="nome_gerente" class="white-text" style="font-size: 20px;">
                                <i class="material-icons">person</i> Nome
                            </label>
                        </div>
                        <div class="input-field m6">
                            <input type="text" name="sobrenome_gerente" id="sobrenome_gerente" required class="white-text">
                            <label for="sobrenome_gerente" class="white-text" style="font-size: 20px;">
                                <i class="material-icons">person</i> Sobrenome
                            </label>
                        </div>
                        <div class="input-field m6">
                            <span class="white-text" style="font-size: 20px;">Selecione uma foto:</span> <br>
                            <input type="file" name="foto_gerente" required class="white-text">
                        </div>
                        <div class="input-field m6">
                            <input type="text" name="bi_gerente" id="bi_gerente" required class="white-text">
                            <label for="bi_gerente" class="white-text" style="font-size: 20px;">
                                <i class="material-icons">account_circle</i> Nº do Bilhete de Identidade
                            </label>
                        </div>
                        <div class="input-field m6">
                            <input type="text" name="telefone_gerente" id="telefone_gerente" required class="white-text">
                            <label for="telefone_gerente" class="white-text" style="font-size: 20px;">
                                <i class="material-icons">phone</i> Nº de Telefone
                            </label>
                        </div>
                        <div class="input-field m6">
                            <input type="email" name="email_gerente" id="email_gerente" required class="white-text">
                            <label for="email_gerente" class="white-text" style="font-size: 20px;">
                                <i class="material-icons">email</i> E-mail
                            </label>
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="Registrar" class="btn btn-floating waves-effect" style="background: rgb(53, 228, 18);">
                                <i class="material-icons">send</i>
                            </button>
                            <a href="#codigo_acesso" title="Registrar-me" class="btn btn-floating blue waves-effect modal-trigger">
                                <i class="material-icons">border_color</i>
                            </a>
                        </div>
                    </form>
                </div>
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