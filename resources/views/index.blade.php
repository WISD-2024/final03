@extends('layouts.master')

@section('page-title', '首頁')

@section('page-content')

    @if($meals->isNotEmpty())<!--搜尋到相關資料-->
    <!--內容-->
    <div class=" px-lg-5" id="nav-tabContent">
        <!--陣列內有幾筆資料就會重複執行幾次-->
        <div class="tab-pane fade show active " id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
            <section class="pt-4">
                <div class="container px-lg-5">
                    <!-- Page Features-->
                    <div class="row gx-lg-5  px-lg-5">
                        @foreach($meals as $meal)
                            <div class="col-lg-6 col-xxl-4 mb-5 pt-5">
                                <div class="card bg-light border-0 h-100 ">
                                    <!--圖片-->
                                    <img src="{{asset('images/'.$meal->image)}}">
                                    <div class="card-body text-center p-lg-5  pt-lg-0 pt-5">
                                        <h2 class="fs-4 fw-bold pt-5">{{$meal->name}}</h2>
                                        <p class="mb-0">價格：{{$meal->price}}</p>
                                        <a href="{{route('order.OrderItem.create',$meal)}}" class="stretched-link"></a><!--點擊頁籤-->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </section>
        </div>
        @else<!--無搜尋到相關資料-->
            <div class="position-absolute top-50 start-50 translate-middle">
                <h2>查無資料，請重新查詢.</h2>
            </div>
    @endif
@endsection
