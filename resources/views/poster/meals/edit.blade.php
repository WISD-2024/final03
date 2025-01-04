@extends('poster.layouts.master')

@section('page-title', '餐點編輯')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">餐點編輯</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>

    <form action="{{route('poster.meals.update',$meal->id)}}" method="post"  enctype="multipart/form-data">
        @method('patch')
        <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
        @csrf
        <div class="row mb-3">
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">餐點名稱</label>
                <input name="name" id="name" type="text" class="form-control" value="{{$meal->name}}" ><!--單行輸入框-->
            </div>

            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">價格</label>
                <input name="price" id="price" type="text" class="form-control" value="{{$meal->price}}" ><!--單行輸入框-->
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">餐點類別</label>
            @foreach($categories as $category)
                <option selected>目前選擇：{{$category->name}}</option>
            @endforeach
            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">

                @foreach( $category_all as $category_name)
                    <option value="{{$category_name->id}}">{{$category_name->name}}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">餐點圖片</label>
            <input type="file" name="image" id="image" accept="image/*" class="form-control">
        </div>
        <div class="md-3">
            <label for="exampleFormControlTextarea1" class="form-label">餐點圖片預覽</label>
            <img src="{{asset('images/'.$meal->image)}}" class="form-control">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
            <a href="{{route('poster.meals.show',$meal->id)}}" type="button" class="btn btn-sm btn-secondary">取消</a>
        </div>
    </form>

</div>
@endsection
