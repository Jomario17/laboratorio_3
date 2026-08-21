<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicController;
use App\Http\Middleware\TraceRequest;
use App\Http\Middleware\RequireClientKey;
use App\Http\Middleware\MeasureResponseTime;

/*
|--------------------------------------------------------------------------
| EXPERIMENTOS 1, 2 Y 3
|--------------------------------------------------------------------------
*/

/*
Route::get('/academic/courses', [
    AcademicController::class,
    'courses'
])->middleware([
    TraceRequest::class,
    RequireClientKey::class,
    MeasureResponseTime::class,
]);
*/


/*
|--------------------------------------------------------------------------
| EXPERIMENTO 4 - CAMBIO DE ORDEN
|--------------------------------------------------------------------------
*/

Route::get('/academic/courses', [
    AcademicController::class,
    'courses'
])->middleware([
    MeasureResponseTime::class,
    TraceRequest::class,
    RequireClientKey::class,
]);