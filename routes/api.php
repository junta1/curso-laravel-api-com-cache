<?php

use App\Http\Controllers\Api\{
    CourseController,
    ModuleController
};
use Illuminate\Support\Facades\Route;

Route::apiResource('/courses/{course}/modules', ModuleController::class);

Route::get('/courses', [CourseController::class, 'index']);
Route::post('/courses', [CourseController::class, 'store']);
Route::get('/courses/{identify}', [CourseController::class, 'show']);
Route::delete('/courses/{identify}', [CourseController::class, 'destroy']);
Route::put('/courses/{course}', [CourseController::class, 'update']);

Route::get('/', function () {
    return response()->json(['message' => 'ok']);
});