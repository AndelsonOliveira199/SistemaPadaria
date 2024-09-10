<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicial</title>
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
        });
    </script>
</head>
<body>

    <div class="navbar-fixed">
        <nav class="cabecalho">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo">
                    <img title="Compra e Venda" src="/img/logotipo-do-design-de-paes.avif" width="80px" height="50px" class="responsive-img" alt="">
                </a>
                <ul class="right hide-on-med-and-down">
                    <li title="COMUNICADOS"><a href="{{ route('anuncio_comunicados') }}"><i class="material-icons left">description</i> COMUNICADO</a></li>
                    <li title="NOSSOS PRODUTOS"><a href="{{ route('nossos_produtos') }}"><i class="material-icons left">local_grocery_store</i> PRODUTOS</a></li>
                    <li title="COMPRAS DE PRODUTOS"><a href="{{ route('compras_produtos') }}" class="modal-trigger"><i class="material-icons left">add_shopping_cart</i> COMPRAS</a></li>
                    <li title="ACESSO RESERVADO PARA O GERENTE"><a href="{{ route('login_gerente') }}" class="btn orange modal-trigger"> GERENTE <i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="slider">
        <ul class="slides">
            <li>
                <img src="/img/padaria-sucesso-do-negocio.jpg"> <!-- random image -->
                    <div class="caption center-align">
                      <h3 class="z-depth-4" style="background: rgb(255, 102, 0);">O desejo do nosso coração</h3>
                        <h5 class="light white-text text-lighten-3 z-depth-4" style="background: rgb(255, 102, 0);">
                           É preciso estudar e se dedicar para chegar onde seu coração deseja
                        </h5>
                    </div>
            </li>
            <li>
                <img src="/img/PADARIA_DIVULGAÇÃO-2.jpg"> <!-- random image -->
                <div class="caption center-align">
                  <h3 class="z-depth-4" style="background: rgb(255, 102, 0);">O sucesso das nossas carreiras</h3>
                    <h5 class="light white-text text-lighten-3 z-depth-4" style="background: rgb(255, 102, 0);">
                        Sucesso é o acúmulo de pequenos esforços, repetidos dia a dia
                    </h5>
                </div>
            </li>
            <li>
                <img src="/img/2021-10-11-como-montar-uma-padaria.jpg"> <!-- random image -->
                <div class="caption center-align">
                  <h3 class="z-depth-4" style="background: rgb(255, 102, 0);">O sucesso das nossas carreiras</h3>
                    <h5 class="light white-text text-lighten-3 z-depth-4" style="background: rgb(255, 102, 0);">
                        Sucesso é o acúmulo de pequenos esforços, repetidos dia a dia
                    </h5>
                </div>
            </li>
        </ul>
    </div>

    <div class="row container">
        <h5 class="grey-text"><span style="color: rgb(255, 102, 0);"><i class="material-icons orange-text">photo_library</i> Galleria</span> de Fotos</h5>
        <section class="col s12 m6">
            
                <div class="card" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                    <div class="card-content">
                        <div id="gallery" class="section section-gallery scrollspy">
                            <div class="row">
                                <div class="col s12 m3">
                                    <img src="/img/PADARIAS.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/PADARIAS.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/padaria-ou-loja-de-pao.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/images.jpeg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m3">
                                    <img src="/img/PADARIAS.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/padaria-ou-loja-de-pao.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/PADARIAS.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/padaria-ou-loja-de-pao.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m3">
                                    <img src="/img/PADARIAS.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/PADARIAS.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/padaria-ou-loja-de-pao.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/images.jpeg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m3">
                                    <img src="/img/PADARIAS.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/padaria-ou-loja-de-pao.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/PADARIAS.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                                <div class="col s12 m3">
                                    <img src="/img/padaria-ou-loja-de-pao.jpg" class="materialboxed responsive-img" height="50px" alt="">
                                </div>
                            </div>
                    </div>
                    <div class="card-action" style="background: rgb(255, 102, 0); border-radius: 20px;">
                        <p class="white-text">
                            Nesta sessão, encontram-se as imagens da nossa padaria,
                            mostrando os nossos talentosos funcionários em ação total.
                        </p>
                    </div>
                </div>
            </div>
            {{-- <div class="row"> --}}
                
            {{-- </div> --}}
        </section>
        
        <div class="">
            <div class="col s12 m6">
                <div class="card" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                    <div class="card-image">
                        <img src="/img/padaria.webp" alt="">
                        {{-- <span class="card-title">Pães mais comprados</span> --}}
                        <h5 class="grey-text card-title" style="font-size: 30px; background: rgba(0,0,0,0.6);"><span style="color: rgb(255, 102, 0);"><i class="material-icons white-text">description</i> Sobre</span> <span class="white-text">Nós</span></h5>
                    </div>
                    <div class="card-content">
                        <p class="grey-text">
                            Sejam muito bem vindos a padaria Manuel Preciosa, aqui encontraram os deliciosos e melhores
                            pães da atualidade, vem comprar e provar o pão que deixa água na sua boca caríssimo cliente! 
                        </p>
                        <p class="grey-text">
                            E melhores
                            pães da atualidade, vem comprar e provar o pão que deixa água na sua boca caríssimo cliente! 
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#" class="btn btn-floating blue"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row container" style="margin-top: -10px;">
        <div class="col s12 m6 l6">
            {{-- <h5><i class="material-icons orange-text">location_city</i> <b class="orange-text">Localização</b> <span class="grey-text">e Outras Informações</span></h5> --}}
            <ul class="collection with-header">
                <li class="collection-header" style="background: rgb(255, 102, 0);"><h5 class="white-text"><i class="material-icons">location_city</i> Localização</h5></li>
                <li class="collection-item"><i class="material-icons orange-text">local_library</i> Padária dos Doces</li>
                <li class="collection-item"><i class="material-icons orange-text">date_range</i> 5 de Março de 2023</li>
                <li class="collection-item"><i class="material-icons orange-text">email</i> padariadosdoces@hotmail.com</li>
                <li class="collection-item"><i class="material-icons orange-text">location_city</i> Luanda, Viana-Calemba2</li>
                <li class="collection-item"><i class="material-icons orange-text">location_on</i> Rua da Paz</li>
            </ul>
        </div>
        <div class="col s12 m6 l6">
            {{-- <h5><i class="material-icons orange-text">https</i> <b class="orange-text">Reservada</b> <span class="grey-text">para Funcionários</span></h5> --}}
            <ul class="collection with-header" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                <li class="collection-header" style="background: rgb(255, 102, 0);"><h5 class="white-text center"><i class="material-icons">https</i> <br>LOGIN - FUNCIONÁRIOS</h5></li>
                <form action="{{ route('login_submit_func') }}" method="post">
                    @csrf
                    <li class="collection-item">
                        <div class="input-field m6">
                            <input type="text" style="background: rgb(255, 102, 0); border-radius:10px;" name="email_func" id="email_func" class="white-text">
                            <label for="email_func" style="font-size: 20px;" class="white-text">
                                <i class="material-icons white-text">mail</i> E-mail Pessoal
                            </label> 
                        </div>
                        <div class="input-field m6">
                            <input type="password" style="background: rgb(255, 102, 0); border-radius:10px;" name="bi_func" id="bi_func" class="white-text">
                            <label for="bi_func" style="font-size: 20px;" class="white-text">
                                <i class="material-icons white-text">https</i> Código Secreto
                            </label> 
                        </div>
                        <div class="input-field m6">
                            <button type="submit" title="Entrar" class="btn btn-floating green waves-effect">
                                <i class="material-icons">send</i>
                            </button>
                        </div>
                    </li>
                </form>
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

            </ul>
        </div>
    </div>

    <footer class="page-footer" style="background: rgb(255, 102, 0);">
        <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text"><b>17 Tipos de pães:</b></h5>
                <p class="grey-text text-lighten-4" style="font-size: 16px;">
                    Considerado um dos alimentos mais consumidos do mundo, o pão 
                    é sobretudo muito antigo. Existem vários tipos de pães, feitos 
                    para diversos paladares. Pão doce, salgado, com sementes e até 
                    com queijo são apenas alguns exemplos do alimento que mata a 
                    fome de muita gente.
                </p>
              </div>
                <div class="col l3 s12">
                    {{-- <h5 class="white-text">Menu</h5> --}}
                    <ul class="menu">
                        <li title="ACESSO RESERVADO PARA O GERENTE" style="margin-top: 12px;"><a href="{{ route('login_gerente') }}" style="border-radius: 10px;" class="btn orange white-text waves-effect"><i class="material-icons">group</i> GERENTE</a></li>
                        
                        <li title="PESQUISAR MINHAS COMPRAS" style="margin-top: 12px;"><a href="{{ route('compras_produtos') }}" style="border-radius: 10px;" class="btn orange white-text waves-effec"><i class="material-icons">search</i> Compra</a></li>
                        
                        <li title="NOSSOS PRODUTOS" style="margin-top: 12px;"><a href="{{ route('nossos_produtos') }}" style="border-radius: 10px;" class="btn orange white-text waves-effect"><i class="material-icons">local_grocery_store</i> Produto</a></li>
                        
                        <li title="ENCOMENDAS DE PRODUTOS" style="margin-top: 12px;"><a href="#" style="border-radius: 10px;" class="btn orange white-text waves-effect"><i class="material-icons">add_shopping_cart</i> Encomenda</a></li>
                        
                        <li title="COMUNICADOS"><a class="btn orange white-text waves-effect" style="margin-top: 12px; border-radius: 10px;" href="{{ route('anuncio_comunicados') }}"><i class="material-icons left">description</i> Comunicado</a></li>

                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Deixe seu feed</h5>
                    <ul>
                        <li class="collection-item">
                            
                        </li>
                        <li class="collection-item" style="margin-top: 12px;">
                            <a href="#" title="LIKE" class="btn btn-floating blue"><i class="material-icons">thumb_up</i></a>
                            <a href="#" title="DISLIKE" class="btn btn-floating blue"><i class="material-icons">thumb_down</i></a>
                            <a href="#comentarios" title="Deixe seu comentário clicando no botão" class="btn btn-floating orange waves-effect modal-trigger">
                                <i class="material-icons">message</i>
                                
                            </a> ({{ $total = 0 }})
                        </li>
                    </ul>
                </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container white" style="border-radius: 10px;">
            <span class="orange-text">© 2023 Copyright Todos os Direitos Reservados</span>
            <a class="white-text text-lighten-4 right padding-top: 10px;" href="#" title="Facebook">
                <img src="/img/redes/imagem05.png" class="responsive-image" width="50px" height="50px" alt="">
            </a>
            <a class="white-text text-lighten-4 right" href="#" title="Twitter">
                <img src="/img/redes/imagem03.png" class="responsive-image" width="50px" height="50px" alt="">
            </a>
            </div>
        </div>
    </footer>

    <div class="modal" id="comentarios">
        <div class="modal-footer" style="background: rgb(255, 102, 0);">
            <h5 class="white-text left">O que achou da sua visita ao nosso site?</h5>
        </div>
        <div class="modal-content">
            <form action="{{ route('comentario_cliente') }}" method="post">
                @csrf
                <div class="input-field m6">
                    <input type="email" name="email_cliente" id="email_cliente" required class="grey-text white">
                    <label for="email_cliente" class="orange-text" style="font-size: 20px;">
                        <i class="material-icons">email</i> Informe um email válido
                    </label>
                </div>
                <div class="input-field m6">
                    <textarea name="comentarios" style="border-radius:10px;" id="comentarios" class="materialize-textarea grey-text white modal-trigger" required></textarea>
                    <label for="comentarios" style="font-size: 20px;" class="orange-text">
                        <i class="material-icons">message</i> Deixe seu comentário</label>
                </div>
                <div class="input-field m6" style="margin-top: -10px;">
                    <button type="submit" title="Enviar comentário" class="btn btn-floating blue waves-effect">
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
            toastr.success("{{ Session::get('message') }}",{timeOut: 1000});
        </script>
    @endif
    
</body>
</html>