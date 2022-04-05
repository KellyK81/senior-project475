<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockApiController;
use App\Http\Controllers\JobSearchController;
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


Route::get('/get_stock_quotes', [StockApiController::class, 'getStockQuotes'])->name('getStockQuotes');

Route::get('/get_job_data', [JobSearchController::class, 'getJobData'])->name('getJobData');

