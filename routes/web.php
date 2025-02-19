<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\TaskController;

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


Route::resource('projects', ProjectController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tasks', TaskController::class);


Route::get('/', function () {
    return view('welcome');
});
