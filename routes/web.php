<?php

use App\Http\Controllers\TasksController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('tasks', TasksController::class);

Route::post('tasks/{task}/complete', [TasksController::class, 'complete'])
    ->middleware('auth')
    ->name('tasks.complete');

require __DIR__ . '/auth.php';
