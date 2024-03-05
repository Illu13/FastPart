<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
