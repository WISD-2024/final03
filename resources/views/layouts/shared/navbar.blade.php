<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{route('home')}}">快炒點餐</a>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
    </form>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="tbadge bg-light text-dark ">Dashboard</a>
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
