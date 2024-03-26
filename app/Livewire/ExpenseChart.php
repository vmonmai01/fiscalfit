<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseChart extends Component
{
    public $chartData;

    public function mount()
    {
        $this->chartData = $this->fetchChartData();
    }
    
    public function render()
    {
        return view('livewire.expense-chart');
    }

    private function fetchChartData()
    {
        return Expense::select('category_id', DB::raw('SUM(amount) as total_amount'))
            ->whereYear('date', '=', now()->year)
            ->whereMonth('date', '=', now()->month)
            ->groupBy('category_id')
            ->get();
    }
}
