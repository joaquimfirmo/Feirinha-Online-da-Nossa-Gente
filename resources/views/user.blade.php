<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User</title>

  <!-- Scripts -->
  <script src="{{ asset('js/materialize.min.js') }}" defer></script>
  <script src="{{ asset('js/user.js') }}" defer></script>
  <script src="{{ asset('js/modal.js') }}" defer></script>
  <!-- Styles -->
  <link href="{{ asset('css/user.css') }}" rel="stylesheet">
  <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">


</head>

<body>
  <ul id="slide-out" class="sidenav sidenav-fixed sidenav-close">
    <li>
      <div class="col s12">
        <div id="card-user" class="card-panel green accent-3">
          <div class="row">
            <div class="col s4">
              <img id="img-user" src="{{ asset('img/avatar.png')}}" alt="" class="circle responsive-img">
              <!-- notice the "circle" class -->
            </div>
            <div class="col s8">
              <span class="white-text center">
                <h4 class="text-user-name "> {{Str::ucfirst(Auth::user()->name) }}</h4>
              </span>
            </div>
          </div>
        </div>
      </div>
    </li>

    <li><a href="{{route('product-create')}}">Cadastrar Produto <i class="material-icons right">shopping_cart</i> </a></li>
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Sair <i class="material-icons right">logout</i> </a></li>
  </ul>

  <!-- form para logout -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>

  <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i id="menu-icone" class="material-icons">menu</i></a>



  <main>
    <div id="container-user" class="container">
      <div id="row-main-user-name" class="row green accent-4">
        <div class="col s12 m10">
          <h2 class="header text-user-name">Seus Produtos</h2>
        </div>
      </div>

      <div class="row">
        @foreach ($products as $product)
        <div class="col s12 m6 l4 center-align">
          <div  id="{{$product->id}}"  class="card hoverable" style="cursor: pointer;">
            <div class="card-image">
              <img src="{{asset('storage/imageProducts/'.$product->image)}}">
              <a href="{{route('product-details', $product->id )}}" class="btn-floating halfway-fab waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Mais Informações"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <h4>{{ Str::limit(Str::ucfirst($product->name),14)}}</h4>
              <h4 id="preco">R$ {{$product->price}}</h4>
              <p><Strong>Descrição:</Strong> {{ Str::limit(Str::ucfirst($product->description),12)}}</p>
            </div>
            <div class="card-action  green accent-4">
              <a href="{{route('product-edit',['id' => $product->id])}}" class="waves-effect waves-light light-blue darken-3 btn-small text-user-name" style="margin-right: 12px;">Editar</a>
              <a href="#modal1"  id="{{$product->name}}" data-id="{{$product->id}}" data-image="{{$product->image}}" data-name="{{$product->name}}" data-price="{{$product->price}}" onclick="modal(this.getAttribute('id'))" class="waves-effect waves-light modal-trigger red darken-1 btn-small text-user-name">Excluir</a>
            </div>
          </div>
        </div>
        @endforeach
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
        <a href="{{route('delete')}}" onclick="event.preventDefault();
              document.getElementById('delete-form').submit();" class="waves-effect waves-green btn-small red darken-3 text-user-name">Excluir</a>     
          <a  class="modal-close waves-effect waves-green btn-small light-blue darken-3 text-user-name">Cancelar</a>
        </div>
      </div>

      <form id="delete-form" action="{{route('delete')}}" method="POST" style="display: none;">
          @csrf
          @method('DELETE')
          <input type="hidden" id="id-pd-form" name="id" value="">
       </form>

    </div>

    <br>
    <br>
    <br>


    @include ('footer')

  </main>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elemsToolp = document.querySelectorAll('.tooltipped');
      var instan = M.Tooltip.init(elemsToolp, {
        enterDelay: 200
      });
    });


  </script>

</body>

</html>