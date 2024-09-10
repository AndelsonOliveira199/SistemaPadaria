<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão de Produtos</title>
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
                    <li title="MENUNS DE OPÇÕES"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcoes"><i class="material-icons left">menu</i> Menus de Opções<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="">
        {{-- <h5 class="center white-text" style="background: rgb(255, 102, 0);">GESTÃO DE PRODUTOS</h5> --}}
        <div class="col s12 m6">
            <table class="responsive-table highlight" style="background: rgba(0,0,0,0.6);">
                <thead style="background: rgb(255, 102, 0);" class="white-text">
                    <th>CÓDIGO</th>
                    <th>PRODUTO</th>
                    <th>LOGOTIPO</th>
                    <th>TIPO DO PRODUTO</th>
                    <th>SABOR</th>
                    <th>PREÇO</th>
                    <th>Gestão de Produtos</th>
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
                            <td>
                                <a href="{{ route('form_edit_prod', ['id_produto' =>$produto->id_produtos]) }}" title="Editar Dados do Produto" style="background: rgb(10, 202, 19);" class="btn btn-floating waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#eliminar_produto" title="Eliminar Dados do Produto" class="btn btn-floating red waves-effect modal-trigger">
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <p class="white-text center" style="background: rgba(0,0,0,0.6); font-size: 20px;">Lista de Produtos Vázia!!!</p>
                    @endforelse
                </tbody>
            </table>
            <p class="white-text center" style="background: rgb(255, 102, 0); font-size: 20px;">
               <i class="material-icons">local_grocery_store</i> Tabela de Produtos</p>
        </div>
    </div>

    {{-- ELIMINAR PRODUTOS --}}
    <div class="modal" id="eliminar_produto" style="background: rgba(0,0,0,0.6);">
        <form action="{{ route('eliminar_produto', ['id_produto' =>$produto->id_produtos]) }}" method="post">
            @csrf
            <div class="modal-content">
                <h5 class="white-text center">Tem Certesa que deseja Eliminar Este Produto?</h5>
            </div>
            <div class="modal-footer" style="background: rgb(255, 102, 0);">
                <button type="submit" title="Sim, tenho a certesa" class="btn btn-floating green waves-effect">
                    <i class="material-icons">check</i>
                </button>
                <a href="#" title="Não quero Eliminar" class="btn btn-floating red waves-effect modal-close">
                    <i class="material-icons">cancel</i>
                </a>
            </div>
        </form>
    </div>

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/admin') }}" class="orange-text"><i class="material-icons">home</i> Início</a>
        </li>
        <li title="Adicionar Produto">
            <a href="#registrar_produtos" class="orange-text modal-trigger"><i class="material-icons">add_shopping_cart</i> Adicionar</a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
    </ul>

    <div class="row">
        <div class="modal" id="registrar_produtos" style="background: rgba(0,0,0,0.6);">
            <div class="modal-footer" style="background: rgb(255, 102, 0);">
                <h5 class="white-text center">
                    <i class="material-icons">add_shopping_cart</i> Formulário de Registro de Produtos</h5>
            </div>
            <div class="modal-content">
                <form action="{{ route('registro_de_produtos') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-field m6">
                        <select name="nome_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o nome do produto</option>
                            <option value="Pão">PÃO</option>
                            <option value="Bolo">BOLO</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <input type="file" name="foto_produto" title="Foto do Produto" class="white-text" required>
                    </div>
                    <div class="input-field m6">
                        <select name="tipo_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o tipo deste produto</option>
                            <option value="Americano">AMERICANO</option>
                            <option value="Itáliano">ITÁLIANO</option>
                            <option value="Portugués">PORTUGUÉS</option>
                            <option value="Integral">INTEGRAL</option>
                            <option value="Francês">FRANCÊS</option>
                            <option value="Berlin">BERLIN</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <select name="sabor_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o sabor do produto</option>
                            <option value="Salgado">SALGADO</option>
                            <option value="Doce">DOCE</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <select name="preco_produto" class="white-text" required>
                            <option value="" disabled selected>Selecione o preço do produto</option>
                            <option value="100">100,00 KZ</option>
                            <option value="50">50,00 KZ</option>
                            <option value="25">25,00 KZ</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <select name="iva_produto" class="white-text">
                            <option value="" disabled selected>Selecione o preço com iva do produto</option>
                            <option value="0.14">0,14</option>
                        </select>
                    </div>
                    <div class="input-field m6">
                        <button type="submit" title="Registrar" class="btn btn-floating green waves-effect">
                            <i class="material-icons">send</i>
                        </button>
                        <a href="#" title="Fechar Janela" class="btn red btn-floating waves-effect modal-close">
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