@extends('layouts.master_nosib')

@section('page-title', 'Create article')

@section('page-content')

    <div class="container-fluid px-4">
        <br>
        <br>
        <h1 class="mt-4">結帳</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">新增付費資訊</li>
        </ol>

        <br>
        <form action="{{route('orders.orders.store',$order->id)}}" method="POST" role="form">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">總金額：{{$order->total}}</label>
                <div>
                    <label for="content" class="form-label">用餐方式：</label>
                    <input type="radio" name="way" value="0" checked>內用
                    <input type="radio" name="way" value="1">外帶
                </div>
                <label for="num" class="form-label">信用卡號碼：</label>
                <input type="text">
                <br>
                <label for="num3" class="form-label">驗證碼三碼：</label>
                <input type="text">
                <br>
                <label for="enddate" class="form-label">卡片到期日：</label>
                <input type="text">
                <br>

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
                    window.alert("結帳完成 !");
                }
            </script>

        </form>
    </div>
@endsection
