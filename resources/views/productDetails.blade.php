<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>

    <!-- Styles -->
    <link href="{{ asset('css/productDetails.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/materialize.min.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>
   


</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper green accent-3">
                <a id="logo" class="brand-logo white-text center font-texts">Detalhes do Produto</a>

                <ul id="nav-mobile" class="left">
                    <li><a href="{{route('user')}}" class="font-texts hide-on-large-only"><i class="material-icons">chevron_left</i></a></li>
                    <li><a href="{{route('user')}}" class="font-texts hide-on-med-and-down" style="font-size: 1.6rem;">Perfil</a></li>
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
                                <a  id="btn-editar" href="{{route('product-edit',['id' => $product->id])}}" class="waves-effect waves-light light-blue darken-3 btn-large font-texts" style="margin-right: 12px;">Editar</a>
                                <a  id="btn-excluir" href="#modal1" id="{{$product->name}}" data-id="{{$product->id}}" data-image="{{$product->image}}" data-name="{{$product->name}}" data-price="{{$product->price}}" onclick="modal(this.getAttribute('id'))" class="waves-effect waves-light modal-trigger red darken-1 btn-large font-texts">Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4 id="msg"></h4>
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="row valign-wrapper">
                            <div class="col s2">
                                <img id="image-product" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                            </div>
                            <div class="col s10">
                                <span class="black-text">
                                    <h5 id="name-product"></h5>
                                    <h5 id="preco-product-modal"></h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a  href="{{route('delete')}}" id="btn-delete" onclick="event.preventDefault();
              document.getElementById('delete-form').submit();" class="waves-effect waves-green btn-small red darken-3">Excluir</a>
                <a class="modal-close waves-effect waves-green btn-small light-blue darken-3">Cancelar</a>
            </div>
        </div>


        <form id="delete-form" action="{{route('delete')}}" method="POST" style="display: none;">
          @csrf
          @method('DELETE')
          <input type="hidden" id="id-pd-form" name="id" value="">
       </form>
    </main>

    <br>
    <br>
    @include ('footer')



 

</body>

</html>