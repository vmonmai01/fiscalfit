<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
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
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }
    // Funcion para obtener los gastos de un usuario por fechas, agrupados por tipo de gasto
    public function getExpensesByDateRange($userId, $startDate, $endDate)
    {
        $data = Expense::select('expense_categories.type as category', DB::raw('SUM(expenses.amount) as total_amount'))
            ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
            ->where('expenses.user_id', $userId)
            ->whereBetween('expenses.date', [$startDate, $endDate])
            ->groupBy('expense_categories.type')
            ->get();

        return response()->json($data);
    }

    public function getPercentageByCategory($userId, $startDate, $endDate)
    {
        $data = Expense::select('expense_categories.type as category', DB::raw('SUM(expenses.amount) as total_amount'))
            ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
            ->where('expenses.user_id', $userId)
            ->whereBetween('expenses.date', [$startDate, $endDate])
            ->groupBy('expense_categories.type')
            ->get();

        // Calcular el porcentaje para cada categoría
        $totalExpenses = $data->sum('total_amount');
        foreach ($data as $expense) {
            $expense->percentage = ($expense->total_amount / $totalExpenses) * 100;
        }

        return response()->json($data);
    }


    // La buena, hay que implementarla en el js ! 
    public function getExpensesByMonthRange($userId, $numberOfMonths)
    {
        // Calcular las fechas de inicio y fin basadas en el número de meses atrás
        $endDate = Carbon::now()->endOfMonth(); // Fin del mes actual
        $startDate = Carbon::now()->subMonths($numberOfMonths - 1)->startOfMonth(); // Inicio del mes más antiguo incluido

        $data = Expense::select('expense_categories.type as category', DB::raw('SUM(expenses.amount) as total_amount'))
            ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
            ->where('expenses.user_id', $userId)
            ->whereBetween('expenses.date', [$startDate, $endDate])
            ->groupBy('expense_categories.type')
            ->get();

        return response()->json($data);
    }


}
