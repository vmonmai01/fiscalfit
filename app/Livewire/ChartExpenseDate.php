<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class ChartExpenseDate extends Component
{
    public $userId;
    public function mount()
    {
        // Obtener el ID del usuario autenticado
        $this->userId = Auth::id();
    }
    public function render()
    {
        
        return view('livewire.chart-expense-date');
    }

}
