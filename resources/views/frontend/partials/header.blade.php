<!--== Header Area Start ==-->
<header id="header-area" class="fixed-top">
    <!--== Header Top Start ==-->
    <div id="header-top" class="d-none d-xl-block">
        <div class="container">
            <div class="row">
                <!--== Single HeaderTop Start ==-->
                <div class="col-lg-4 text-left">
                    <i class="fa fa-map-marker"></i> 802/2, Mirpur, Dhaka
                </div>
                <!--== Single HeaderTop End ==-->

                <!--== Single HeaderTop Start ==-->
                <div class="col-lg-4 text-center">
                    <i class="fa fa-mobile"></i> +1 800 345 678
                </div>
                <!--== Single HeaderTop End ==-->

                <!--== Social Icons Start ==-->
                <div class="col-lg-4 text-right">
                    <div class="header-social-icons">
                        <a href="#"><i class="fa fa-behance"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <!--== Social Icons End ==-->
            </div>
        </div>
    </div>
    <!--== Header Top End ==-->

    <!--== Header Bottom Start ==-->
    <div id="header-bottom">
        <div class="container">
            <div class="row">
                <!--== Logo Start ==-->
                <div class="col-lg-4">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('assets') }}\frontend/img/logo.png" alt="JSOFT">
                    </a>
                </div>
                <!--== Logo End ==-->

                <!--== Main Menu Start ==-->
                <div class="col-lg-8 d-none d-xl-block">
                    <nav class="mainmenu alignright">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">Home</a>
                            </li>
                            <li><a href="#">About</a></li>
                            <li><a href="{{ route('home.search') }}">Cars</a></li>
                            <li><a href="{{ route('home.contact') }}">Contact</a></li>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                @if(\Illuminate\Support\Facades\Auth::user()->role=='1')
                                    <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                @elseif(\Illuminate\Support\Facades\Auth::user()->role=='2')
                                    <li><a href="{{ route('carOwner.index') }}">Dashboard</a></li>
                                @endif
                                <li><a href="">My Orders</a></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <!--== Main Menu End ==-->
            </div>
        </div>
    </div>
    <!--== Header Bottom End ==-->
</header>
<!--== Header Area End ==-->
