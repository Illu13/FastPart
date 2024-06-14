<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\On;

class Rowuser extends Component
{

    public $user;
    public $showModal = false;

    #[On('columnaEditada')]
    public function render()
    {
        return view('livewire.rowuser');
    }

    public function delete($id)
    {
        if ($this->user->photo != "storage/img/userPhotos/defaultUserImage.png") {
            File::delete($this->user->photo);
        }
        $this->user->delete();
        $this->dispatch("borrado");
    }

    public function edit($id)
    {
        $this->dispatch("abrirModal", id: $id);
    }

    #[On('usuarioEditado')]
    public function usuarioEditado()
    {
        $this->dispatch('cerrar');
        $this->dispatch('columnaEditada');
    }
}
