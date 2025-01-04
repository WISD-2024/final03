@extends('poster.layouts.master')

@section('page-title', '餐點列表')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">訂單管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">訂單一覽表</li>
        </ol>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="">新增</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">訂單名稱</th>
                <th scope="col">功能</th>
            </tr>
            </thead>

            <tbody>


                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@123">刪除</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="" data-bs-whatever="@123">刪除</button>
                    <div class="modal fade" id="" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="{{route('poster.meals.destroy',$meal->id)}}" method="post" >
                            @method('delete')
                            <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
                            @csrf

                        <!--互動視窗-->
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!--標題-->
                                <div class="modal-header">
                                    <h5 class="modal-title">刪除餐點</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <p>確定要刪除 {{$meal->name}} 嗎?</p>
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
