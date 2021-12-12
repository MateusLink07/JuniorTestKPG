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
Route::get('/tasks', [TaskController::class, 'listTask'])->middleware(['auth'])->name('dashboard');
Route::get('/task', [TaskController::class, 'newTaskView'])->middleware(['auth'])->name('newTask');
Route::get('/task/{id}', [TaskController::class, 'updateTaskView'])->middleware(['auth'])->name('editTask');
Route::get('/task/{id}/update', [TaskController::class, 'updateTask'])->middleware(['auth'])->name('update');
Route::get('/task/{id}/change', [TaskController::class, 'changeTask'])->middleware(['auth'])->name('change');
Route::get('/task/{id}/delete', [TaskController::class, 'deleteTask'])->middleware(['auth'])->name('delete');

Route::get('/', function () {
    return redirect('login');
});

require __DIR__.'/auth.php';
