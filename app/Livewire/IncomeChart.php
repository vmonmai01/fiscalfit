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
    }
    public function render()
    {
        return view('livewire.income-chart');
    }
    private function fetchChartData()
    {
        return Income::select('category_id', DB::raw('SUM(amount) as total_amount'))
            ->groupBy('category_id')
            ->get();
    }
}
