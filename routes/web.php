<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Models\category;
use Illuminate\Contracts\Cache\Store;
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

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('menus', [MenuController::class, 'index'])->name('menus.index');
    Route::get('menus/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('menus', [MenuController::class, 'store'])->name('menus.store');
    Route::get('menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::put('menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
    Route::get('delete/{id}', [MenuController::class, 'delete'])->name('menus.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::controller(CategoryController::class)->prefix('category')->group(function() {
    Route::get('', 'index')->name('category.index');
    Route::get('create', 'create')->name('category.create');
    Route::post('store', 'store')->name('category.store');
    Route::get('edit/{id}', 'edit')->name('category.edit');
    Route::get('delete/{id}', 'delete')->name('category.delete');
    Route::post('update', 'update')->name('category.update');
});

require __DIR__.'/auth.php';
