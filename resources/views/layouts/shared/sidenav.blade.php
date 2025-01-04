<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @foreach($categories as $category)
                <a class="nav-link" href="{{route('sid',$category->id)}}"><!--抓取目前點選的category找出相關meals-->
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    {{$category->name}}
                </a>
                @endforeach
            </div>
        </div>

    </nav>
</div>
