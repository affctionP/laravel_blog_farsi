<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
Route::get('/about',[PagesController::class,'about'] )->name('about');
Route::get('/',[PagesController::class,'index'])->name('home');
//Route::get('/services', [PagesController::class,'service'])->name('services');
use App\Http\Controllers\PostController;
use PhpParser\Node\Expr\PostInc;

Route::resource('posts',PostController::class);
Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/{id}/show',[PostController::class,'show'])->name('posts.show');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts/{id}/edit',[PostController::class,'edit'])->name('posts.edit');
//namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');



Route::get('categories/create',[App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
Route::post('categories/store',[App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
Route::post('comment/store',[\App\Http\Controllers\CommentController::class,'store'])->name('comment.store');
Route::get('storage/cover_image/{image}')->name('image');
?>