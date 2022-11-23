<?php

use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class, 'home'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/book/{book}', [BookController::class, 'show'])->name('book');
Route::post('/book/{book}/reserve', [BookController::class, 'reserve'])->name('book.reserve');
Route::post('/book/{book}/loan', [BookController::class, 'loan'])->name('book.loan');
Route::post('/book/{book}/deletereservation', [BookController::class, 'deleteReservation'])->name('book.deletereservation');
Route::post('/book/{book}/return', [BookController::class, 'return'])->name('book.return');
Route::get('/login', fn () => view('auth.login'));

require __DIR__.'/auth.php';