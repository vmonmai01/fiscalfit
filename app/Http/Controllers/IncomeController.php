<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        //
    }

    public function getIncomesByDateRange(Request $request, $userId)
    {
        // Obtener el intervalo de tiempo desde la solicitud
        $intervaloTiempo = $request->input('intervaloTiempo');

        // Calcular la fecha de inicio y fin del intervalo de tiempo seleccionado
        $fechaInicio = Carbon::now()->subMonths($intervaloTiempo)->startOfMonth();
        $fechaFin = Carbon::now()->endOfMonth();

        // Consulta para obtener los ingresos por categoría dentro del intervalo de tiempo seleccionado
        $ingresosPorCategoria = Income::where('user_id', $userId)
            ->where('date', '>=', $fechaInicio)
            ->where('date', '<=', $fechaFin)
            ->groupBy('income_category_id')
            ->selectRaw('sum(amount) as total, income_category_id')
            ->get();

        // Devolver los datos de ingresos por categoría en formato JSON
        return response()->json($ingresosPorCategoria);
    }

    public function getIncomesByMonthRange($userId, $numberOfMonths)
    {
        // Calcular las fechas de inicio y fin basadas en el número de meses atrás
        $endDate = Carbon::now()->endOfMonth(); // Fin del mes actual
        $startDate = Carbon::now()->subMonths($numberOfMonths - 1)->startOfMonth(); // Inicio del mes más antiguo incluido

        $data = Income::select('income_categories.type as category', DB::raw('SUM(incomes.amount) as total_amount'))
            ->join('income_categories', 'incomes.income_category_id', '=', 'income_categories.id')
            ->where('incomes.user_id', $userId)
            ->whereBetween('incomes.date', [$startDate, $endDate])
            ->groupBy('income_categories.type')
            ->get();

        return response()->json($data);
    }
}
