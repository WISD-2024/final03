<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return// \Illuminate\Http\Response
     */

    //初始化顧客訂單
    public function init(){

        //顧客登入後初始化此筆訂單(建立一個訂單內容都是預設值零的訂單關聯到顧客)
        $init=['pay'=>'0','total'=>'0','way'=>'0','status'=>'0'];
        Auth::user()->order()->create($init);

        //轉至顧客點餐的首頁路由
        return  redirect()->route('orders.orders.index');

    }

    //將頁面轉至顧客點單的首頁
    public function index()
    {
        $meals = Meal::orderBy('id','DESC')->get();//取得資料庫中的欄位值，以陣列的方式
        $categories=Category::orderBy('id','DESC')->get();
        $data=[
            'meals'=>$meals,
            'categories'=>$categories
        ];

        //把資料呈現到顧客點餐的首頁
        return view('index',$data);
    }

    //管理者查看餐點
    public function staffindex()
    {
        $orders = Order::orderBy('id','DESC')->get();//取得資料庫中的欄位值，以陣列的方式
        $data=[
            'orders'=>$orders
        ];

        return view('staff.orders.index',$data);
    }

    //轉到結帳頁面
    public function create(Order $order)
    {
        //計算此筆訂單總金額
        $tatol=0;
        foreach ($order->orderitem as $i){
            $quantity=$i->quantity;
            $price=$i->meal->price;
            $pertotal=$quantity*$price;
            $tatol=$tatol+$pertotal;
        }

        //先存入此筆訂單的總金額，才能顯示在結帳頁面上
        $order->update(['total'=> $tatol]);

        $data=[ 'order'=>$order ];

        return view('orders.create',$data);
    }

    //存客戶結帳資訊
    public function store(Request $request,Order $order)
    {
        //取得現在下定完成時間
        $now =Carbon::now();

        //存入顧客訂單(因為一開始用初始化方式建了訂單，所以用update)
        $order->update(['pay'=>1,'starttime'=>$now,'way'=>$request['way'],'status'=>1]);

        //轉至我的訂單頁面
        return redirect()->route('orders.orders.show',$order->id);

    }

    //呈現顧客此訂單的訂單明細
    public function show(Order $order)
    {
        $data=['order'=>$order];
        return view('orders.show',$data);
    }


    public function edit(Order $order)
    {
        //
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    //若此筆訂單已經結束，將此筆訂單刪除，開始新的訂單
    public function destroy(Order $order)
    {
        //先將和顧客訂單(order)有關聯的訂單明細(orderitem)刪除
        $order->orderitem()->delete();

        //再將顧客此筆訂單刪除
        Order::destroy($order->id);

        //轉至顧客訂單初始化路由，開始新的一筆訂單
        return redirect()->route('orders.orders.init');
    }
}
