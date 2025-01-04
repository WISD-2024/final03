@extends('staff.layouts.master')

@section('page-title', '訂單詳情')

@section('page-content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">訂單詳情</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">訂單詳情</li>
        </ol>
        <h5 class="mt-4">
            <li class="active">用餐方式：
                @if($order_way==0)
                    內用
                @else
                    外帶
                @endif
            </li>
            <li class="active">總金額：{{$order_total}}元</li>
        </h5>


        <!--記錄為已完成(order資料表的status改為2)-->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @if($order_status==1)
                <form action="{{route('staff.orderstatus.update',$order)}}" method="post" style="display: inline-block">
                    @method('patch')
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">訂單確定完成</button>
                </form>
            @endif
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">餐點名稱</th>
                <th scope="col">數量</th>
                <th scope="col">金額</th>
                <th scope="col">功能</th>
            </tr>
            </thead>

            <tbody>
            @foreach($orderItems as $orderItem)
                <tr>
                    <th scope="row" style="width: 50px"></th>
                    <td>
                        <label for="exampleFormControlInput1" class="form-label">{{$orderItem->meal->name}}</label>
                    </td>
                    <td>
                        <label for="exampleFormControlInput1" class="form-label">{{$orderItem->quantity}}</label>
                    </td>
                    <td>
                        <label for="exampleFormControlInput1" class="form-label">{{$orderItem->meal->price}}元</label>
                    </td>
                    <td style="width: 150px">
                        @if($orderItem->status == 1)
                            <label for="message-text" class="col-form-label">已出餐</label>
                        @else
                            <!--記錄為已出餐(orderitem資料表的status改為1)-->
                            <form action='{{route('staff.itemstatus.update',$orderItem->id)}}' method="post" style="display: inline-block">
                                @method('patch')
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">完成</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
