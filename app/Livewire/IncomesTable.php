<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Income;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class IncomesTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $selectedIncomes = [];
    public $incomeSearch = '';
    public $sortField = 'id';
    public $sortAsc = true;


    public function sortBy($field)
    {
        //Alterna la ordenación ascendente/descendente de un campo, reiniciando a ascendente al cambiar de campo.        
        $this->sortAsc = $this->sortField === $field ? !$this->sortAsc : true;
        $this->sortField = $field;
    }

    // Mirar proyecto Arqueología y mejorar funcionalidad, además terminar este y el de Gastos!!  22/04/2024
    #[On('updatelist')]
    public function render()
    {
       $incomes = Income::where('user_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('description', 'like', '%'.$this->incomeSearch.'%')
                      ->orWhere('date', 'like', '%'.$this->incomeSearch.'%')
                      ->orWhereHas('category', function ($query) {
                        $query->where('type', 'like', '%'.$this->incomeSearch.'%'); 
                      });
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(8);

        return view('livewire.incomes-table', ['incomes' => $incomes]);
    }

    public function editIncome($incomeId)
    {
        // Redirigir a la página de edición de ingreso
        // Implementa esta lógica -> 
    }

    public function deleteIncome($incomeId)
    {
        // Borrar el ingreso especificado
        $income = Income::findOrFail($incomeId);
        $income->delete();
        session()->flash('message', 'Ingreso eliminado exitosamente.');
    }
    public function deleteSelected()
    {
        // Verificar si hay ingresos seleccionados para eliminar
        if (!empty($this->selectedIncomes)) {
            // Eliminar todos los ingresos seleccionados
            Income::whereIn('id', $this->selectedIncomes)->delete();
            $this->selectedIncomes = [];
            session()->flash('message', 'Ingresos seleccionados eliminados exitosamente.');
        }
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

}
