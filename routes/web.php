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
  Route::get('/alert_view_by_witel', [App\Http\Controllers\AlertController::class, 'viewByWitel'])->name('alert_view_by_witel');
  Route::get('/alert_view_update', [App\Http\Controllers\AlertController::class, 'viewUpdate'])->name('alert_view_update');
  Route::get('/qos_by_sales', [App\Http\Controllers\QoSController::class, 'qosBySales'])->name('qos_by_sales');
  Route::get('/qos_by_witel', [App\Http\Controllers\QoSController::class, 'qosByWitel'])->name('qos_by_witel');
  Route::get('/leveraging', [App\Http\Controllers\ProfileController::class, 'profileLeveraging'])->name('leveraging');
  Route::get('/retention', [App\Http\Controllers\ProfileController::class, 'profileRetention'])->name('retention');
  Route::get('/list_kwadran', [App\Http\Controllers\ProfileController::class, 'profileListKwadran'])->name('list_kwadran');
  Route::get('/churn_to_sales', [App\Http\Controllers\ProfileController::class, 'profileChurn'])->name('churn_to_sales');
});

Route::get('/', function () {
  return view('landing_page');
});