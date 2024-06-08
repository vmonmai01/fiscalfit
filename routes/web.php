<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CryptoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/news', [NewsController::class, 'index'])->name('news.index');

    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notifications/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    // Ruta para expenses.blade.php
    Route::get('/expenses', function () {
        return view('expenses');
    })->name('expenses');

    // Ruta para incomes.blade.php
    Route::get('/incomes', function () {
        return view('incomes');
    })->name('incomes');

    Route::get('/cryptos', [CryptoController::class, 'getPrices'])->name('cryptos');
    
    Route::get('/policy', function () {
        return view('politica');
    })->name('policy');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
});

Route::middleware(['auth', 'verified','admin'])->group(function () { 
    Route::get('/users', function () {
        return view('user.user'); 
    })->name('users');
});


require __DIR__.'/auth.php';
