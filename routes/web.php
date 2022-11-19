<?php
use Illuminate\Support\Facades\Route;

// routes for Auth
Route::get('/', [App\Http\Controllers\authController::class, 'index'])->name('login');
Route::get('/postlogin', [App\Http\Controllers\authController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [App\Http\Controllers\authController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\authController::class, 'register'])->name('register');
Route::get('/postregister', [App\Http\Controllers\authController::class, 'postregister'])->name('postregister');

// routes for Profile

Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/home', [App\Http\Controllers\ProfileController::class, 'index'])->name('home');

// Routes for posts
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/post/show/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::post('/post/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::get('/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::get('/post/hdelete/{id}', [App\Http\Controllers\PostController::class, 'hdelete'])->name('post.hdelete');
Route::get('/post/trashed', [App\Http\Controllers\PostController::class, 'trashed'])->name('posts.trashed');
Route::get('/post/restore/{id}', [App\Http\Controllers\PostController::class, 'restore'])->name('post.restore');
Route::get('/post/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');


// routes for tags

Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags');
Route::get('/tag/create', [App\Http\Controllers\TagController::class, 'create'])->name('tag.create');
Route::post('/tag/store', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');
Route::post('/tag/update/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');
Route::get('/tag/edit/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
Route::get('/tag/destroy/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tag.destroy');
