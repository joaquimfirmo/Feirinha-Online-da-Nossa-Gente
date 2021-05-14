<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feirinha Online</title>

    <!-- Styles -->
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/materialize.min.js') }}" defer></script>


</head>

<body>
    <div class="navbar-fixed">
        <nav id="one" class=" green accent-4">
            <div class="nav-wrapper">
            <a href="#" data-target="mobile-menu" class="sidenav-trigger right">
          <i class="material-icons">menu</i>
        </a>
                <a id="logo" href="index.html" class="brand-logo font-texts">FEIRINHA-ONLINE</a>

                <ul id="nav-mobile" class="right hide-on-med-and-down font-texts">
                @if(Auth::check());  
                        <li><a href="{{ route('user')}}" class="menu-item">Perfil<i class="material-icons right">perm_identity</i></a></li>

                    @else
                    
                        <li><a href="{{ route('login') }}" class="menu-item">Login<i class="material-icons right">perm_identity</i></a></li>
                @endif

                </ul>
              
            </div>
        </nav>
    </div>

     <!--menu mobile-->
     <ul id="mobile-menu" class="sidenav sidenav-close">
        <li class="green accent-4 white-text "><a id="home-mobile-link-sidenav" class="white-text">Feirinha-Online<i class="material-icons right white-text" 
            >chevron_right</i> </a></li>

        <li><a href="{{ route('login') }}" class="sidenav-trigger" data-target="mobile-menu-logins" >Login </a></li>  
        <li><a href="{{ route('register') }}">Cadastre-se</a></li>

    <div class="divider"></div>
   
</ul>

   

    <div class="slider">
        <ul class="slides">
            <li>
                <img src="{{asset('img/frutas.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                    <h3 class="font-texts ">Aqui é da região!</h3>
                    <h5 class="light white-text  font-texts">Os Melhores produtos da cidade.</h5>
                </div>
            </li>
            <li>
                <img src="{{asset('img/padaria.jpg')}}"> <!-- random image -->
                <div class="caption left-align">
                    <h3 class="font-texts ">Preço baixo perto de você</h3>
                    <h5 class="light white-text font-texts">Super ofertas todo dia.</h5>
                </div>
            </li>
        </ul>
    </div>

    <main>
        <div class="row">

            <span class="center">
                <h2 class="font-texts">PRODUTOS EM DESTAQUE</h2>
            </span>

            <div class="container">
                @foreach ($products as $product)
                <div class="col s12 m6 l4 center-align">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="{{asset('storage/imageProducts/'.$product->image)}}">
                            <a id='infor' href="{{route('product-details-home', $product->id )}}" class="btn-floating halfway-fab waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Mais Informações"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content ">
                            <h4>{{ Str::limit(Str::ucfirst($product->name),14)}}</h4>
                            <h5 id="preco"> R$ {{$product->price}} </h5>
                        </div>
                        <div class="card-action green accent-4">
                            <a href="{{route('sucessful-purchase')}}" class="waves-effect waves-light   light-blue darken-3  btn-small font-texts"><i class="material-icons right">shopping_cart</i>Comprar</a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <br>
    <br>
    @include ('footer')



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let elems = document.querySelectorAll('.slider');
            let instances = M.Slider.init(elems, {
                indicators: false, //Set to false to hide slide indicators.
                height: 500, // default - height : 400
                interval: 4000 // default - interval: 6000
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            var elemsToolp = document.querySelectorAll('.tooltipped');
            var instan = M.Tooltip.init(elemsToolp, {
                enterDelay: 200
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems,  {
                             edge: "left",
                             inDuration: 350,
                             outDuration: 250 
                         });
             });
  

    </script>

</body>

</html>