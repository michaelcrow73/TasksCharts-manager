<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ChartController;

// Redirect the root URL to the task list
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Resource routes for task operations (CRUD)
Route::resource('tasks', TaskController::class);

// Custom route to toggle task completion
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggleComplete'])->name('tasks.toggle');

// Route to show charts (data visualizations)
Route::get('/charts', [ChartController::class, 'index'])->name('charts.index');
