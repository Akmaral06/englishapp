<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LessonController;

Route::apiResource('lessons', LessonController::class);