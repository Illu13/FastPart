<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $photo;
    public $name;
    public $brand;
    public $categories;
    public $carFrom;
    public $category_id = 1;
    public $status;
    public $antiquity;
    public $kilometers;
    public $price;
    public  $description;
    public $incorrecto = null;

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.create-product');
    }

    public function addProduct()
    {
        $this->validate([
            'name' => ['required', 'unique:products', 'max:50'],
            'brand' => ['required', 'string', 'max:50'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'status' => ['required', 'string','max:30'],
            'antiquity' => ['required', 'numeric', 'min:1970','max:'. date('Y')],
            'kilometers' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'string', 'max:500'],
            'photo' => ['required','image','max:1999',  'mimes:jpeg,png,jpg'],
            'carFrom' => ['required', 'string', 'max:80'],
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.unique' => 'El nombre ya está en uso',
            'name.max' => 'El nombre no puede tener más de 50 caracteres',
            'brand.max' => 'La marca no puede tener más de 50 caracteres',
            'category_id.numeric' => 'La categoría debe ser un valor numérico',
            'brand.required' => 'La marca es obligatoria',
            'category_id.required' => 'La categoría es obligatoria',
            'status.required' => 'El estado es obligatorio',
            'status.max' => 'El estado no puede tener más de 30 caracteres',
            'antiquity.numeric' => 'El año de debe ser numérico.',
            'antiquity.min' => 'El año de debe ser mayor o igual a 1970.',
            'antiquity.max' => 'El año de no puede ser mayor que el año actual.',
            'kilometers.numeric' => 'El número de kilómetros debe ser un valor numérico',
            'price.numeric' => 'El precio debe ser un valor numérico',
            'description.required' => 'La descripción es obligatoria',
            'description.max' => 'La descripción no puede tener más de 500 caracteres',
            'photo.mimes' => 'La foto debe ser de tipo jpeg, png o jpg',
            'antiquity.required' => 'La antigüedad es obligatoria',
            'kilometers.required' => 'El número de kilómetros es obligatorio',
            'price.required' => 'El precio es obligatorio',
            'photo.required' => 'La foto es obligatoria',
            'photo.image' => 'El archivo debe ser una imagen',
            'photo.max' => 'El tamaño máximo del archivo es 1999 KB',
            'carFrom.required' => 'El coche del que proviene es obligatorio',
            'carFrom.max' => 'El coche del que proviene no puede tener más de 80 caracteres',
        ]);
        $ruta = $this->photo->store('public/img/productPhotos');
        $rutaPublica = str_replace('public', 'storage', $ruta);

        try {
            $product = new Product();
            $product->name = $this->name;
            $product->id_user = auth()->user()->id;
            $product->brand = $this->brand;
            $product->id_category = $this->category_id;
            $product->status = $this->status;
            $product->antiquity = $this->antiquity;
            $product->kilometers = $this->kilometers;
            $product->price = $this->price;
            $product->photo = $rutaPublica;
            $product->description = $this->description;
            $product->car_from = $this->carFrom;
            $product->save();
            redirect('/dashboard')->with('correct', 'Producto agregado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            $this->incorrecto = "Ha ocurrido un error, espere un momento y vuelva a intentarlo, si no funciona, proporcione este mensaje al administrador: ".$e->getMessage();
        }
    }
}
