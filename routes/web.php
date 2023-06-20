<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/login_page',[CommonController::class,'login_page'])->name('login_page');


Route::post('/register',[UserController::class, 'register'])->name('register');
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::get('/verify/{id}',[UserController::class, 'verify'])->name('verify');
Route::group(['middleware' => 'auth', 'prefix' => 'cabinet'], function(){
    Route::get('/show_orders',[OrderController::class, 'show_orders'])->name('show_orders');
    Route::post('/create_orders',[OrderController::class, 'create_orders'])->name('create_orders');
    Route::get('/delete_orders/{id}',[OrderController::class, 'delete_orders'])->name('delete_orders');
    Route::post('/update_orders/{id}',[OrderController::class, 'update_orders'])->name('update_orders');
});
