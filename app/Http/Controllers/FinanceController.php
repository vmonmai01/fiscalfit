<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    /*
        Este método primero calcula la fecha de inicio y la fecha de fin para el período de tiempo deseado 
        (un número determinado de meses anteriores al final del mes actual).
        Luego, realiza consultas separadas para obtener los gastos totales 
        y los ingresos totales agrupados por mes. Finalmente, 
        combina los resultados de ambas consultas en una sola colección 
        y devuelve la respuesta en formato JSON.
    */
    public function getExpensesAndIncomesByMonth($userId, $numMonths)
    {
        // Obtener la fecha de inicio (numMonths meses anteriores al final del mes actual)
        $startDate = now()->subMonths($numMonths - 1)->startOfMonth();

        // Obtener la fecha de fin (final del mes actual)
        $endDate = now()->endOfMonth();

        // Obtener los datos para cada mes en el rango de meses especificado
        $data = [];
        for ($i = $numMonths; $i > 0; $i--) {
            $monthStartDate = $startDate->copy()->addMonths($i - 1);
            $monthEndDate = $startDate->copy()->addMonths($i)->subDay();

            // Obtener ingresos totales para el mes
            $incomeTotal = Income::where('user_id', $userId)
                ->whereBetween('date', [$monthStartDate, $monthEndDate])
                ->sum('amount');

            // Obtener gastos totales para el mes
            $expenseTotal = Expense::where('user_id', $userId)
                ->whereBetween('date', [$monthStartDate, $monthEndDate])
                ->sum('amount');

            // Agregar los datos al arreglo
            $data[] = [
                'month' => $monthStartDate->format('F'),
                'income' => $incomeTotal,
                'expenses' => $expenseTotal
            ];
        }

        return response()->json($data);
    }
}
