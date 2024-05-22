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

    public $userDetails;
    public $showModalDetails = false;

    public $userDelete;
    public $showModalDelete = false;



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

    // Función para lanzar el modal de vista detalle usuario
    public function showUserDetail($userId)
    {
        // Cargar los detalles del usuario basados en el ID recibido
        $this->userDetails = User::find($userId);

        // Mostrar el modal
        $this->showModalDetails = true;
    }

    public function closeUserDetail()
    {
        // Ocultar el modal
        $this->showModalDetails = false;
    }

    // Función para lanzar el modal de Seguridad antes de borrar usuario
    public function showUserDelete($userId)
    {
        // Cargar los detalles del usuario basados en el ID recibido
        $this->userDelete = User::find($userId);
        // Mostrar el modal
        $this->showModalDelete = true;
    }

    public function closeUserDelete()
    {
        // Ocultar el modal
        $this->showModalDelete = false;
    }
    
    // Función para eliminar el usuario
    public function deleteUser($userId)
    {      
        // Ocultar el modal
        $this->showModalDelete = false;
        // Esperar 1 segundo antes de eliminar el usuario
        sleep(1);
        $user = User::findOrFail($userId);
        $user->delete();
        
        
    }
}
