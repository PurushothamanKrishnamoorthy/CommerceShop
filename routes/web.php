<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/users/{name?}', function($name = 'Bruce'){
    return "Hello ".$name.'!';
})->where('name','[a-zA-Z0-9]+'); //TODO: any()

Route::get('/home/{name?}', [HomeController::class, 'index'])->name('home.index');
Route::get('/user',[UserController::class, 'index'])->name('user.index');


Route::get('/posts', [ClientController::class,'getAllPosts'])->name('posts.getallposts');
Route::get('/posts/{id?}', [ClientController::class,'getPost'])->name('posts.getpost');
Route::get('/new', [PostController::class,'add'])->name('posts.new');
Route::post('/new', [PostController::class,'createPost'])->name('posts.createpost');
Route::get('/blog/{id?}', [PostController::class,'getById'])->name('posts.id');
Route::get('/delete-post/{id?}', [PostController::class,'delete'])->name('posts.delete');
Route::get('/edit-post/{id?}', [PostController::class,'editPost'])->name('posts.edit');
Route::post('/edit-post/{id?}', [PostController::class,'updatePost'])->name('posts.update');



Route::get('/add-post', [ClientController::class,'addPost'])->name('posts.addpost');
Route::get('/update-post', [ClientController::class,'updatePost'])->name('posts.updatepost');
Route::get('/delete-post/{id}', [ClientController::class,'deletePost'])->name('posts.deletepost');
Route::get('/blogs', [PostController::class,'getAllPost'])->name('blog.getblogs');

Route::get('/login',[LoginController::class, 'index'])->middleware('check.user')->name('login.index');
Route::post('/login',[LoginController::class, 'loginsubmit'])->name('login.submit');