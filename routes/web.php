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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [MemoController::class, 'index'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts', [MemoController::class, 'index'])->middleware('auth')->name('posts.index');

Route::get('/posts/create', [MemoController::class, 'create'])->middleware('auth')->name('posts.create');

Route::post('/posts', [MemoController::class, 'store'])->middleware('auth')->name('posts.store');

Route::get('/posts/{id}', [MemoController::class, 'show'])->middleware('auth')->name('posts.show');

Route::get('/posts/{id}/edit', [MemoController::class, 'edit'])->middleware('auth')->name('posts.edit');

Route::patch('/posts/{id}', [MemoController::class, 'update'])->middleware('auth')->name('posts.update');
