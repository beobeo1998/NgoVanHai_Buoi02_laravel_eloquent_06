<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('layout.master');
});

Route::get('post',[PostController::class, 'index'])->name('post.index');
Route::get('post/create',[PostController::class, 'create'])->name('post.create');
Route::post('post/create',[PostController::class,'store'])->name('post.store');
Route::get('post/{id}',[PostController::class,'edit'])->name('post.edit');
Route::post('post/{id}',[PostController::class,'update'])->name('post.update');
Route::get('post/{id}/delete',[PostController::class,'delete'])->name('post.delete');
