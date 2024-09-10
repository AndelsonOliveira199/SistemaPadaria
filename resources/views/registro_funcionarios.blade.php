<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funcionários</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/fonts/material-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('.slider').slider({
                indicators: true
            });
            $('.modal').modal();
            $('select').material_select();
            $('.button-collapse').sideNav();
        });
    </script>
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
        .balanco{
            margin-top: 50px;
        }
        body{
            background-image: url(/img/padaria-sucesso-do-negocio.jpg);
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
                    <li title="{{ session('email_gerente')['nome'] }}"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcoes"><i class="material-icons left">account_circle</i> {{ session('email_gerente')['nome'] }}<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="row">
        <h5 class="center white-text" style="background: rgb(255, 102, 0);"><i class="material-icons">content_paste</i> LISTA DE FUNCIONÁRIOS</h5>
        <div class="col s12">
            <table class="responsive-table centered highlight" style="background: rgba(0,0,0,0.6);">
                <thead style="background: rgb(255, 102, 0);" class="white-text">
                    <th>ID</th>
                    <th>NOME</th>
                    <th>FOTO</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>Nº BI</th>
                    <th>DATA DE NASCIMENTO</th>
                    <th>IDADE</th>
                    <th>FUNÇÃO</th>
                    <th>GESTÃO</th>
                </thead>
                <tbody class="grey-text">
                    @forelse ($lista as $listar)
                    <tr>
                        <td>{{ $listar->id_funcionarios }}</td>
                        <td>{{ $listar->nome }}</td>
                        <td><img src="/foto_funcionario/{{ $listar->foto }}" width="65px" height="50px" class="reponsive-img" alt=""></td>
                        <td>{{ $listar->email }}</td>
                        <td>{{ $listar->telefone }}</td>
                        <td>{{ $listar->bi }}</td>
                        <td>{{ $listar->data_nasc }}</td>
                        <td>{{ $listar->idade }}</td>
                        <td>{{ $listar->funcao }}</td>
                        <td>
                            <a href="{{ route('editar_dados_func', ['id_func' =>$listar->id_funcionarios]) }}" title="Editar Dados" class="btn btn-floating green waves-effect">
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="#eliminar_dados" title="Eliminar Dados" class="btn btn-floating red waves-effect modal-trigger">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                    @empty
                        <p style="background: rgb(255, 102, 0);" class="white-text center">Nenhum Registro Foi Encontrado!</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="eliminar_dados" style="background: rgba(0,0,0,0.6);">
        <form action="{{ route('eliminar_dados_funcionario', ['id_funcionarios' =>$listar->id_funcionarios]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <h5 class="white-text center">Tem certeza que deseja eliminar os dados deste funcionário?</h5>
            </div>
            <div class="modal-footer" style="background: rgb(255, 102, 0);">
                <button type="submit" title="Sim, tenho a certeza" class="btn btn-floating green waves-effect">
                    <i class="material-icons">check</i>
                </button>
                <a href="#" title="Não quero eliminar" class="btn btn-floating red waves-effect modal-close">
                    <i class="material-icons">cancel</i>
                </a>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="modal" id="registrar_funcionarios" style="background: rgba(0,0,0,0.6);">
            <div class="modal-footer" style="background: rgb(255, 102, 0);">
                <h5 class="white-text center">Formulário de Registro de Funcionários</h5>
            </div>
            <div class="modal-content">
                <form action="{{ route('registro_funcionario') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-field m6">
                        <input type="text" name="nome" class="white-text" required id="nome">
                        <label for="nome" style="font-size: 20px;" class="white-text">
                            <i class="material-icons">person</i> Nome Completo do(a) Funcionário(a)
                        </label>
                    </div>
                    <div class="input-field m6">
                        <input type="file" name="foto" title="Foto do funcionário" class="white-text" id="foto">
                    </div>
                    <div class="input-field m6">
                        <input type="email" name="email" class="white-text" required id="email">
                        <label for="email" style="font-size: 20px;" class="white-text">
                            <i class="material-icons">email</i> E-mail do(a) Funcionário(a)
                        </label>
                    </div>
                    <div class="input-field m6">
                        <input type="tel" name="telefone" class="white-text" required id="telefone">
                        <label for="telefone" style="font-size: 20px;" class="white-text">
                            <i class="material-icons">phone</i> Telefone do(a) Funcionário(a)
                        </label>
                    </div>
                    <div class="input-field m6">
                        <input type="text" name="bi" class="white-text" required id="bi">
                        <label for="bi" style="font-size: 20px;" class="white-text">
                            <i class="material-icons">assignment_ind</i> Nº do BI do(a) Funcionário(a)
                        </label>
                    </div>
                    <div class="input-field m6">
                        <input type="date" name="data_nasc" title="Data de Nascimento do funcionário" class="white-text" required id="data_nasc">
                    </div>
                    <div class="input-field m6">
                        <input type="number" name="idade" class="white-text" required id="idade">
                        <label for="idade" style="font-size: 20px;" class="white-text">
                            <i class="material-icons">person</i> Idade do(a) Funcionário(a)
                        </label>
                    </div>
                    <div class="input-field m6">
                        <select name="funcao" class="white-text" required>
                            <option value="" disabled selected>Selecione a função do(a) funcionário(a)</option>
                            <option value="Gerente">Gerente</option>
                            <option value="Padeiro">Padeiro</option>
                            <option value="Baoconista">Baoconista</option>
                            <option value="Diretor Finánceiro">Diretor Finánceiro</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <button type="submit" title="Registrar" class="btn btn-floating green waves-effect">
                            <i class="material-icons">save</i>
                        </button>
                        <a href="#" title="Fechar Formulário" class="btn btn-floating red waves-effect modal-close">
                            <i class="material-icons">close</i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/admin') }}" class="orange-text"><i class="material-icons">home</i> Início</a>
        </li>
        <li title="Registrar Funcionário">
            <a href="#registrar_funcionarios" class="orange-text modal-trigger waves-effect">
                <i class="material-icons">add</i> Registrar
            </a>
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