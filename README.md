<!-- test -->
# 系統畫面

## 訪客/會員

### 首頁
<a href ="https://imgur.com/8oo0TWC"><img src="https://i.imgur.com/8oo0TWC.jpg" title="source: imgur.com" /></a>
### 餐點資訊
<a href ="https://imgur.com/ldq9RUD"><img src="https://i.imgur.com/ldq9RUD.jpg" title="source: imgur.com" /></a>
### 修改訂單
<a href ="https://imgur.com/7CSnqxm"><img src="https://i.imgur.com/7CSnqxm.png" title="source: imgur.com" /></a>
### 結帳
<a href ="https://imgur.com/Mcpd5qr"><img src="https://i.imgur.com/Mcpd5qr.jpg" title="source: imgur.com" /></a>
### 訂單詳情
<a href ="https://imgur.com/7eFDfSw"><img src="https://i.imgur.com/7eFDfSw.png" title="source: imgur.com" /></a>

## 平台人員
### 首頁
<a href ="https://imgur.com/xzJMwJW"><img src="https://i.imgur.com/xzJMwJW.jpg" title="source: imgur.com" /></a>
### 餐點管理
<a href ="https://imgur.com/Wf4xVhv"><img src="https://i.imgur.com/Wf4xVhv.jpg" title="source: imgur.com" /></a>
### 類別管理
<a href ="https://imgur.com/3u3Fb8W"><img src="https://i.imgur.com/3u3Fb8W.jpg" title="source: imgur.com" /></a>

## 內場人員
### 首頁
<a href ="https://imgur.com/5AzzFUj"><img src="https://i.imgur.com/5AzzFUj.png" title="source: imgur.com" /></a>
### 訂單管理
<a href ="https://imgur.com/tlQyfHJ"><img src="https://i.imgur.com/tlQyfHJ.jpg" title="source: imgur.com" /></a>
### 訂單詳情
<a href ="https://imgur.com/uu8UOGG"><img src="https://i.imgur.com/uu8UOGG.jpg" title="source: imgur.com" /></a>
### 歷史訂單
<a href ="https://imgur.com/9erwPsj"><img src="https://i.imgur.com/9erwPsj.jpg" title="source: imgur.com" /></a>
# 系統名稱及作用

比薩店點餐管理系統

   - 省去人工方式處理櫃台點餐結帳
   
   - 降低櫃台點錯餐點機率
    
   - 讓顧客、內場人員及平台人員更方便且快速的管理或瀏覽所需 
   
# 系統主要功能
##  訪客/會員
  - 首頁 (Route::get('/',[HomeController::class,'home'])->name('home');) [曾永全 3B132016](https://github.com/3B132016)
  - 不同使用者登入後首頁 (Route::get('/redirects',[HomeController::class,'index'])->name('index');) [曾永全 3B132016](https://github.com/3B132016)
  - 各類別顯示餐點 (Route::get('/sid/{category}',[HomeController::class,'sid'])->name('sid');) [曾永全 3B132016](https://github.com/3B132016)
  - 搜尋餐點 (Route::get('/search',[MealController::class,'search'])->name('search');) [曾永全 3B132016](https://github.com/3B132016)
  
  ><訂單>
  - 初始化顧客訂單 (Route::get('/init',[OrderController::class,'init'])->name('orders.init');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 點餐頁面 (Route::get('/orders',[OrderController::class,'index'])->name('orders.index');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 新增訂單 (Route::get('/orders/create/{order}', [OrderController::class, 'create'])->name('orders.create');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 儲存結帳資訊 (Route::post('/orders/{order}', [OrderController::class, 'store'])->name('orders.store');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 訂單詳情 (Route::get('/orders/{order}/show', [OrderController::class, 'show'])->name('orders.show');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 訂單餐點編輯 (Route::get('/orders/{order}/edit',[OrderController::class,'edit'])->name('orders.edit');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 訂單餐點更新 (Route::patch('/orders/{order}',[OrderController::class,'update'])->name('orders.update');) [黃河濤 3B032081](https://github.com/student3B032081)
  
  ><訂單明細>
  - 目前顧客之訂單 (Route::get('/OrderItem',[OrderItemController::class,'index'])->name('OrderItem.index');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 新增餐點至明細 (Route::get('/OrderItem/create/{meal}', [OrderItemController::class, 'create'])->name('OrderItem.create');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 儲存訂單明細資料 (Route::post('/OrderItem/{meal}', [OrderItemController::class, 'store'])->name('OrderItem.store');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 刪除訂單明細資料 (Route::delete('/OrderItem/{orderItem}',[OrderItemController::class,'destroy'])->name('OrderItem.destroy');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 訂單明細頁面 (Route::get('/OrderItem/show', [OrderItemController::class, 'show'])->name('OrderItem.show');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 編輯訂單明細頁面 (Route::get('/OrderItem/{orderItem}/edit',[OrderItemController::class,'edit'])->name('OrderItem.edit');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 更新訂單明細資料 (Route::patch('/OrderItem/{orderItem}',[OrderItemController::class,'update'])->name('OrderItem.update');) [黃河濤 3B032081](https://github.com/student3B032081)

##  平台人員

  ><餐點管理>
  - 餐點列表 (Route::get('/meals',[MealController::class,'index'])->name('meals.index');) [曾永全 3B132016](https://github.com/3B132016)
  - 新增餐點頁面 (Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');) [曾永全 3B132016](https://github.com/3B132016)
  - 儲存餐點資料 (Route::post('/meals', [MealController::class, 'store'])->name('meals.store');) [曾永全 3B132016](https://github.com/3B132016)
  - 刪除餐點資料 (Route::delete('/meals/{meal}',[MealController::class,'destroy'])->name('meals.destroy');) [曾永全 3B132016](https://github.com/3B132016)
  - 餐點詳情頁面 (Route::get('/meals/{meal}/show', [MealController::class, 'show'])->name('meals.show');) [曾永全 3B132016](https://github.com/3B132016)
  - 編輯餐點頁面 (Route::get('/meals/{meal}/edit',[MealController::class,'edit'])->name('meals.edit');) [曾永全 3B132016](https://github.com/3B132016)
  - 更新餐點資料 (Route::patch('/meals/{meal}',[MealController::class,'update'])->name('meals.update');) [曾永全 3B132016](https://github.com/3B132016)
  
 ><類別管理>
  - 類別列表 (Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 新增類別頁面 (Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 儲存類別資料 (Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 編輯類別頁面 (Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 更新類別資料 (Route::patch('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 餐點詳情頁面 (Route::get('/categories/{category}/show', [CategoryController::class, 'show'])->name('categories.show');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 刪除餐點資料 (Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');) [黃鐙霆 3B132047](https://github.com/3B132047)

##  內場人員
  - 訂單列表  Route::get('/orders',[StaffController::class,'index'])->name('orders.index'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 訂單詳細 Route::get('/orders/{order}/show',[StaffController::class,'show'])->name('orders.show'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 餐點完成按鈕 Route::patch('/orderItems/{orderItem}',[StaffController::class,'itemstatus'])->name('itemstatus.update'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 歷史訂單列表 Route::get('/orders/finish',[StaffController::class,'finish'])->name('orders.finish'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 訂單完成按鈕 Route::patch('/orders/{order}',[StaffController::class,'orderstatus'])->name('orderstatus.update'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 刪除訂單 Route::delete('/orders/{order}',[StaffController::class,'destroy'])->name('orders.destroy'); [黃鐙霆 3B132047](https://github.com/3B132047)

# ERD
<a href ="https://imgur.com/HlGWvLz"><img src="https://i.imgur.com/HlGWvLz.jpg" title="source: imgur.com" /></a>
# 關聯式綱要圖 
<a href ="https://imgur.com/a/srt0xLc"><img src="https://i.imgur.com/BmNSINI.jpg" title="source: imgur.com" /></a>
# 實際資料表欄位設計 
  - 使用者(users)資料表
  <a href ="https://imgur.com/0xGR83e"><img src="https://i.imgur.com/0xGR83e.jpg" title="source: imgur.com" /></a>
  - 類別(categories)資料表
  <a href ="https://imgur.com/2tWlyH3"><img src="https://i.imgur.com/2tWlyH3.jpg" title="source: imgur.com" /></a>
  - 餐點(meals)資料表
  <a href ="https://imgur.com/JpKYLii"><img src="https://i.imgur.com/JpKYLii.jpg" title="source: imgur.com" /></a>
  - 訂單(orders)資料表
  <a href ="https://imgur.com/OynV6o1"><img src="https://i.imgur.com/OynV6o1.jpg" title="source: imgur.com" /></a>
  - 訂單明細(order_items)資料表
  <a href ="https://imgur.com/J0QVPGN"><img src="https://i.imgur.com/J0QVPGN.jpg" title="source: imgur.com" /></a>
  
# 初始專案與DB負責與readme撰寫的同學
- 初始專案 [黃鐙霆 3B132047](https://github.com/3B132047)
- DB [曾永全 3B132016](https://github.com/3B132016)
- readme撰寫[黃鐙霆 3B132047](https://github.com/3B132047) [曾永全 3B132016](https://github.com/3B132016)

# 額外使用的套件或樣板  

- startbootstrap
    ```
    介面清楚明瞭，方便操作。
    ```
    

# 系統測試資料存放位置  
- final03底下的sql資料夾
 
# 系統使用者測試帳號  
    
    帳號:123@gmail.com(顧客)
         poster@gmail.com(管理人員)
         staff@gmail.com(內場人員)
    密碼:皆為12345678
    

# 系統開發人員與工作分配  

- [曾永全 3B132016](https://github.com/3B132016)
    ```
    各使用者登入方法、平台人員餐點管理
    ```
- [黃鐙霆 3B132047](https://github.com/3B132047)
    ```
    平台人員類別管理、內場人員訂單管理
    ```   
- [黃河濤 3B032081](https://github.com/student3B032081) 
    ```
    顧客訂單、訂單明細 
    ```
