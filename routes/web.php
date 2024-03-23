<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class,'index'])->name('posts.index');
Route::get('posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::get('categoria/{categoria}',[PostController::class, 'categoria'])->name('posts.categoria');
Route::get('tag/{tag}',[PostController::class, 'tag'])->name('posts.tag');
Route::get('/inicio',[AdminController::class,'index'])->name('admin.index');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('categorias', CategoriaController::class)->except([
    'show'
])->middleware('auth')->names('admin.categorias');
Route::resource('tags', TagController::class)->except([
    'show'
])->middleware('auth')->names('admin.tags');
Route::resource('publications', PublicationController::class)->except([
    'show'
])->middleware('auth')->names('admin.publications');
require __DIR__.'/auth.php';
