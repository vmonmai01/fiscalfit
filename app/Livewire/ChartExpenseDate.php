<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class ChartExpenseDate extends Component
{
    

    public function render()
    {
        return view('livewire.chart-expense-date');
    }

}
