@extends('layouts.master_nosib')

@section('page-title', 'Create article')

@section('page-content')

<div class="container-fluid px-4">
    <br>
    <br>
    <h1 class="mt-4">餐點資訊</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">新增餐點</li>
    </ol>


    <br>
    <form action="{{route('order.OrderItem.store',$meal->id)}}" method="POST" role="form">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">餐點名稱：{{$meal->name}}</label>
            <br>
            <label for="title" class="form-label">餐點單價：{{$meal->price}}</label>
            <br>
            <label for="title" class="form-label">餐點相片：</label>
            <img src="{{asset('images/'.$meal->image)}}">
            <br>
            <br>
            <label for="content" class="form-label">餐點數量：</label>
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
        <div class="text-right">
            <button class="btn btn-primary btn-sm" type="submit" onclick="add()">儲存</button>
        </div>
        <br>
        <br>
        <br>
        <br>

        <script>
            function add(){
            window.alert("新增完成 !");
            }
        </script>

    </form>
</div>
@endsection
