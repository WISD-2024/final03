@extends('poster.layouts.master')

@section('page-title', '類別詳情')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">類別詳情</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>

        <div class="row mb-3">
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">類別名稱</label>
                <input name="name" id="name" type="text" class="form-control" value="{{$category->name}}" disabled><!--單行輸入框-->
            </div>


    </div>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{route('poster.categories.edit',$category->id)}}" class="btn btn-primary btn-sm">編輯</a>
            <a href="{{route('poster.categories.index')}}" type="button" class="btn btn-sm btn-secondary">取消</a>
        </div>


</div>
@endsection
