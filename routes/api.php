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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['web']], function () {
    Route::get('tasks', [TaskController::class, 'index'])->name('getTasks');
    Route::get('tasks/{id}', [TaskController::class, 'show'])->name('getSingleTasks');
    Route::get('addTask/{status}', [TaskController::class, 'addForm'])->name('addForm');
    Route::get('search', [TaskController::class, 'search'])->name('search');
    Route::post('searchResult', [TaskController::class, 'searchResult'])->name('searchResult');
    Route::post('task', [TaskController::class, 'store'])->name('addTask');
    Route::get('tasks/{id}/edit', [TaskController::class, 'updateForm'])->name('editTask');
    Route::put('tasks/{id}/update', [TaskController::class, 'update'])->name('updateTask');
    Route::delete('tasks/{id}', [TaskController::class, 'destroy'])->name('deleteTask');

    Route::get('users', [UserController::class, 'index'])->name('getUsers');
    Route::get('users/{id}', [UserController::class, 'show'])->name('getSingleUser');
    Route::get('addUser', [UserController::class, 'addForm'])->name('addUser');
    Route::post('user', [UserController::class, 'store'])->name('createUser');
    Route::get('users/{id}/edit', [UserController::class, 'editUser'])->name('editUser');
    Route::put('users/{id}', [UserController::class, 'update'])->name('updateUser');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('deleteUser');
});

