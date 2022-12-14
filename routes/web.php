<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\PriorityController;
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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/tasks/search',[TaskController::class, 'search'])->name('tasks.search');
Route::get('/tasks/search/reset',[TaskController::class, 'reset'])->name('tasks.search.reset');
Route::post('/tasks/filter', [TaskController::class, 'filter'])->name('task.filter');


Route::resource('priorities', PriorityController::class);
Route::resource('tasks', TaskController::class);

