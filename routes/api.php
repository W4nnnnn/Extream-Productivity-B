<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\KeyResultController;

Route::apiResource('cycles', CycleController::class);
Route::apiResource('tasks', TaskController::class);
Route::apiResource('objectives', ObjectiveController::class);
Route::apiResource('key-results', KeyResultController::class);
