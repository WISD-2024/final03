# 還原專案步驟
1. 複製 https://github.com/WISD-2024/final03.git 本系統在GitHub的專案
- **打開 Source tree，點選 Clone 後，輸入以下資料Source Path:https://github.com/WISD-2024/final03.git Destination Path:C:\wagon\uwamp\www\final03 打開cmder，切換至專案所在資料夾，cd final03**
2. 在cmder輸入以下命令，以復原此系統：
- **composer install**
- **composer run‐script post‐root‐package‐install**
- **composer run‐script post‐create‐project‐cmd** 
- **npm install** 
- **npm run build** 
3. 將專案打開 在.env檔案內輸入資料庫主機IP、Port、名稱、與帳密如下：：
- **DB_HOST=127.0.0.1**
- **DB_PORT=33060**
- **DB_DATABASE=final03**
- **DB_USERNAME=root**
- **DB_PASSWORD=root**
4. 復原完，建立資料庫
- **先進Adminer建立final03的資料庫**
- **將本系統資料庫匯入 在database資料夾底下的sql檔案**
5. 進入adminer
- **資料庫系統:MYSQL**
- **伺服器:localhost:33060**
- **帳號:root**
- **密碼:root**
6. 在UwAmp下，點選Apache config，選擇port 8000 ，並在Document Root 輸入{DOCUMENTPATH}/final03/public



# 系統畫面

## -訪客/會員

### ◆首頁
<a href ="https://imgur.com/1pQDF6z"><img src="https://imgur.com/1pQDF6z.png" title="source: imgur.com" /></a>
### ◆餐點資訊
<a href ="https://imgur.com/DMOLRNp"><img src="https://imgur.com/DMOLRNp.png" title="source: imgur.com" /></a>
### ◆修改訂單
<a href ="https://imgur.com/Ynsq8YF"><img src="https://imgur.com/Ynsq8YF.png" title="source: imgur.com" /></a>
### ◆結帳
<a href ="https://imgur.com/X7XCb6j"><img src="https://imgur.com/X7XCb6j.png" title="source: imgur.com" /></a>
### ◆訂單詳情
<a href ="https://imgur.com/yqKAiGE"><img src="https://imgur.com/yqKAiGE.png" title="source: imgur.com" /></a>

## -平台人員
### ◆首頁
<a href ="https://imgur.com/LmIfTXt"><img src="https://imgur.com/LmIfTXt.png" title="source: imgur.com" /></a>
### ◆餐點管理
<a href ="https://imgur.com/7FZ7F9C"><img src="https://imgur.com/7FZ7F9C.png" title="source: imgur.com" /></a>
### ◆類別管理
<a href ="https://imgur.com/3CIyN4F"><img src="https://imgur.com/3CIyN4F.png" title="source: imgur.com" /></a>

## -內場人員
### ◆首頁
<a href ="https://imgur.com/u3fxCdn"><img src="https://imgur.com/u3fxCdn.png" title="source: imgur.com" /></a>
### ◆訂單管理
<a href ="https://imgur.com/RkvVUcP"><img src="https://imgur.com/RkvVUcP.png" title="source: imgur.com" /></a>
### ◆訂單詳情
<a href ="https://imgur.com/CuPksUL"><img src="https://imgur.com/CuPksUL.png" title="source: imgur.com" /></a>
### ◆歷史訂單
<a href ="https://imgur.com/WIghJin"><img src="https://imgur.com/WIghJin.png" title="source: imgur.com" /></a>
# 系統名稱及作用

快炒店點餐管理系統

   - 省去人工方式處理櫃台點餐結帳
   
   - 降低櫃台點錯餐點機率
    
   - 讓顧客、內場人員及平台人員更方便且快速的管理或瀏覽所需   
   
# 系統主要功能
## ★ 訪客/會員
  - 首頁 (Route::get('/',[HomeController::class,'home'])->name('home');) [3B132016 曾永全](https://github.com/3B132016)
  - 不同使用者登入後首頁 (Route::get('/redirects',[HomeController::class,'index'])->name('index');) [3B132016 曾永全](https://github.com/3B132016)
  - 各類別顯示餐點 (Route::get('/sid/{category}',[HomeController::class,'sid'])->name('sid');) [3B132016 曾永全](https://github.com/3B132016)
  - 搜尋餐點 (Route::get('/search',[MealController::class,'search'])->name('search');) [3B132016 曾永全](https://github.com/3B132016)
  
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

## ★ 平台人員

  ><餐點管理>
  - 餐點列表 (Route::get('/meals',[MealController::class,'index'])->name('meals.index');) [3B132016 曾永全](https://github.com/3B132016)
  - 新增餐點頁面 (Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');) [3B132016 曾永全](https://github.com/3B132016)
  - 儲存餐點資料 (Route::post('/meals', [MealController::class, 'store'])->name('meals.store');) [3B132016 曾永全](https://github.com/3B132016)
  - 刪除餐點資料 (Route::delete('/meals/{meal}',[MealController::class,'destroy'])->name('meals.destroy');) [3B132016 曾永全](https://github.com/3B132016)
  - 餐點詳情頁面 (Route::get('/meals/{meal}/show', [MealController::class, 'show'])->name('meals.show');) [3B132016 曾永全](https://github.com/3B132016)
  - 編輯餐點頁面 (Route::get('/meals/{meal}/edit',[MealController::class,'edit'])->name('meals.edit');) [3B132016 曾永全](https://github.com/3B132016)
  - 更新餐點資料 (Route::patch('/meals/{meal}',[MealController::class,'update'])->name('meals.update');) [3B132016 曾永全](https://github.com/3B132016)
  
  ><類別管理>
  - 類別列表 (Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 新增類別頁面 (Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 儲存類別資料 (Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 編輯類別頁面 (Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 更新類別資料 (Route::patch('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 餐點詳情頁面 (Route::get('/categories/{category}/show', [CategoryController::class, 'show'])->name('categories.show');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 刪除餐點資料 (Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');) [黃鐙霆 3B132047](https://github.com/3B132047)

## ★ 內場人員
  - 訂單列表  Route::get('/orders',[StaffController::class,'index'])->name('orders.index'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 訂單詳細 Route::get('/orders/{order}/show',[StaffController::class,'show'])->name('orders.show'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 餐點完成按鈕 Route::patch('/orderItems/{orderItem}',[StaffController::class,'itemstatus'])->name('itemstatus.update'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 歷史訂單列表 Route::get('/orders/finish',[StaffController::class,'finish'])->name('orders.finish'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 訂單完成按鈕 Route::patch('/orders/{order}',[StaffController::class,'orderstatus'])->name('orderstatus.update'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 刪除訂單 Route::delete('/orders/{order}',[StaffController::class,'destroy'])->name('orders.destroy'); [黃鐙霆 3B132047](https://github.com/3B132047)

# ERD   
<a href ="https://imgur.com/L79allF"><img src="https://imgur.com/L79allF.png" title="source: imgur.com" /></a>
# 關聯式綱要圖   
<a href ="https://imgur.com/t4v1dBP"><img src="https://imgur.com/t4v1dBP.png" title="source: imgur.com" /></a>
# 實際資料表欄位設計  
  - 使用者(users)資料表
  <a href ="https://imgur.com/iUNIZpK"><img src="https://imgur.com/iUNIZpK.png" title="source: imgur.com" /></a>
  - 類別(categories)資料表
  <a href ="https://imgur.com/iA5CeGC"><img src="https://imgur.com/iA5CeGC.png" title="source: imgur.com" /></a>
  - 餐點(meals)資料表
  <a href ="https://imgur.com/wV3KFHa"><img src="https://imgur.com/wV3KFHa.png" title="source: imgur.com" /></a>
  - 訂單(orders)資料表
  <a href ="https://imgur.com/frOJrFg"><img src="https://imgur.com/frOJrFg.png" title="source: imgur.com" /></a>
  - 訂單明細(order_items)資料表
  <a href ="https://imgur.com/5OS7PjS"><img src="https://imgur.com/5OS7PjS.png" title="source: imgur.com" /></a>
  
# 初始專案與DB負責的同學 
- 初始專案 [黃鐙霆 3B132047](https://github.com/3B132047)
- DB [3B132016 曾永全](https://github.com/3B132016)

# 額外使用的套件或樣板  

- startbootstrap
    ```
    介面清楚明瞭，方便操作。
    ```
    

# 系統測試資料存放位置  
- final03底下的sql資料夾
 
# 系統使用者測試帳號  
    
    seeder後，users資料表會有三筆資料，需手動將users資料表的role各別設為0、1、2(0為會員、1為平台人員、2為內場人員)
    帳號：至users資料表複製各使用者e-mail
    密碼：皆為8個零(00000000)
    

# 系統開發人員與工作分配  

- [3B132016 曾永全](https://github.com/3B132016)
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