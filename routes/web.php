<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::get('/', [ItemController::class, 'index'])->name('index');
});

Route::middleware('auth', 'admin')->group(function(){
    Route::get('/add-item', [ItemController::class, 'create'])->name('create');
    Route::post('/add-item', [ItemController::class, 'store'])->name('store');
    Route::get('/edit-item/{id}', [ItemController::class, 'edit'])->name('edit');
    Route::put('/edit-item/{id}', [ItemController::class, 'update'])->name('update');
    Route::get('/delete-item/{id}', [ItemController::class, 'delete'])->name('delete');
    Route::delete('/delete-item/{id}', [ItemController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';