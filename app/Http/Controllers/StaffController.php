<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //同時抓pay為已付款(1)與status為製作中(1)的資料
        $orders=Order::where('pay','=','1')->where('status','=','1')->get();

       $data=[
            'orders'=>$orders,

        ];
        return view('staff.orders.index',$data);
    }

    public function finish()
    {
        $orders=Order::where('pay','=','1')->where('status','=','2')->get();
        $data=[
            'orders'=>$orders
        ];

        return view('staff.orders.finish',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
       $orderItems=OrderItem::where('order_id','=',$order->id)->get();
        $order_way=$order->way;
        $order_total=$order->total;
        $order_status=$order->status;

        $data=[
           'orderItems'=>$orderItems,
            'order'=>$order,
           'order_way'=>$order_way,
            'order_total'=>$order_total,
            'order_status'=>$order_status,
       ];
       return view('staff.orders.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaffRequest  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, Staff $staff)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //先將和顧客訂單(order)有關聯的訂單明細(orderitem)刪除
        $order->orderitem()->delete();

        //再將顧客此筆訂單刪除
        Order::destroy($order->id);

        //轉至顧客訂單初始化路由，開始新的一筆訂單
        return redirect()->route('staff.orders.index');
    }


    public function itemstatus(OrderItem $orderItem)
    {
        $orderItem->update([
            'status'=>1,
        ]);
        $order=$orderItem->order->id;
        $orderItems=OrderItem::where('order_id','=',$order)->get();
        $order_status=$orderItems->order->status;
        $order_way=$orderItems->order->way;
        $order_total=$orderItems->order->total;



        $data=[
            'orderItems'=>$orderItems,
            'order'=>$order,
            'order_way'=>$order_way,
            'order_status'=>$order_status,
            'order_total'=>$order_total,
        ];


        return view('staff.orders.show',$data);
    }
    public function orderstatus(Order $order)
    {
        $order->update([
            'status'=>2,//訂單完成狀態
        ]);
        $orders=Order::where('pay','=','1')->where('status','=','2')->get();
        $data=[
            'orders'=>$orders,

        ];


        return view('staff.orders.finish',$data);
    }




}
