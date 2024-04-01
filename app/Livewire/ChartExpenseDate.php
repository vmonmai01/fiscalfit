<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;


class ChartExpenseDate extends Component
{

    public $chartData;
    public $startDate;
    public $endDate;

    public function mount()
    {
        // Inicializa las fechas con los valores del mes actual
        $this->startDate = now()->startOfMonth()->toDateString();
        $this->endDate = now()->endOfMonth()->toDateString();

        // Llama al método fetchChartData() usando las propiedades de la clase
        $this->chartData = $this->fetchChartData($this->startDate, $this->endDate);
    }

    public function render()
    {
        return view('livewire.chart-expense-date');
    }

    private function fetchChartData($startDate, $endDate)
{
    // Obtener el ID del usuario autenticado
    $userId = auth()->id();

    $data = Expense::select('expense_categories.type as category', DB::raw('SUM(expenses.amount) as total_amount'))
        ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
        ->where('expenses.user_id', $userId)
        ->whereBetween('expenses.date', [$startDate, $endDate]) // Filtrar por rango de fechas
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
