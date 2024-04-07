<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Pruebachart2 extends Component
{
    public function render()
    {
        return view('livewire.pruebachart2');
    }
    public $chartData;
    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->setDefaultDates();
        $this->fetchChartData();
    }

    public function updatedStartDate($value)
    {
        $this->startDate = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
        $this->fetchChartData();
    }

    public function updatedEndDate($value)
    {
        $this->endDate = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
        $this->fetchChartData();
    }

    private function setDefaultDates()
    {
        $this->startDate = now()->subMonth()->format('Y-m-d');
        $this->endDate = now()->format('Y-m-d');
    }

    public function updateChartData()
    {
        $this->chartData = $this->fetchChartData();

        // Emitir evento JavaScript con los nuevos datos del gráfico
        $this->dispatch('chartDataUpdated', ['chartData' => $this->chartData]);
        //dd($this->chartData);
    }
    public function updated($field)
    {
        // Verificar si el campo actualizado es la fecha de inicio o fin
        if ($field === 'startDate' || $field === 'endDate') {
            // dd($this->startDate, $this->endDate);
            // Actualizar los datos del gráfico
            $this->updateChartData();
        }
    }
    private function fetchChartData()
    {
        // Obtener el ID del usuario autenticado
        $userId = auth()->id();

        $data = Expense::select('expense_categories.type as category', DB::raw('SUM(expenses.amount) as total_amount'))
            ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
            ->where('expenses.user_id', $userId)
            ->whereBetween('expenses.date', [$this->startDate, $this->endDate])
            ->groupBy('expense_categories.type')
            ->get();

        $chartData = [];

        foreach ($data as $item) {
            $chartData[] = [
                'category' => $item->category,
                'total_amount' => $item->total_amount,
            ];
        }

        //dd($chartData);
        return $chartData;
    }
}
