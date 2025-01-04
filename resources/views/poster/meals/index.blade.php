@extends('poster.layouts.master')

@section('page-title', '餐點列表')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">餐點管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">餐點一覽表</li>
        </ol>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{route('poster.meals.create')}}">新增</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">餐點名稱</th>
                <th scope="col">功能</th>
            </tr>
            </thead>

            <tbody>
{{--            @foreach($meals as $meal)<!--陣列內有幾筆資料就會重複執行幾次-->--}}
            <tr>
                <th scope="row" style="width: 50px"></th>
                <td></td>
                <td style="width: 150px">

                    <a href="" class="btn btn-primary btn-sm">詳細資料</a>
                    <form action="" method="post" style="display: inline-block">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                    </form>

                </td>
            </tr>
{{--            @endforeach--}}
            </tbody>

        </table>

    </div>
@endsection
