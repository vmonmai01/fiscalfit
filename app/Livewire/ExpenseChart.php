<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ExpenseChart extends Component
{
    public $chartData;

    public function mount()
    {
        $this->chartData = $this->fetchChartData();
        // dd($this->chartData);
    }
    
    public function render()
    {
        return view('livewire.expense-chart');
    }

    private function fetchChartData()
    {
         // Obtener el ID del usuario autenticado
        $userId = auth()->id();

        $data = Expense::select('expense_categories.type as category', DB::raw('SUM(expenses.amount) as total_amount'))
        ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
        ->where('expenses.user_id', $userId)
        ->whereYear('expenses.date', '=', now()->year)
        ->whereMonth('expenses.date', '=', now()->month)
        ->groupBy('expense_categories.type')
        ->get();

        $chartData = [];

        foreach ($data as $item) {
            $chartData[] = [
            'category' => $item->category,
            'total_amount' => $item->total_amount,
            ];
        }

        return $chartData;
    }
}
