<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
  Route::get('/alert_view_by_age', [App\Http\Controllers\AlertController::class, 'viewByAge'])->name('alert_view_by_age');
  Route::get('/alert_view_by_witel', [App\Http\Controllers\AlertController::class, 'viewByWitel'])->name('alert_view_by_age');
  Route::get('/alert_view_update', [App\Http\Controllers\AlertController::class, 'viewUpdate'])->name('alert_view_by_age');
});

Route::get('/', function () {
  return view('landing_page');
});