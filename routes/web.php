<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index']);
Route::get('/tasks', [TasksController::class, 'list']);
Route::get('/tasks/new', [TasksController::class, 'new']);
Route::get('/tasks/{id}', [TasksController::class, 'task']);



//Route::get('/tasks/new', function () {
//    return view('new');
//});
//
//Route::get('/tasks/{id}', function ($slug) {
//    return $slug;
//});

