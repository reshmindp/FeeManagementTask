<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReportController;

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

Route::middleware(['auth'])->prefix('admin')->group(function () 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
    
    Route::resource('students', StudentController::class);
    Route::post('/students/{id}/status', [StudentController::class, 'toggleStatus']);

    Route::resource('courses', CourseController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('reports', ReportController::class);


});
Route::get('/reports/students', [ReportController::class, 'studentReport'])->name('reports.students');

Route::prefix('api')->group(function () {
    Route::get('/students', [StudentController::class, 'getStudents']);
    Route::get('/students/{id}/fees', [StudentController::class, 'getFeeDetails']);
    Route::post('/payments', [PaymentController::class, 'store']);
});