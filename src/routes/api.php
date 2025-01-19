<?php

use App\Http\Controllers\TodoController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/users', function () {
        return User::all();
    });

    Route::get('/todos', [TodoController::class, 'index']);
    Route::post('/todos', [TodoController::class, 'register']);
    Route::put('/todos/{id}', [TodoController::class, 'update']);
    Route::delete('/todos/{id}', [TodoController::class, 'delete']);
    Route::get('/todos/{id}', [TodoController::class, 'show']);
});
