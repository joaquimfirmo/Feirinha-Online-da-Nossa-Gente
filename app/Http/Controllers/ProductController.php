<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Product;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'productDetailsHome']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produtos =  Product::all();
        return view('index', ['products' => $produtos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registerProduct');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {

        $validated = $request->validated();

        $imgPath = ImageService::imageUpload($request);

        $price = str_replace(['R$', ','], [' ', '.'], $request->input('price'));

        if ($imgPath) {

            $user_id =  Auth::id();

            Product::create([
                'name' => $request->input('name-product'),
                'price' => $price,
                'description' => $request->input('description'),
                'image' => $imgPath['path'],
                'original_name_image' => $imgPath['originalName'],
                'user_id' => $user_id,

            ]);

            return view('registeredSucessfuly');
        }

        return "Erro ao salvar a imagem";
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto =  Product::find($id);
        return view('productDetails', ['product' => $produto]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto =  Product::find($id);
        return view('editProduto', ['product' => $produto]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {

        $validated = $request->validated();

        $produto =  Product::find($id);

        $img = array( 'path' => $produto->image, 'originalName' => $produto->original_name_image);

        if ($request->has('image_product') && $request->hasFile('image_product')) {

            $img = ImageService::updateImage($request, $produto->image);
        }

        $price = str_replace(',', '.', $request->input('price'));
        
        Product::where('id',  $produto->id)
            ->update(
                [
                    'name' => $request->input('product'),
                    'price' => $price,
                    'description' => $request->input('description'),
                    'image' => $img['path'],
                    'original_name_image' => $img['originalName'],
                ]
            );

        return redirect('/user');

        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $produto =  Product::find($request->input('id'));

        if ($produto->delete()) {

            Storage::delete('imageProducts/' . $produto->image);
            return  view('deletedProduct');
        }
    }


    /**
     * Mostra detalhes do produto presente na tela index.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function productDetailsHome($id)
    {

        $produto =  Product::find($id);
        return view('productDetailsHome', ['product' => $produto]);
    }
}
