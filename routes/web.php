<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\StaffController;
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

//首頁
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//平台人員
Route::prefix('poster')->name('poster.')->group(function () {
Route::get('/index',[PosterController::class,'index'])->name('index');//主控台
//Route::post('/logout',[PosterController::class,'logout'])->name('logout');//登出

});

Route::prefix('meals')->name('meals.')->group(function () {
    Route::get('/index',[MealController::class,'index'])->name('index');//餐點管理列表


});



Route::resource('categories', CategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('meals', MealController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderitems', OrderItemController::class);

Route::resource('staffs', StaffController::class);
