<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{route('home')}}">比薩點餐</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 " action="{{route('search')}}" method="get">
        <div class="input-group">
            <input type="text" class="input-text" style="width:250px" placeholder="輸入餐點名稱"  name="search" id="search">
            <button type="submit" class="btn btn-success">搜尋</button>
        </div>
    </form>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                    {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('登出') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                        <a href="{{route('order.OrderItem.index')}}" class="tbadge bg-light text-dark "> {{ Auth::user()->name }}的訂單</a>
                    @else
                        <a href="{{ route('login') }}" class="badge bg-light text-dark ">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="badge bg-light text-dark">Register</a>
                        @endif
                    @endauth
                </div>
        @endif
    </ul>

</nav>
