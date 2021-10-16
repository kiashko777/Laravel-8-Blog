<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;

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


//ROUTE TO FETCH AUTHOR'S POSTS

Route::get('authors/{author:username}', function (User $author) {

  return view('posts', [
    'posts' => $author->posts->load(['category', 'author']),
    'categories' => Category::all()
  ]);
});

//ROUTE TO FETCH CATEGORIES

Route::get('categories/{category:slug}', function (Category $category) {

  return view('posts', [
    'posts' => $category->posts->load(['category', 'author']),
    'carrentCategory' => $category,
    'categories' => Category::all()
  ]);
});
