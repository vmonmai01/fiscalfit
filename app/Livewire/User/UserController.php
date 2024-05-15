<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On;
use App\Models\User;

class UserController extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    public $sortField = 'name'; // Nombre del campo por el cual actualmente se están ordenando los resultados

    public $sortAsc = true; // Determina si el ordenamiento debe ser ascendente (true) o descendente (false).

    public function sortBy($field)
    {
        //Alterna la ordenación ascendente/descendente de un campo, reiniciando a ascendente al cambiar de campo.        
        $this->sortAsc = $this->sortField === $field ? !$this->sortAsc : true;
        $this->sortField = $field;
    }
    
    #[On('updatelist')]
    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('lastname', 'like', '%' . $this->search . '%')
            ->orWhere('birthdate', 'like', '%' . $this->search . '%')
            ->orWhere('rol', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(10);

        return view('livewire.user.user-controller', compact('users'));
    }
}