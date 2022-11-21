<?php

use Fruitsbytes\Laravel\MonCash\Controllers\MonCashController;
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


Route::post('/mon-cash/pay', [MonCashController::class, 'pay'])->name('mon-cash.pay');
Route::get('/mon-cash/return', [MonCashController::class, 'return'])->name('mon-cash.return');
Route::get('/mon-cash/alert', [MonCashController::class, 'alert'])->name('mon-cash.alert');
Route::get('/mon-cash/success', function () {
    return view('error');
})->name('mon-cash.success');
Route::get('/mon-cash/error', function () {
    return view('success');
})->name('mon-cash.error');
