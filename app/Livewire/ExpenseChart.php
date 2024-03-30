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
        return Expense::select('expense_categories.type as category', DB::raw('SUM(expenses.amount) as total_amount'))
        ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
        ->whereYear('expenses.date', '=', now()->year)
        ->whereMonth('expenses.date', '=', now()->month)
        ->groupBy('expenses.expense_category_id')
        ->get();
    }
}
