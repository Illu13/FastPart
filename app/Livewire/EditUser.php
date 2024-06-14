<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;

    public $user;
    public $id;
    public $name;
    public $surname;
    public $email;
    public $country;
    public $postal_code;
    public $phone;
    public $photo;
    public $birth_date;
    public $role;
    public $photoEdit;
    public $incorrecto;

    public function render()
    {
        $this->id = $this->user->id;
        $this->name = $this->user->name;
        $this->surname = $this->user->surname;
        $this->email = $this->user->email;
        $this->country = $this->user->country;
        $this->postal_code = $this->user->postal_code;
        $this->phone = $this->user->phone;
        $this->photo = $this->user->photo;
        $this->birth_date = $this->user->birth_date;
        $this->role = $this->user->role;
        return view('livewire.edit-user');
    }

    public function closeModal()
    {
        $this->dispatch('cerrar');
    }

    public function updateUser()
    {
        $this->photo = $this->photoEdit;
        $this->validate(['name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'lowercase', // Mover la regla lowercase antes de la regla email
                Rule::unique(User::class)->ignore($this->user->id),
            ],
            'country' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'numeric', 'digits:6'], // Cambiar 'integer' a 'numeric'
            'phone' => ['required', 'numeric', 'digits_between:7,9'], // Cambiar 'min_digits' y 'max_digits' a 'digits_between'
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'birth_date' => ['required', 'date'],
            'role' => ['required', 'string', 'max:255'],
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

        if ($this->photoEdit) {
            if ($this->user->photo != "storage/img/userPhotos/defaultUserImage.png") {
                File::delete($this->user->photo);
            }
            $ruta = $this->photo->store('public/img/userPhotos');
            $rutaPublica = str_replace('public', 'storage', $ruta);
            $this->user->photo = $rutaPublica;
        }
        $this->user->id = $this->id;
        $this->user->name = $this->name;
        $this->user->surname = $this->surname;
        $this->user->email = $this->email;
        $this->user->country = $this->country;
        $this->user->postal_code = $this->postal_code;
        $this->user->phone = $this->phone;
        $this->user->birth_date = $this->birth_date;
        $this->user->role = $this->role;
        try {
            $this->user->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $this->incorrecto = "Ha ocurrido un error, espere un momento y vuelva a intentarlo, si no funciona, proporcione este código al administrador: ".$e->getCode();
        }
        $this->dispatch('usuarioEditado');
    }


}
