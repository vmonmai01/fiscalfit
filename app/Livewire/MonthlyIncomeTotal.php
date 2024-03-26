<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;

class MonthlyIncomeTotal extends Component
{
    public $totalIncome;

    public function mount()
    {
        $this->totalIncome = Income::where('user_id', Auth::id())
                                    ->whereMonth('date', now()->month)
                                    ->sum('amount');
    }
    public function render()
    {
        return view('livewire.monthly-income-total');
    }
}
