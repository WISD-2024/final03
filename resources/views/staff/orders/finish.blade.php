@extends('staff.layouts.master')

@section('page-title', '歷史訂單列表')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">歷史訂單</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">歷史訂單一覽表</li>
        </ol>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">完成時間</th>
                <th scope="col">顧客</th>
                <th scope="col">功能</th>
            </tr>
            </thead>

            <tbody>
            @foreach($orders as $order)<!--陣列內有幾筆資料就會重複執行幾次-->
            <tr>
                <th scope="row" style="width: 50px">{{$order->id}}</th>
                <td>{{$order->starttime}}</td>
                <td>{{$order->user->name}}</td>
                <td style="width: 150px">

                    <a href="{{route('staff.orders.show',$order->id)}}" class="btn btn-primary btn-sm">詳細資料</a>




                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#category{{$order->id}}" data-bs-whatever="@123">刪除</button>
                    <div class="modal fade" id="category{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="{{route('staff.orders.destroy',$order->id)}}" method="post" >
                            @method('delete')
                            <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
                            @csrf
                            <!--互動視窗-->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!--標題-->
                                    <div class="modal-header">
                                        <h5 class="modal-title">刪除歷史訂單</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>確定要刪除第 {{$order->id}} 筆訂單嗎?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">取消</button>
                                        <button type="submit" class="btn btn-sm btn-danger">確定</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                </td>
            </tr>
            @endforeach
            </tbody>

        </table>

    </div>
@endsection
