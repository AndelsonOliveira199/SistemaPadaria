<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão de Compras</title>
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
                    <li title="MENUS DE OPÇÕES"><a href="#" class="dropdown-button" data-beloworigin="true" data-activates="opcoes"><i class="material-icons left">menu</i> Menu de Opções<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12 m6 offset-l3" style="margin-top: 20px;">
            <div class="card-panel" style="background: rgb(255, 102, 0);">
                <h4 class="white-text">PRODUTOS DISPONÍVEIS A VENDA</h4>
                <p class="white-text">
                    Aqui se encontram disponíveis os nossos produtos feitos ao dia 
                    pelos nossos professionais e talentosos funcionários!
                    Para comprar um dos produtos disponíveis, basta clicares no botão laranja com 
                    o icóne branco, onde será aberto uma janela pela qual possue um formulário 
                    de compras onde o carissímo cliente irá preenche-los e depois se dirigir-se a
                    respectiva padaria para fazer o pagamento e receber a sua compra. Se gostou do 
                    nosso site, deixe seu comentário para nós, indo na página inicial. Agradecemos pela sua visita 
                    ao nosso site.
                </p>
            </div>
        </div>
    </div>

    <div class="row">
                <table class="responsive-table centered highlight" style="background: rgba(0,0,0,0.6);">
                    <thead style="background: rgb(255, 102, 0);" class="white-text">
                        <th>PRODUTO</th>
                        <th>TIPO</th>
                        <th>CUSTO</th>
                        <th>QUANTIDADE DISPONÍVEL</th>
                        <th>LOGOTIPO</th>
                        <th><i class="material-icons white-text">add_shopping_cart</i></th>
                    </thead>
                    @forelse ($result as $prod)
                    <tbody class="grey-text">
                        <tr>
                            <td>{{ $prod->produto_nome }}</td>
                            <td>{{ $prod->tipo_produto }}</td>
                            <td>{{ $prod->preco_prod }} KZ</td>
                            <td>{{ $prod->quantidade_feita }}</td>
                            <td><img src="/foto_produtos/{{ $prod->imagem_prod }}" style="border-radius: 50%;" class="responsive-img materialboxed" width="100px" height="50px" alt=""></td>
                            <td>
                                <a href="{{ route('form_compra_prod_clientes', ['id' =>$prod->id_registro]) }}" title="Comprar Este Produto" class="btn btn-floating green modal-trigger" title="Comprar">
                                    <i class="material-icons">add_shopping_cart</i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                    <p class="white-text center" style="background: rgba(0,0,0,0.6); font-size: 18px;">Produtos de Vendas Indispóniveis!</p>
                    @endforelse
                </table>
        
    </div>

    <ul id="opcoes" class="dropdown-content">
        <li title="Voltar ao Painel">
            <a href="{{ url('/') }}" class="orange-text"><i class="material-icons">home</i> Início</a>
        </li>
        <li title="Verificar minha conta">
            <a href="#form_contas" class="orange-text modal-trigger"><i class="material-icons">attach_money</i> Conta cliente</a>
        </li>
        <li title="Definições">
            <a href="#" class="orange-text"><i class="material-icons">settings</i> Definições</a>
        </li>
    </ul>

    <div class="row">
        <div class="col s12 m6">
            <div class="modal" id="comprar_produto" style="background: rgba(0,0,0,0.6);">
                <div class="modal-footer" style="background: rgb(255, 102, 0);">
                    <h5 class="white-text center"><i class="material-icons">add_shopping_cart</i> Formulário de Compras</h5>
                </div>
                <div class="modal-content">
                    <form action="{{ route('registro_compra_cliente') }}" method="post">
                        @csrf
                        <div class="input-field m6">
                            <input type="text" name="nome_cliente" class="white-text" required id="nome_cliente">
                            <label for="nome_cliente" class="white-text" style="font-size: 20px;">
                                <i class="material-icons">person</i> Qual é o seu nome próprio por favor?
                            </label>
                        </div>
                        <div class="input-field m6">
                            <select name="nome_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o produto que quer comprar</option>
                                @foreach ($item as $itens)
                                    <option value="{{ $itens->id_produtos }}">{{ $itens->nome_produto }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="preco_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o preço do produto</option>
                                @foreach ($item as $itens)
                                    <option value="{{ $itens->preco }}">{{ $itens->preco }} KZ</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-field m6">
                            <select name="tipo_produto" class="white-text" required>
                                <option value="" disabled selected>Selecione o tipo do produto que quer</option>
                                @foreach ($item as $itens)
                                    <option value="{{ $itens->tipo_produto }}">{{ $itens->tipo_produto }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-field m6">
                            <input type="number" name="quant_produto" class="white-text" required placeholder="Selecione a quantidade de produtos que quer comprar">
                        </div>
                        <div class="input-field m6">
                            <select name="valor_saco" class="white-text" required>
                                <option value="" disabled selected>Deseja adicionar um saco?</option>
                                <option value="10">Sim, desejo</option>
                                <option value="0">Não obrigado!</option>
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
    </div>

    <div class="col s12 m6">
        <div class="modal" id="form_contas" style="background: rgba(0,0,0,0.6);">
            <div class="modal-footer" style="background: rgb(255, 102, 0);">
                <h5 class="white-text center"><i class="material-icons">local_atm</i> Verificação de Contas</h5>
            </div>
            <div class="modal-content">
                <form action="{{ route('minhas_contas') }}" method="post">
                    @csrf
                    <div class="input-field m6">
                        <input type="text" name="cliente" id="cliente" class="white-text" required>
                        <label for="cliente" class="white-text" style="font-size: 20px;">
                            <i class="material-icons">person</i> Por favor, digite o nome pela qual fez a compra para consultar sua conta
                        </label>
                    </div>
                    <div class="input-field m6">
                        <input type="date" title="Por favor, indique a data pela qual fez a compra para consultar suas contas" name="data" id="data" class="white-text" required>
                    </div>
                    <div class="input-field m6">
                        <button type="submit" title="Consultar Contas" class="btn btn-floating waves-effect green">
                            <i class="material-icons">search</i>
                        </button>
                        <a href="#" title="Fechar Formulário" class="btn btn-floating red waves-effect modal-close">
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