<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PADÁRIA ManuelPreciosa</title>
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/fonts/material-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('.carousel').carousel({
                indicators: true,
                fullWidth: true
            });
            $('.modal').modal();
            $('select').material_select();
            $('.button-collapse').sideNav();
        });
    </script>
</head>
<body>

    <nav class="orange">
        <div class="nav-wrapper container">
            <a href="#" title="Logotipo da Padária" class="brand-logo">Logo</a>
            <a href="#" title="Logotipo da Padária" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#"><i class="material-icons left">description</i> SOBRE</a></li>
                <li><a href="#"><i class="material-icons left">local_grocery_store</i> COMPRAS</a></li>
                <li><a href="#"><i class="material-icons left">phone</i> CONTACTOS</a></li>
            </ul>
            <ul id="mobile-demo" class="side-nav">
                <li><a href="#"><i class="material-icons left">description</i> SOBRE</a></li>
                <li><a href="#"><i class="material-icons left">local_grocery_store</i> COMPRAS</a></li>
                <li><a href="#"><i class="material-icons left">phone</i> CONTACTOS</a></li>
            </ul>
        </div>
    </nav>

    <div class="full-carousel">
        <div class="carousel">
            <a href="#" class="carousel-item"><img src="/img/2021-10-11-como-montar-uma-padaria.jpg" alt=""></a>
            <a href="#" class="carousel-item"><img src="/img/PADARIAS.jpg" alt=""></a>
            <a href="#" class="carousel-item"><img src="/img/padaria-sucesso-do-negocio.jpg" alt=""></a>
            <a href="#" class="carousel-item"><img src="/img/padaria-ou-loja-de-pao.jpg" alt=""></a>
            <a href="#" class="carousel-item"><img src="/img/PADARIA_DIVULGAÇÃO-2.jpg" alt=""></a>
        </div>
    </div>
    
    
</body>
</html>