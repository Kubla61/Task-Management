<?php

use App\Http\Controllers\api\TaskController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tasks', [TaskController::class, 'index'])->name('getTasks');
Route::get('tasks/{id}', [TaskController::class, 'show'])->name('getSingleTasks');
Route::get('add/{status}', [TaskController::class, 'addForm'])->name('addForm');
Route::post('task', [TaskController::class, 'store'])->name('addTask');
Route::get('tasks/{id}/edit', [TaskController::class, 'updateForm'])->name('editTask');
Route::put('tasks/{id}/update', [TaskController::class, 'update'])->name('updateTask');
Route::delete('tasks/{id}', [TaskController::class, 'destroy'])->name('deleteTask');

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('user', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);