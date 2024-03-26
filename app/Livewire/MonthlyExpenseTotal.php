<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class MonthlyExpenseTotal extends Component
{

    public $totalExpense;

    public function mount()
    {
        $this->totalExpense = Expense::where('user_id', Auth::id())
            ->whereMonth('date', now()->month)
            ->sum('amount');
    }
    public function render()
    {
        return view('livewire.monthly-expense-total');
    }
}
