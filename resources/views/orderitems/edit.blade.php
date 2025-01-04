@extends('layouts.master_nosib')

@section('page-title', 'Create article')

@section('page-content')
<br>
<br>
<div class="container-fluid px-4">
    <h1 class="mt-4">訂單餐點資訊</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">更改訂單餐點數量</li>
    </ol>

    <form action="{{route('order.OrderItem.update',$orderItem)}}" method="POST" role="form">
        @method('patch')
        @csrf

        <div class="form-group">
            <label for="title" class="form-label">餐點名稱：{{$orderItem->meal->name}}</label>
            <br>
            <label for="title" class="form-label">餐點單價：{{$orderItem->meal->price}}</label>
            <br>
            <label for="title" class="form-label">餐點相片：</label>
            <img src="{{asset('images/'.$orderItem->meal->image)}}">
            <br>
            <label for="content" class="form-label">目前餐點數量：{{$orderItem->quantity}}</label>
            <br>
            <label for="content" class="form-label">更改成<br>請選擇數量 : </label>
            <select id="quantity" name="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>

        <br>
        <br>
        <br>
        <br>

    </form>
</div>
@endsection
