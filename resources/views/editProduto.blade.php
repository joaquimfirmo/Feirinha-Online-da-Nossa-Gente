<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>

    <!-- Styles -->
    <link href="{{ asset('css/registerProduct.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/materialize.min.js') }}" defer></script>
    <script src="{{ asset('js/moeda.js') }}" defer></script>

</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper green accent-3">
                <a id="logo-in-generateCoupon" class="brand-logo white-text center font-texts">Editar Produto</a>

                <ul id="nav-mobile" class="left">
                    <li><a href="{{route('user')}}" class="font-texts hide-on-large-only"><i class="material-icons">chevron_left</i></a></li>
                    <li><a href="{{route('user')}}" class="font-texts hide-on-med-and-down" style="font-size: 1.6rem;">Perfil</a></li>
                </ul>
            </div>
        </nav>
    </div>


    <main>
        <div class="row">
            <div id="container-gerar-cupom" class="container">
                <div class="row" style="padding-top: 12px;">
                    <h1 class="font-texts center">Produto</h1>
                </div>

                <div class="center">
                @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            <h6 style="color: red;">{{ $error }}</h6>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                </div>
                <form action="{{route('product-update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden"  id="user-id" name="user-id" value="{{$product->user_id}}" >

                    <div class="row" id="image-prod">
                            <div class="row valign-wrapper">
                                <div class="col s4 offset-s4"> 
                                    <img id="image-product" src="{{asset('storage/imageProducts/'.$product->image)}}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                    <span>
                                    <a href="#image-div" onclick="alterarImage()" > <h5 id="name-product" class="font-texts center black-text">Alterar imagem</h5></a>
                                    </span>
                                    
                                </div>
                            </div>

                       
                    </div>

                    <div class="row">
                        <div class="input-field col s9 offset-s2 ">
                            <i class="material-icons prefix">shopping_cart</i>
                            <input id="product" name="product" type="text" value="{{$product->name}}" class="validate" required>
                            <label for="product">Nome do produto</label>
                        </div>
                    </div>
                    

                    
                    <div class="row">
                        <div class="input-field col s9 offset-s2 ">
                            <i class="material-icons prefix">paid</i>
                            <input type="text" required maxlength="8" id="price" name="price" value="{{$product->price}}" onkeyup="formatarMoeda()">
                            <label for="price">Preço</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s9 offset-s2 ">
                            <i class="material-icons prefix"><span class="material-icons">
                                    description
                                </span></i>
                            <textarea id="description" name="description" class="materialize-textarea"> {{$product->description}}</textarea>
                            <label for="description">Descrição do produto</label>
                        </div>
                    </div>



                    <div id="image-div" class="row"  style="display: none;">
                        <div class="file-field input-field col s9 offset-s2">
                            <div class="btn light-green accent-4">
                                <span>Foto</span>
                                <input type="file" name="image_product" id="image_product">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="imagem do produto">
                                <span>
                                    <a href="#image-prod" class="black" onclick="manterImage()"><i class="material-icons prefix" style="color: black;">clear</i> </a>
                                
                                    </span>

                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding-bottom: 22px;">
                        <div class="input-field col s8 l8 offset-l4 offset-s2">
                            <br>
                            <button id="btn-enviar" class="btn waves-effect waves-light btn-large light-green accent-4" type="submit" name="action">Salvar
                                <i class="material-icons right">send</i>
                            </button>
                            <button id="btn-limpar" class="btn waves-effect waves-light btn-large  red darken-1" type="reset">Limpar
                                <i class="material-icons right">clear</i>
                            </button>
                        </div>
                    </div>


                </form>



            </div>
        </div>
    </main>

    <br>
    <br>
   
    @include ('footer')

    <script> 

        function alterarImage(){
            document.getElementById("image-div").style.display = "block";
        }

        
        function manterImage(){
            document.getElementById("image-div").style.display = "none";
        }
    
    </script>


</body>

</html>