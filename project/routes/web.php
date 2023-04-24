<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('dashboard', [\App\Http\Controllers\BookController::class, 'index'])->name('dashboard');

    Route::get('show-book/{id}', [\App\Http\Controllers\BookController::class, 'show'])->name('show-book');
    Route::get('add-book', [\App\Http\Controllers\BookController::class, 'create'])->name('add-book');
    Route::post('store-book', [\App\Http\Controllers\BookController::class, 'store'])->name('store-book');

    Route::get('edit-book/{id}', [\App\Http\Controllers\BookController::class, 'edit'])->name('edit-book');
    Route::put('update-book/{id}', [\App\Http\Controllers\BookController::class, 'update'])->name('update-book');
    Route::delete('delete-book/{id}', [\App\Http\Controllers\BookController::class, 'delete'])->name('delete-book');
    Route::get('comment-book/{id}', [\App\Http\Controllers\BookController::class, 'comment'])->name('comment-book');
    Route::put('update-comment-book/{id}', [\App\Http\Controllers\BookController::class, 'commentBook'])->name('update-comment-book');

    Route::resource('books_categories',\App\Http\Controllers\BooksCategoryController::class);
    Route::resource('workers',\App\Http\Controllers\WorkerController::class);
});



require __DIR__.'/auth.php';
