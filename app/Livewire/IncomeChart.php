<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Income;
use Illuminate\Support\Facades\DB;

class IncomeChart extends Component
{
    public $chartData;

    public function mount()
    {
        $this->chartData = $this->fetchChartData();
        //dd ($this->chartData);
        
    }
    public function emit()
    {
        $this->chartData;
    }
    public function render()
    {
        return view('livewire.income-chart');
    }

    private function fetchChartData()
    {
        // Obtener el ID del usuario autenticado
        $userId = auth()->id();

        // Obtener los datos de ingresos por categoría para el usuario logeado
        $data = Income::select('income_categories.type as category', DB::raw('SUM(incomes.amount) as total_amount'))
            ->join('income_categories', 'incomes.income_category_id', '=', 'income_categories.id')
            ->where('incomes.user_id', $userId)
            ->groupBy('income_categories.type')
            ->get();

        // Convertir los datos a un array asociativo para su uso en JavaScript
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
