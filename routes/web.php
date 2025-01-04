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


Route::get('/',[HomeController::class,'home'])->name('home');//首頁
Route::get('/sid/{category}',[HomeController::class,'sid'])->name('sid');//按照分類顯示在index上
Route::get('/search',[MealController::class,'search'])->name('search');//搜尋

//辨別role，跳轉至各個使用者首面(0->user,1->poster,2->staff)
Route::get('/redirects',[HomeController::class,'index'])->name('index');

//平台人員
Route::prefix('poster')->name('poster.')->group(function () {
    Route::get('/meals',[MealController::class,'index'])->name('meals.index');//餐點列表
    Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');//新增餐點頁面
    Route::post('/meals', [MealController::class, 'store'])->name('meals.store');//儲存餐點資料
    Route::delete('/meals/{meal}',[MealController::class,'destroy'])->name('meals.destroy');//刪除餐點資料
    Route::get('/meals/{meal}/show', [MealController::class, 'show'])->name('meals.show');//餐點詳情頁面
    Route::get('/meals/{meal}/edit',[MealController::class,'edit'])->name('meals.edit');//編輯餐點頁面
    Route::patch('/meals/{meal}',[MealController::class,'update'])->name('meals.update');//更新餐點資料
    
    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');//類別列表
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');//新增類別頁面
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');//儲存類別資料
    Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');//編輯類別頁面
    Route::patch('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');//更新類別資料
    Route::get('/categories/{category}/show', [CategoryController::class, 'show'])->name('categories.show');//餐點詳情頁面
Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');//刪除餐點資料
});

//內場人員
Route::prefix('staff')->name('staff.')->group(function () {
    Route::get('/orders',[OrderController::class,'staffindex'])->name('orders.index');//訂單列表


});


Route::resource('categories', CategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('meals', MealController::class);

//顧客訂單
Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/init',[OrderController::class,'init'])->name('orders.init');//初始化顧客訂單
    Route::get('/orders',[OrderController::class,'index'])->name('orders.index');//將頁面轉至顧客點單的首頁
    Route::get('/orders/create/{order}', [OrderController::class, 'create'])->name('orders.create');//轉到結帳頁面
    Route::post('/orders/{order}', [OrderController::class, 'store'])->name('orders.store');//存客戶結帳資訊
    Route::delete('/orders/{order}',[OrderController::class,'destroy'])->name('orders.destroy');//刪除訂單資料
    Route::get('/orders/{order}/show', [OrderController::class, 'show'])->name('orders.show');//呈現顧客此訂單的訂單明細
    Route::get('/orders/{order}/edit',[OrderController::class,'edit'])->name('orders.edit');
    Route::patch('/orders/{order}',[OrderController::class,'update'])->name('orders.update');

});

//顧客訂單明細
Route::prefix('OrderItem')->name('order.')->group(function () {
    Route::get('/OrderItem',[OrderItemController::class,'index'])->name('OrderItem.index');//抓顧客此筆訂單資訊
    Route::get('/OrderItem/create/{meal}', [OrderItemController::class, 'create'])->name('OrderItem.create');//新增訂單明細頁面
    Route::post('/OrderItem/{meal}', [OrderItemController::class, 'store'])->name('OrderItem.store');//儲存訂單明細資料
    Route::delete('/OrderItem/{orderItem}',[OrderItemController::class,'destroy'])->name('OrderItem.destroy');//刪除訂單明細資料
    Route::get('/OrderItem/show', [OrderItemController::class, 'show'])->name('OrderItem.show');
    Route::get('/OrderItem/{orderItem}/edit',[OrderItemController::class,'edit'])->name('OrderItem.edit');//編輯訂單明細頁面
    Route::patch('/OrderItem/{orderItem}',[OrderItemController::class,'update'])->name('OrderItem.update');//更改訂單明細數量

});
