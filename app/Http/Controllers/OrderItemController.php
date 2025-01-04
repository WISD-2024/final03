<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrderItemController extends Controller
{
    //抓顧客此筆訂單資訊，轉至呈現訂單明細的路由
    public function index()
    {
        $order = Auth::user()->order()->orderby('id', 'DESC')->first();
        return redirect()->route('orders.orders.show',$order->id);
    }

    //新增訂單明細頁面
    public function create(Meal $meal)
    {
        //抓顧客點選的餐點資料
        $data=[ 'meal'=>$meal ];

        //呈現在新增顧客訂單明細頁面
        return view('orderitems.create',$data);
    }

    //儲存訂單明細資料
    public function store(Request $request,Meal $meal)
    {
        //取得使用者此筆訂單資訊
        $order = Auth::user()->order()->orderby('id', 'DESC')->first();

        //關聯餐點及訂單到order_item表內
        $meal->order()->attach($order->id, ['quantity' => $request['quantity'], 'status' => 0]);

        //變數$meal存入矩陣
        $data=[ 'meal'=>$meal ];

        //返回該餐點介面
        return view('orderitems.create',$data);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem)
    $data=['orderItem'=>$orderItem];

    return view('orderitems.edit',$data);
 }

 //更改訂單明細數量
 public function update(Request $request, OrderItem $orderItem)
 {

   
     $data=['orderItem'=>$orderItem];

        return view('orderitems.edit',$data);
     }
 
     //更改訂單明細數量
         
        public function update(Request $request, OrderItem $orderItem)//更新訂單明細數量
        {     $orderItem->update([
                'quantity'=>$request['quantity'],
            ]);
    
            //取得顧客此筆訂單資料
            $order=Auth::user()->order()->orderby('id','DESC')->first();
    
            //$order內容存入order矩陣
            $data=['order'=>$order];
    
            //返回顧客此筆訂單明細的頁面
            return view('orders.show',$data);
        }
    }

    
    public function destroy(OrderItem $orderItem)
    {
        OrderItem::destroy($orderItem->id);
        return redirect()->route('order.OrderItem.index');
    }
}
