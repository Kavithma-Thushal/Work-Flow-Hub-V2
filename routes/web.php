<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('employee')->group(function () {
    Route::get('/view', [EmployeeController::class, 'view'])->name('employee.view');
    Route::post('/store', [EmployeeController::class, 'store']);
    Route::patch('/update/{id}', [EmployeeController::class, 'update']);
    Route::delete('/delete/{id}', [EmployeeController::class, 'delete']);
    Route::get('/getById/{id}', [EmployeeController::class, 'getById']);
    Route::get('/getAll', [EmployeeController::class, 'getAll']);
});

require __DIR__ . '/auth.php';
