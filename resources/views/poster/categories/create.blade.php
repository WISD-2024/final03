@extends('poster.layouts.master')

@section('page-title', '新增類別')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">類別管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">新增類別</li>
    </ol>

    <form action="{{route('poster.categories.store')}}" method="post"  enctype="multipart/form-data">
        @method('post')
        <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
        @csrf

        <div class="row mb-3">
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">類別名稱</label>
                <input name="name" id="name" type="text" class="form-control" placeholder="請輸入類別名稱"><!--單行輸入框-->
            </div>

        </div>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>

    </form>

</div>
@endsection
