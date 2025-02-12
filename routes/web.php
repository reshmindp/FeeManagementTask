<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

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

Route::post('/login', [AuthController::class, 'login'])->name('loginSubmit');

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'adminLogin'])->name('login');
    
    Route::post('/login', [AuthController::class, 'login'])->name('loginSubmit');
});
