<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => '/v1'], function () {

    Route::post('/orders/{order}/delay-reports', [DelayReportController::class, 'store']);

    Route::prefix('delay-reports')->group(function () {
        Route::post('assign', [DelayReportController::class, 'assign']);
        Route::get('current-week', [DelayReportController::class, 'getCurrentWeekDelayReports']);
    });
});
