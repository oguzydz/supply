<div class="navbar-area fixed-top">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('index') }}" class="logo">
            <img src="{{ asset($logo) }}" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav three menu-shrink">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset($logo) }}" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item">
                            <span class="tooltip-span">Hot</span>
                            <a href="{{ route('requests') }}" class="nav-link">Requests</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">For Suppliers</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                    <div class="side-nav three">

                        @auth
                            @if (Auth::user()->id === 1)
                                <a class="job-right" href="{{ route('dashboard.users') }}">
                                    Dashboard
                                    <i class='bx bx-plus'></i>
                                </a>
                            @endif
                            <a class="job-right" href="{{ route('createRequest') }}">
                                Submit a Request
                                <i class='bx bx-plus'></i>
                            </a>
                            <a class="job-right" href="{{ route('profile') }}">
                                Account
                                <i class='bx bx-user-circle'></i>
                            </a>
                        @endauth

                        @guest
                            @if (Route::has('login'))
                                <a class="login-left" href="{{ route('register') }}">
                                    <i class="flaticon-enter"></i>
                                    Register
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a class="login-left" href="{{ route('login') }}">
                                    <i class="bx bx-log-in-circle"></i>
                                    Login
                                </a>
                            @endif
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
