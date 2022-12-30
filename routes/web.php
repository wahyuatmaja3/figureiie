<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FigureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Figure;
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
    return view('main', [
        'figures' => Figure::orderBy('created_at', 'desc')->take(8)->get(),
    ]);
});

Route::get('/figures/{figure:slug}', [FigureController::class, 'detail']);


Route::get('/admin', function () {
    return view('admin.index', [
        "figures" => Figure::all()
    ]);
})->middleware('admin');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');

Route::get('/profile', function () {
    return view('user.profile', [
        'user' => auth()->user()
    ]);
});

Route::resource('/admin/products', DashboardProductController::class);

Route::get('/admin/customer', function () {
    return view('admin.customer.index');
});

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::get('/cart/remove', [CartController::class, 'remove']);

Route::get('/search', [FigureController::class, 'search']);