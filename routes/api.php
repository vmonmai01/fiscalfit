<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\FinanceController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/expenses/{userId}/{startDate}/{endDate}', [ExpenseController::class, 'getExpensesByDateRange'])->name('getExpensesByDateRange');
Route::get('/incomes/{userId}/{numberOfMonths}', [IncomeController::class, 'getIncomesByMonthRange']);

Route::get('expenses/percentage-by-category/{userId}/{startDate}/{endDate}', [ExpenseController::class, 'getPercentageByCategory']);

Route::get('finance/{userId}/{numMonths}/expenses-incomes', [FinanceController::class, 'getExpensesAndIncomesByMonth']);