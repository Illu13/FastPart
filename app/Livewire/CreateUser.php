<?php

namespace App\Livewire;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{

    use WithFileUploads;
    public $user;
    public $name;
    public $surname;
    public $email;
    public $country;
    public $postal_code;
    public $incorrecto;
    public $phone;
    public $photo;
    public $birth_date;
    public $role;
    public $photoEdit;
    public $password;
    public function render()
    {
        return view('livewire.create-user');
    }

    public function closeModal()
    {
        $this->dispatch('closeInsertModal');
    }

    public function create() {

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'lowercase', // Mover la regla lowercase antes de la regla email
            ],
            'password' => ['required','string','min:8'],
            'country' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'numeric', 'digits:6'], // Cambiar 'integer' a 'numeric'
            'phone' => ['required', 'numeric', 'digits_between:7,9'], // Cambiar 'min_digits' y 'max_digits' a 'digits_between'
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'birth_date' => ['required', 'date'],
            'role' => ['required','string','max:255'],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de caracteres.',
            'name.max' => 'El nombre no puede tener más de :max caracteres.',

            'surname.required' => 'El apellido es obligatorio.',
            'surname.string' => 'El apellido debe ser una cadena de caracteres.',
            'surname.max' => 'El apellido no puede tener más de :max caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de caracteres.',
            'email.email' => 'El del correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no puede tener más de :max caracteres.',
            'email.lowercase' => 'El electrónico debe estar en minúsculas.',
            'email.unique' => 'El electrónico ya ha sido registrado.',

            'country.required' => 'El país es obligatorio.',
            'country.string' => 'El país debe ser una cadena de caracteres.',
            'country.max' => 'El país no puede tener más de :max caracteres.',

            'postal_code.required' => 'El código postal es obligatorio.',
            'postal_code.numeric' => 'El código postal debe ser numérico.',
            'postal_code.digits' => 'El código postal debe tener :digits dígitos.',

            'phone.required' => 'El teléfono es obligatorio.',
            'phone.numeric' => 'El teléfono debe ser numérico.',
            'phone.digits_between' => 'El teléfono debe tener entre :min y :max dígitos.',

            'photo.image' => 'El archivo adjunto debe ser una imagen.',
            'photo.mimes' => 'El archivo adjunto debe ser de tipo: :values.',
            'photo.max' => 'El tamaño máximo del archivo adjunto es :max kilobytes.',
        ]);
        if ($this->photo) {
            $ruta = $this->photo->store('public/img/userPhotos');
            $rutaPublica = str_replace('public', 'storage', $ruta);
            $this->photo = $rutaPublica;
        } else {
            $this->photo = "storage/img/userPhotos/defaultUserImage.png";
        }


        try {
            User::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'country' => $this->country,
                'postal_code' => $this->postal_code,
                'phone' => $this->phone,
                'photo' => $this->photo,
                'birth_date' => $this->birth_date,
                'role' => $this->role,
                'password' => $this->password ??= Hash::make('password'),
            ]);
            $this->dispatch('usuarioEditado');

        } catch (\Illuminate\Database\QueryException $e) {
            $this->incorrecto = "Ha ocurrido un error, espere un momento y vuelva a intentarlo, si no funciona, proporcione este código al administrador: ".$e->getMessage();
        }


    }
}
