<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::prefix('product')->group(function (){
        Route::get('',[ProductController::class,'index'])->name('product.product');

        Route::prefix('layout')->group(function (){
            Route::get('create',[ProductController::class,'create'])->name('product.create');
            Route::get('store',[ProductController::class,'store'])->name('product.store');
            Route::get('update',[ProductController::class,'update'])->name('product.update');
            Route::get('destroy',[ProductController::class,'destroy'])->name('product.destroy');
        });

    });



});

require __DIR__.'/auth.php';
