<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController; // <--- ZID HADI
use App\Http\Controllers\ProductController;  // <--- ZID HADI
use App\Http\Controllers\ClientController; // <--- HADI HIA LI KHASSAK DAROURI
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
    
    // Les resources dyalk
    Route::resource('categories', CategoryController::class);
 Route::resource('products', ProductController::class);
Route::resource('clients', ClientController::class);});

require __DIR__.'/auth.php';