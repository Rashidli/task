<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/post_list',function (){
    $posts = Post::all();
    return view('post.index', compact('posts'));
})->name('post_list');

Route::get('/lang/{lang}',[PostController::class,'lang'])->name('lang');
Route::get('/login_page',[CommonController::class,'login_page'])->name('login_page');
Route::post('/post_data',[PostController::class, 'post_data'])->name('post_data');
Route::get('/edit_data/{id}',[PostController::class, 'edit_data'])->name('edit_data');
Route::post('/update_data/{id}',[PostController::class, 'update_data'])->name('update_data');
Route::get('/new_post',function (){
    return view('post.add_post');
})->name('new_post');

Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('/register',[UserController::class, 'register'])->name('register');
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::get('/verify/{id}',[UserController::class, 'verify'])->name('verify');
Route::group(['middleware' => 'auth', 'prefix' => 'cabinet'], function(){

    Route::resource('languages',LanguageController::class);

    Route::resource('posts',PostController::class);

    Route::get('/show_orders',[OrderController::class, 'show_orders'])->name('show_orders');
    Route::post('/create_orders',[OrderController::class, 'create_orders'])->name('create_orders');
    Route::get('/delete_orders/{id}',[OrderController::class, 'delete_orders'])->name('delete_orders');
    Route::post('/update_orders/{id}',[OrderController::class, 'update_orders'])->name('update_orders');

});
