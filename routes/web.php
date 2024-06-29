<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrationController;

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

// Route::get('/dashboard', function () {
//  return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', [AdministrationController::class, 'dashboard'])->name('dashboard');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('useraccess:viewallow')->group(function () {
Route::get('/sec/{sec}', [AdministrationController::class, 'index'])->name('SEC.index');
// Route::get('/SEC_0003', [AdministrationController::class, 'index'])->name('SEC_0003.index');
// Route::get('/SEC_0004', [AdministrationController::class, 'index'])->name('SEC_0004.index');
// Route::get('/SEC_0013', [AdministrationController::class, 'index'])->name('SEC_0013.index');
});

//Route::middleware('useraccess:editallow')->group(function () {
    Route::get('/sec/edit/{sec}/{id}', [AdministrationController::class, 'edit'])->name('SEC.edit');
    // Route::get('/SEC_0003', [AdministrationController::class, 'index'])->name('SEC_0003.index');
    // Route::get('/SEC_0004', [AdministrationController::class, 'index'])->name('SEC_0004.index');
    // Route::get('/SEC_0013', [AdministrationController::class, 'index'])->name('SEC_0013.index');
  //  });

    
require __DIR__.'/auth.php';

