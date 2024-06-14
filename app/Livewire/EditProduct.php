<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $product_id;
    public Product $product;
    public $categories;
    public $incorrecto;
    public $name;
    public $price;
    public $id_category = 1;
    public $description;
    public $photo;
    public $year;
    public $sellers;
    public $seller_id;
    public $brand;
    public $status;
    public $carFrom;
    public $antiquity;
    public $kilometers;

    public $photoEdit;

    public function render()
    {
        $this->product = Product::find($this->product_id);
        $this->categories = Category::all();
        $this->sellers = User::where('role', 'seller')->get();
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->id_category = $this->product->id_category;
        $this->description = $this->product->description;
        $this->photo = $this->product->photo;
        $this->antiquity = $this->product->antiquity;
        $this->brand = $this->product->brand;
        $this->status = $this->product->status;
        $this->seller_id = $this->product->id_user;
        $this->carFrom = $this->product->car_from;
        $this->kilometers = $this->product->kilometers;
        return view('livewire.edit-product');
    }

    public function editProduct()
    {


        $this->photo = $this->photoEdit;
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'seller_id' => ['required', 'numeric'],
            'id_category' => ['required', 'numeric'],
            'description' =>['required','string','max:255'],
            'photo' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'price' => ['required', 'numeric'],
            'antiquity' => 'required|numeric|min:1970|max:' . date('Y'),
            'brand' => ['required', 'string', 'max:50'],
            'status' => ['required', 'string', 'max:30'],
            'kilometers' => ['required', 'numeric'],
            'carFrom' => ['required', 'string', 'max: 100']
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

        if ($this->photo) {
            File::delete($this->product->photo);
            $ruta = $this->photo->store('public/img/productPhoto');
            $rutaPublica = str_replace('public', 'storage', $ruta);
            $this->product->photo = $rutaPublica;
        }

        $this->product->id = $this->product_id;
        $this->product->name = $this->name;
        $this->product->description = $this->description;
        $this->product->price  = $this->price ;
        $this->product->antiquity  = $this->antiquity ;
        $this->product->id_user = $this->seller_id;
        $this->product->car_from = $this->carFrom;
        $this->product->brand  = $this->brand;
        $this->product->status  = $this->status;
        $this->product->id_category = $this->id_category;
        $this->product->kilometers = $this->kilometers;


        try {
            $this->product->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $this->incorrecto = "Ha ocurrido un error, espere un momento y vuelva a intentarlo.";
        }
        $this->dispatch('changeongame');
    }

    public function closeModal()
    {
        $this->dispatch('closeModal');
    }
}
