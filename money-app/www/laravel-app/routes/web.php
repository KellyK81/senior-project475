<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobSearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name("home");

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::post('/search', [JobSearchController::class, 'index'])->middleware(['auth'])->name('jobsearch');

Route::get('/search', [JobSearchController::class, 'index'])->middleware(['auth'])->name('jobsearch');


Route::get('/page', function () {
    return view('layouts.page');
});

Route::get('/calculator', function () {
    return view('calculator.index');
})->name("calculator");

require __DIR__.'/auth.php';
