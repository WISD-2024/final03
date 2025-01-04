@extends('layouts.master_nosib')

@section('page-title', '訂單詳情')

@section('page-content')
    <br>
    <br>
<div class="container-fluid px-4">
    <h1 class="mt-4">訂單詳情</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">

            @if($order->status == 0)

            @elseif($order->status == 1)
                狀態 : 製作中
            @else
                狀態 : 已完成
                <br>
                <br>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#order{{$order->id}}" data-bs-whatever="@123">重新點餐</button>
                    <div class="modal fade" id="order{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <!--互動視窗-->
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!--標題-->
                                <div class="modal-header">
                                    <h5 class="modal-title">重新點餐</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('orders.orders.init')}}" >

                                    <div class="modal-body">
                                    
                                    <p>確定要重新點單嗎?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">取消</button>
                                        <button type="submit" class="btn btn-sm btn-danger">確定</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        </li>
    </ol>

    @if($order->status == 2)

    @else
        @foreach($order->orderitem as $orderItem)
        <div class="row mb-3">
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">餐點名稱 : {{$orderItem->meal->name}}</label>
            </div>
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">價格 : {{$orderItem->meal->price}}</label>
            </div>
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">餐點類別 : {{$orderItem->meal->category->name}}</label>
            </div>
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">數量 : {{$orderItem->quantity}}</label>
            </div>
            <div class="col-6">
                <label for="exampleFormControlTextarea1" class="form-label">餐點圖片 : </label>
                <img src=" {{asset('images/'.$orderItem->meal->image)}}" class="form-label">
            </div>


</div>

        @if($order->status == 0)
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{route('order.OrderItem.edit',$orderItem)}}" class="btn btn-primary btn-sm">編輯餐點數量</a>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#orderItem{{$orderItem->meal->id}}" data-bs-whatever="@123">刪除</button>
                <div class="modal fade" id="orderItem{{$orderItem->meal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!--互動視窗-->
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!--標題-->
                            <div class="modal-header">
                                <h5 class="modal-title">刪除餐點</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('order.OrderItem.destroy',$orderItem->id)}}" method="post" >
                                @method('delete')
                                <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
                                @csrf
                                <div class="modal-body">
                                    <p>確定要刪除 {{$orderItem->meal->name}} 嗎?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">取消</button>
                                    <button type="submit" class="btn btn-sm btn-danger">確定</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        @elseif($order->status == 1)
            <label for="exampleFormControlTextarea1" class="form-label">餐點完成狀態 : </label>
            @if($orderItem->status == 0)
                未出餐
            @else
                已出餐
            @endif
        @endif
        <br>
        <br>
        <br>
    @endforeach
    @endif
    <br>
    <br>
    <br>
    @if($order->status == 0)
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{route('orders.orders.create',$order)}}" class="btn btn-primary btn-sm">結帳</a>
        </div>

    @endif

    <br>
    <br>
    <br>

</div>
@endsection
