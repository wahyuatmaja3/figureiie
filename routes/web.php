<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FigureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use App\Models\Figure;
use App\Models\Order;
use App\Models\User;

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

Route::get('/', [WebController::class, 'index']);

Route::get('/figures/{figure:slug}', [FigureController::class, 'detail']);
Route::get('/categories', [CategoryController::class, 'index']);


Route::get('/admin', function () {
    return view('admin.index', [
        "figures" => Figure::all(),
        "orders" => Order::all(),
        "users" => User::all(),
        "revenue" => Order::where('status', '=', 'settlement')->get(),
        "pending" => Order::where('status', '=', 'pending')->get(),

    ]);
})->middleware('admin');


Route::get('/user/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/user/login', [LoginController::class, 'authenticate']);
Route::post('/user/logout', [LoginController::class, 'logout']);
Route::get('/user/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/user/signup', [SignupController::class, 'store'])->middleware('guest');

Route::get('/user/profile', [UserController::class, "profile"]);
Route::get('/user/change-password', [UserController::class, "changePass"]);
Route::post('/user/change-password', [UserController::class, "storeNewPass"]);
Route::get('/user/order-history', [UserController::class, "orderHistory"]);

Route::resource('/admin/products', DashboardProductController::class);

Route::get('/admin/customer', function () {
    return view('admin.customer.index');
});

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::get('/cart/remove', [CartController::class, 'remove']);

Route::get('/search', [FigureController::class, 'search']);

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/checkout/information', [CheckoutController::class, 'information']);
Route::post('/checkout/information', [CheckoutController::class, 'storeInformation']);
Route::get('/checkout/shipping', [CheckoutController::class, 'shipping']);
Route::post('/checkout/shipping', [CheckoutController::class, 'storeShipping']);
Route::get('/checkout/payment', [CheckoutController::class, 'payment']);
Route::post('/checkout/payment', [CheckoutController::class, 'paymentPost']);