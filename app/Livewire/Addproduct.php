<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Addproduct extends Component
{
    use WithFileUploads;

    public $categories;
    public $name;
    public $price;
    public $category_id = 1;
    public $description;
    public $photo;
    public $brand;
    public $status;
    public $antiquity;
    public $kilometers;
    public $seller_id;
    public $sellers;
    public $car_from;
    public $correcto = 0;
    public $incorrecto = null;


    public function __construct()
    {
        $this->categories = Category::all();
        $this->sellers = User::where('role', 'seller')->get();
    }

    public function render()
    {
        return view('livewire.addproduct');
    }


    public function addgame()
    {

        $this->validate([
            'name' => 'required|unique:products',
            'seller_id' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric'],
            'description' =>['required','string','max:255'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'price' => ['required', 'numeric'],
            'antiquity' => 'required|numeric|min:1970|max:' . date('Y'),
            'brand' => ['required', 'string', 'max:50'],
            'status' => ['required', 'string', 'max:30'],
            'kilometers' => ['required', 'numeric'],
            'car_from' => ['required', 'string', 'max: 100']
        ],  [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.unique' => 'El nombre del juego debe ser único.',
            'seller_id.required' => 'El campo del vendedor es obligatorio.',
            'seller_id.numeric' => 'El campo ID del vendedor debe ser un número.',
            'category_id.required' => 'El campo de la categoría es obligatorio.',
            'category_id.numeric' => 'El campo ID de la categoría debe ser un número.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.string' => 'El campo descripción debe ser una cadena de texto.',
            'description.max' => 'El campo descripción no puede exceder los 255 caracteres.',
            'photo.required' => 'El campo foto es obligatorio.',
            'photo.image' => 'El archivo debe ser una imagen.',
            'photo.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg.',
            'photo.max' => 'La imagen no debe superar los 2048 kilobytes.',
            'price.required' => 'El campo precio es obligatorio.',
            'price.numeric' => 'El campo precio debe ser un número.',
            'antiquity.required' => 'El campo antigüedad es obligatorio.',
            'antiquity.numeric' => 'El campo antigüedad debe ser un número.',
            'antiquity.min' => 'El campo antigüedad no puede ser menor a 1970.',
            'antiquity.max' => 'El campo antigüedad no puede ser mayor al año actual.',
            'brand.required' => 'El campo marca es obligatorio.',
            'brand.string' => 'El campo marca debe ser una cadena de texto.',
            'brand.max' => 'El campo marca no puede exceder los 50 caracteres.',
            'status.required' => 'El campo estado es obligatorio.',
            'status.string' => 'El campo estado debe ser una cadena de texto.',
            'status.max' => 'El campo estado no puede exceder los 30 caracteres.',
            'kilometers.required' => 'El campo kilómetros es obligatorio.',
            'kilometers.numeric' => 'El campo kilómetros debe ser un número.',
            'car_from.required' => 'Tienes que poner el coche del que proviene',
            'car_from.string' => 'El campo tiene que ser texto',
            'car_from.max' => 'No pueden ser más de 100 caracteres'
        ]);

        $ruta = $this->photo->store('public/img/productPhotos');
        $rutaPublica = str_replace('public', 'storage', $ruta);

        try {
            Product::create([
                'name' => $this->name,
                'id_user' => $this->seller_id,
                'id_category' => $this->category_id,
                'description' => $this->description,
                'photo' => $rutaPublica,
                'price' => $this->price,
                'antiquity' => $this->antiquity,
                'brand' => $this->brand,
                'status' => $this->status,
                'kilometers' => $this->kilometers,
                'car_from' => $this->car_from,
            ]);
            $this->name = "";
            $this->correcto = 1;
            $this->dispatch('renderAgain');
            $this->dispatch('createdGame');
        } catch (\Illuminate\Database\QueryException $e) {
            $this->incorrecto = "Ha ocurrido un error, espere un momento y vuelva a intentarlo, si no funciona, proporcione este código al administrador: ".$e->getMessage();
        }


    }


}
