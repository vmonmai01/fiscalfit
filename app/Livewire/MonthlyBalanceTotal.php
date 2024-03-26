<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class MonthlyBalanceTotal extends Component
{
    public $totalIncome;
    public $totalExpense;
    public $balance;

    public function mount()
    {
        $this->totalIncome = Income::where('user_id', Auth::id())
            ->whereMonth('date', now()->month)
            ->sum('amount');

        $this->totalExpense = Expense::where('user_id', Auth::id())
            ->whereMonth('date', now()->month)
            ->sum('amount');

        $this->balance = $this->totalIncome - $this->totalExpense;
    }

    public function render()
    {
        return view('livewire.monthly-balance-total');
    }
}
