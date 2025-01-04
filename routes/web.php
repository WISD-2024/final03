<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//首頁
Route::get('/', function () {
    return view('welcome');
});

//辨別role，跳轉至各個使用者頁面
Route::get('/redirects',[HomeController::class,'index'])->name('index');

//平台人員
Route::prefix('poster')->name('poster.')->group(function () {
    Route::get('/meals',[MealController::class,'index'])->name('meals.index');//餐點列表
    Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');//新增餐點頁面
    Route::post('/meals', [MealController::class, 'store'])->name('meals.store');//儲存餐點資料

});


Route::resource('categories', CategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('meals', MealController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderitems', OrderItemController::class);

Route::resource('staffs', StaffController::class);
