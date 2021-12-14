<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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


Route::get('/', [PostController::class, 'index'])->name('home');


Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('show');


Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register');


Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');


Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->name('posts.comments');


Route::post('login', [SessionsController::class, 'store'])->middleware('guest');


Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');


Route::post('newsletter', [NewsletterController::class, 'subscribe'])->name('subscribe');


Route::middleware('admin')->group(function () {

  Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('posts.create');


  Route::post('admin/posts', [AdminPostController::class, 'store'])->name('posts.store');


  Route::get('admin/posts', [AdminPostController::class, 'index'])->name('posts.index');


  Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('posts.edit');


  Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->name('posts.update');


  Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->name('posts.delete');

});

