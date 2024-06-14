<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->only(['index']);
        $this->middleware(['auth', 'seller'])->only(['store', 'create', 'update', 'mygames', 'edit', 'destroy']);
    }

    public function index()
    {
        return view('product.index');
    }

    public function myproducts()
    {
        $products = Product::where('id_user', Auth::user()->id)->get();
        return view('product.myproducts')->with('products', $products);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show')->with('product', $product);

    }

    public function cart()
    {
        return view('product.cart');
    }

    public function addToCart(Request $request)
    {
        if (!session()->has('cart')) {
            session()->put('cart', new Collection());
        }
        $id = $request->input('item');
        $item = Product::find($id);
        $cart = session()->get('cart');
        $cart->push($item);
        session()->put('cart', $cart);

// Redirecciona con un mensaje de éxito
        return redirect('cart');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        if ($request->has('photoEdit')) {
            $imagen = $request->file('photoEdit');
            $ruta = $imagen->store('public/img/gamePhotos');
            $rutaPublica = str_replace('public', 'storage', $ruta);
            File::delete($product->photo);

        }
        if (isset($rutaPublica)) {
            $product->photo = $rutaPublica;
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->car_from = $request->carFrom;
        $product->status = $request->status;
        $product->id_category = $request->category_id;
        $product->antiquity = $request->antiquity;
        $product->kilometers = $request->kilometers;
        $product->description = $request->description;
        $product->update();
        try {
            $products = Product::where('id_user', Auth::user()->id)->get();
            return view('product.myproducts')->with('products', $products);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('dashboard')->with([
                'message' => 'Ha habido un error, contacte con el administrador y mándele el siguiente código: ' . $e->errorInfo[1],
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['id_user'] = Auth::user()->id;
        $validator = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg',
            'id_user' => 'integer',
            'id_category' => 'integer',
            'name' => 'required|string|max:100',
            'brand' => 'required|string|max:200',
            'status' => 'required|string|max:60',
            'antiquity' => 'required|string|max:45',
            'kilometers' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string|max:500',
        ]);
        $rutaPublica = null;
        $imagen = $request->file('photo');
        $ruta = $imagen->store('public/img/productPhotos');
        $rutaPublica = str_replace('public', 'storage', $ruta);
        $requestData['photo'] = $rutaPublica;
        Product::create($requestData);
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            File::delete($product->photo);
            return redirect()->route('dashboard')->with([
                'correct' => 'El juego se ha eliminado correctamente',
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('dashboard')->with([
                'message' => 'Ha habido un error, contacte con el administrador y mándele el siguiente código: ' . $e->errorInfo[1],
            ]);
        }
    }

    public function adminGames()
    {
        return view('product.admin_index')->with('games', Product::all());

    }
}
