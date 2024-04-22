<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On;

class ExpensesTable extends Component
{
    use WithPagination;

    public $selectedExpenses = [];
    public $expenseSearch = '';
    public $sortField = 'id';
    public $sortAsc = true;

    public function sortBy($field)
    {
        // Alterna la ordenación ascendente/descendente de un campo, reiniciando a ascendente al cambiar de campo.        
        $this->sortAsc = $this->sortField === $field ? !$this->sortAsc : true;
        $this->sortField = $field;
    }

    public function render()
    {
        $expenses = Expense::where('user_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('description', 'like', '%'.$this->expenseSearch.'%')
                      ->orWhere('date', 'like', '%'.$this->expenseSearch.'%')
                      ->orWhereHas('category', function ($query) {
                        $query->where('type', 'like', '%'.$this->expenseSearch.'%');
                    });
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(8);

        return view('livewire.expenses-table', ['expenses' => $expenses]);
    }

    public function editExpense($expenseId)
    {
        // Implementa la lógica para editar un gasto
    }

    public function deleteExpense($expenseId)
    {
        // Borrar el gasto especificado
        $expense = Expense::findOrFail($expenseId);
        $expense->delete();
        session()->flash('message', 'Gasto eliminado exitosamente.');
    }

    public function deleteSelected()
    {
        // Verificar si hay gastos seleccionados para eliminar
        if (!empty($this->selectedExpenses)) {
            // Eliminar todos los gastos seleccionados
            Expense::whereIn('id', $this->selectedExpenses)->delete();
            $this->selectedExpenses = [];
            session()->flash('message', 'Gastos seleccionados eliminados exitosamente.');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
