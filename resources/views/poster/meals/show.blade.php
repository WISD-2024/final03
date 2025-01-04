@extends('poster.layouts.master')

@section('page-title', '餐點詳情')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">餐點詳情</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>

        <div class="row mb-3">
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">餐點名稱</label>
                <input name="name" id="name" type="text" class="form-control" value="{{$meal->name}}" disabled><!--單行輸入框-->
            </div>

            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">價格</label>
                <input name="price" id="price" type="text" class="form-control" value="{{$meal->price}}" disabled><!--單行輸入框-->
            </div>
        </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">餐點類別</label>
        <select class="form-select" aria-label="Default select example" name="category_id" id="category_id" disabled>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

        <div class="md-3">
            <label for="exampleFormControlTextarea1" class="form-label">餐點圖片</label>
            <img src=" {{asset('images/'.$meal->image)}}" class="form-control ">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{route('poster.meals.edit',$meal->id)}}" class="btn btn-primary btn-sm">編輯</a>
            <a href="{{route('poster.meals.index')}}" type="button" class="btn btn-sm btn-secondary">取消</a>
        </div>


</div>
@endsection
