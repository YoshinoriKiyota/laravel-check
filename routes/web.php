<?php

use App\Http\Controllers\MemoController;
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

Route::get('/home', [MemoController::class, 'index'])->name('home.index');

Route::get('/home/create', [MemoController::class, 'create'])->name('home.create');

Route::post('/home', [MemoController::class, 'store'])->name('home.store');

Route::get('/home/edit', [MemoController::class, 'edit'])->name('home.edit');

Route::get('/delete/{id}', [MemoController::class, 'destroy'])->name('delete');
