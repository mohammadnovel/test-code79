<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MainController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('main');
Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('point', [MainController::class, 'point'])->name('point-list');

Route::post('report', [MainController::class, 'report'])->name('report');
Route::resource('account', AccountController::class);
Route::resource('transaction', TransactionController::class);
