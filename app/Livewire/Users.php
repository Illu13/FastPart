<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $nombre;
    public $buscar;
    public $campoOrden = "id";
    public $orden = "asc";
    public $showModal = false;
    public $showInsertModal = false;
    public $userToEdit;

    #[On('borrado')]
    public function render()
    {
        return view('livewire.users', ['users' => User::where('name', 'like', '%' . $this->buscar . '%')
            ->orderBy($this->campoOrden, $this->orden)
            ->paginate(5)]);

    }

    public function orderBy($col)
    {
        if ($this->campoOrden == $col) {
            if ($this->orden == "asc") {
                $this->orden = "desc";
            } else {
                $this->orden = "asc";
            }
        } else {
            $this->campoOrden = $col;
            $this->orden = "asc";
        }
    }


    #[On('abrirModal')]
    public function openModal($id)
    {
        $this->userToEdit = User::find($id);
        $this->showModal = !$this->showModal;
    }

    #[On('cerrar')]
    public function closeModal()
    {
        $this->showModal = !$this->showModal;
    }

    #[On('closeInsertModal')]
    public function closeInsertModal() {
        $this->showInsertModal = !$this->showInsertModal;
    }
    #[On('showInsertModal')]
    public function openInsertModal()
    {
        $this->showInsertModal = true;
    }
}
