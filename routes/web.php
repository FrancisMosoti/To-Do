<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/todo', [TodoController::class, 'view'])->name('todo');
Route::post('/todo', [TodoController::class, 'store'])->name('todo');
Route::delete('/delete/{id}', [TodoController::class, 'delete'])->name('delete');
Route::delete('/delete', [TodoController::class, 'destroy'])->name('delete.all');
