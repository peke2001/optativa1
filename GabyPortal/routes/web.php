<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductosController;
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
});


Route::resource('productos', ProductosController::class)->names('productos');
Route:: controller(ProductosController::class)->prefix('productos')->group(function(){
 Route::get('','index')->name('productos.index');
 Route:: get('create','create')->name ('productos.create');
 Route::post('store', 'store')->name('productos.store');
 Route::get('edit/{id}', 'edit')->name('productos.edit');
 Route::put('edit/{id}', 'update')->name('productos.update');
 Route::delete('destroy/{id}', 'destroy')->name('productos.destroy');
});

require __DIR__.'/auth.php';
