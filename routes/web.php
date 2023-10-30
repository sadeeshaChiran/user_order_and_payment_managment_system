<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/inputCSVFile', [PaymentController::class, "addCSVfille"])->name('csvfile');

Route::get('/userdetails/{userid}', [PaymentController::class, 'index']);

Route::post('/userdetails/payment/{userid}/{orderid}', [PaymentController::class, "addPayment"])->name('user.payment');