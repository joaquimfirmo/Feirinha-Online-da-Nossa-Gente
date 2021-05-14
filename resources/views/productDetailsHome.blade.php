<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do  Produto</title>

    <!-- Styles -->
    <link href="{{ asset('css/productDetails.css') }}" rel="stylesheet">
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
            <div class="nav-wrapper green accent-3">
                <a id="logo" class="brand-logo white-text center font-texts">Detalhes do Produto</a>

                <ul id="nav-mobile" class="left">
                    <li><a href="{{route('index')}}" class="font-texts"><i class="material-icons">chevron_left</i></a></li>
                 
                </ul>
            </div>
        </nav>
    </div>


    <main>
        <div class="row">
            <div class="container">
                <div class="col s12">
                    <div  id="{{$product->id}}" class="card horizontal">
                        <div class="card-image">
                            <img src="{{asset('storage/imageProducts/'.$product->image)}}">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h4>{{Str::ucfirst($product->name)}}</h4>
                                <h4 id="preco">R$ {{$product->price}}</h4>
                                <p><Strong>Descrição:</Strong> {{ Str::ucfirst($product->description)}}</p>
                            </div>
                            <div class="card-action">
                            <a   href="{{route('sucessful-purchase')}}" class="waves-effect waves-light light-blue darken-3  btn-large font-texts"><i class="material-icons right">shopping_cart</i>Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <br>
    <br>
    
    @include ('footer')



 

</body>

</html>