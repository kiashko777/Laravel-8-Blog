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


Route::get('/posts/{post:slug}', [PostController::class, 'show']);


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');


Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);


Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');


Route::get('authors/{author:username}', function (User $author) {
  return view('posts.index', [
    'posts' => $author->posts->load(['category', 'author']),
    'categories' => Category::all(),

  ]);
});


Route::get('categories/{category:slug}', function (Category $category) {
  return view('posts.index', [
    'posts' => $category->posts->load(['category', 'author']),
    'carrentCategory' => $category,
    'categories' => Category::all(),
  ]);
});


Route::post('newsletter', [NewsletterController::class, 'subscribe']);


Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');


Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');


Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');


Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');


Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');


Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');
