<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    return view('login');
})->name('login');

Route::get('home', function () {
    $posts = Post::all();
    $categories = Category::all();
    return view('main',compact('posts','categories'));
})->name('main')->middleware('is.main');

Route::get('admin', function () {
    return view('admin');
})->name('admin')->middleware('is.admin');

Route::get('post', function () {
    $posts = Post::all();
    $categories = Category::all();
    return view('post',compact('posts','categories'));
})->name('post')->middleware('is.admin');

Route::get('category', function () {
    $categories = Category::all();
    return view('category',compact('categories'));
})->name('category')->middleware('is.admin');

Route::get('user', function () {
    $users = User::all();
    return view('user',compact('users'));
})->name('user')->middleware('is.admin');
