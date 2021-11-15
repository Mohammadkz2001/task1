<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

Route::prefix('book')->group(function () {
    Route::get('/', [\App\Http\Controllers\BooksController::class, 'list'])->name('books.list');
    Route::get('/add', [\App\Http\Controllers\BooksController::class, 'addForm'])->name('book.add.form');
    Route::post('/add', [\App\Http\Controllers\BooksController::class, 'store'])->name('book.store');
    Route::get('/reserve/[i:id]', [\App\Http\Controllers\BooksController::class, 'reserve'])->name('book.reserve');
    Route::get('/unreserve/[i:id]', [\App\Http\Controllers\BooksController::class, 'unreserve'])->name('book.unreserve');
    Route::delete('/delete/{id}', [\App\Http\Controllers\BooksController::class, 'destroy'])->name('book.delete');
    Route::get('edit/{id}', [\App\Http\Controllers\BooksController::class, 'edit'])->name('edit.book');
    Route::put('update/{id}',[\App\Http\Controllers\BooksController::class,'update'])->name('update.book');
});

Route::get('authors', [\App\Http\Controllers\AuthorsController::class, 'list'])->name('authors.list');
Route::get('publishers', [\App\Http\Controllers\publishersController::class, 'list'])->name('publishers.list');


Route::get('login', [\App\Http\Controllers\LoginController::class, 'show'])->name('login');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login.auth');

Route::get('register', [\App\Http\Controllers\RegisterController::class, 'show'])->name('register');
Route::post('register', [\App\Http\Controllers\RegisterController::class, 'register'])
    ->name('register.save');

Route::get('is_admin', [\App\Http\Controllers\AdminController::class, 'show'])->name('is_admin');




