<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\TaskController;

Route::get('/task/new', [TaskController::class, 'newTask'])->middleware(['auth'])->name('new');
Route::get('/task', [TaskController::class, 'listTask'])->middleware(['auth'])->name('list');
Route::get('/task/{id}', [TaskController::class, 'updateTask'])->middleware(['auth'])->name('update');
Route::get('/task/{id}/delete', [TaskController::class, 'deleteTask'])->middleware(['auth'])->name('delete');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
