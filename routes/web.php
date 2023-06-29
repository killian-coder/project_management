<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\TaskController;

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
// Route::post('/projects', [ProjectController::class, 'createProject'])
//      ->name('projects.store');

Route::get('/home/get/projects', [App\Http\Controllers\ProjectController::class, 'showProject'])->name('showProject');
Route::get('/home/create/projects', [App\Http\Controllers\ProjectController::class, 'createProject'])->name('createProject');
Route::get('/home/delete/{id}', [App\Http\Controllers\ProjectController::class, 'deleteProject'])->name('deleteProject');
Route::post('/home/storeProject', [App\Http\Controllers\ProjectController::class, 'storeProject'])->name('storeProject');
Route::get('/home/viewProjectItem/{id}', [App\Http\Controllers\ProjectController::class, 'viewProjectItem'])->name('viewProjectItem');

Route::resource('tasks', TaskController::class);




