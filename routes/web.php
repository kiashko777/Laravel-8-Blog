<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;

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

//MAIN ROUTE

Route::get('/', [PostController::class, 'index'])->name('home');


//ROUTE FOR FETCH SINGLE POST

Route::get('/posts/{post:slug}', [PostController::class, 'show']);


//ROUTE TO CREATE THE USER

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');


//ROUTE TO STORE THE USER

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


//ROUTE TO LOGOUT THE USER

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


//ROUTE TO HANDLE THE COMMENTS
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);


//ROUTE TO LOGIN THE USER

Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');


//ROUTE TO FETCH AUTHOR'S POSTS

Route::get('authors/{author:username}', function (User $author) {

  return view('posts.index', [
    'posts' => $author->posts->load(['category', 'author']),
    'categories' => Category::all(),

  ]);
});

//ROUTE TO FETCH CATEGORIES

Route::get('categories/{category:slug}', function (Category $category) {

  return view('posts.index', [
    'posts' => $category->posts->load(['category', 'author']),
    'carrentCategory' => $category,
    'categories' => Category::all()
  ]);
});
