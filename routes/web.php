<?php

use App\Http\Controllers\BudgetController;
use Illuminate\Support\Facades\Route;

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

Route::delete('/budgets/{id}', [BudgetController::class, 'destroy'])->name('budgets.destroy');
Route::put('/budgets/{id}', [BudgetController::class, 'update'])->name('budgets.update');
Route::get('/budgets/{id}/edit', [BudgetController::class, 'edit'])->name('budgets.edit');
Route::get('/budgets/create', [BudgetController::class, 'create'])->name('budgets.create');
Route::get('/budgets/{id}', [BudgetController::class, 'show'])->name('budgets.show');
Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');
Route::get('/budgets/{startDate?}/{endDate?}/{filter?}', [BudgetController::class, 'index'])->name('budgets.index');


Route::get('/', function () {
    return view('welcome');
});