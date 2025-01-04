@extends('poster.layouts.master')

@section('page-title', '類別編輯')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">類別編輯</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>

    <form action="{{route('poster.categories.update',$category->id)}}" method="post"  enctype="multipart/form-data">
        @method('patch')
        <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
        @csrf
        <div class="row mb-3">
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">類別名稱</label>
                <input name="name" id="name" type="text" class="form-control" value="{{$category->name}}" ><!--單行輸入框-->
            </div>

        </div>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

            <a href="{{route('poster.categories.index',$category->id)}}" type="button" class="btn btn-sm btn-secondary">取消</a>
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>
    </form>

</div>
@endsection
