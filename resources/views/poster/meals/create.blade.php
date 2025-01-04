@extends('poster.layouts.master')

@section('page-title', '新增餐點')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">餐點管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">新增餐點</li>
    </ol>

    <form action="{{route('poster.meals.store')}}" method="post"  enctype="multipart/form-data">
        @method('post')
        <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
        @csrf

        <div class="row mb-3">
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">餐點名稱</label>
                <input name="name" id="name" type="text" class="form-control" placeholder="請輸入餐點名稱"><!--單行輸入框-->
            </div>

            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">價格</label>
                <input name="price" id="price" type="text" class="form-control" placeholder="請輸入餐點價格"><!--單行輸入框-->
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">餐點類別</label>
            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                    <option selected>選擇餐點類別</option>
                <!--迴圈抓取categories資料表資料-->
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">餐點圖片</label>
            <input type="file" name="image" id="image" accept="image/*" class="form-control" >
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>

    </form>

</div>
@endsection
