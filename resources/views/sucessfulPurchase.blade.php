<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Realizada</title>

    <!-- Styles -->
    <link href="{{ asset('css/sucessfulPurchase.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/materialize.min.js') }}" defer></script>
    
</head>
<body>

    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper green accent-4">
                <a href="{{route('index')}}" id="logo-in-validadeCoupon" class="brand-logo white-text font-texts">Feirinha-Online</a>
                
                <a href="{{route('index')}}" data-target="mobile-navbar" class="sidenav-trigger left  font-texts"><i
                    class="material-icons">chevron_left</i></a>
                
            </div>
        </nav>
    </div>
   

    <main>
        <div class="row">
            <div id="container-validate" class="container">
                <div class="row">
                    <div class="col s12 l6">
                        <p id="imgAnalyzi" class="center">
                            <img src="{{ asset('img/undraw_approve_qwp7.svg')}}" width="100%" height="280">
                        </p>
    
                    </div>
                    <div class="col s12 l6">
                            <h3 class=" font-texts center">Compra Realizada com Sucesso</h3>
                            <div class="row">
                                <div class="input-field col s12 center">
                                    <a href="{{route('index')}}" id="btn-login-entrar"
                                        class="btn waves-effect waves-light btn-large light-green accent-4  font-texts"> Comprar +
                                        <i class="material-icons right">shopping_cart</i>
                                    </a>
                                </div>
                            </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </main>

    <br>
    <br>
    <br>

    @include ('footer')


    
</body>
</html>