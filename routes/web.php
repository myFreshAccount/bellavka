<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskBookController;
use App\Consts\WebRoutes;

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

Route::get('login', [AuthController::class, 'showLoginPage'])->name(WebRoutes::SHOW_LOGIN_FORM);
Route::post('login', [AuthController::class, 'login'])->name(WebRoutes::LOGIN);
Route::post('logout', [AuthController::class, 'logout'])->name(WebRoutes::LOGOUT);


Route::get('/', [TaskBookController::class, 'showAllTaskBooks'])->name(WebRoutes::SHOW_ALL_TASKS);
Route::get('/tasks', [TaskBookController::class, 'getAllTaskBooks'])->name(WebRoutes::GET_ALL_TASKS);
Route::get('tasks/create', [TaskBookController::class, 'showCreateTaskBookForm'])->name(WebRoutes::SHOW_CREATE_TASK_FORM);
Route::post('tasks', [TaskBookController::class, 'createTaskBook'])->name(WebRoutes::CREATE_TASK);
Route::get('tasks/{id}', [TaskBookController::class, 'showUpdateTaskBookForm'])
    ->middleware('auth')
    ->name(WebRoutes::SHOW_UPDATE_TASK_FORM);

Route::patch('tasks/{id}', [TaskBookController::class, 'updateTaskBook'])
    ->middleware('auth')
    ->name(WebRoutes::UPDATE_TASK);


