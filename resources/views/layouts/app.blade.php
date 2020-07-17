<!doctype html>
<html lang="en">
<head>
    @stack('styles_before')
    <title>JobBoard &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="{{url('/assets')}}/ftco-32x32.png">

    <link rel="stylesheet" href="{{url('/assets')}}/css/custom-bs.css">
    <link rel="stylesheet" href="{{url('/assets')}}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{url('/assets')}}/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{url('/assets')}}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{url('/assets')}}/fonts/line-icons/style.css">
    <link rel="stylesheet" href="{{url('/assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('/assets')}}/css/animate.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{url('/assets')}}/css/style.css">
    @stack('styles_after')
    @stack('scripts')
</head>
<body id="top">

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>


<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6"><a href="{{url('/')}}">Contacts</a></div>
                <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                    <div class="ml-auto">
                        @if(Auth::check())
                            <a href="{{url('/logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Выход</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{csrf_field()}}
                            </form>
                        @else
                            <a href="{{url('/register')}}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-sign-in"></span>Регистрация</a>
                            <a href="{{url('/login')}}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Вход</a>
                        @endif
                    </div>
                    <a href="{{url('/')}}" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                </div>

            </div>
        </div>
    </header>
    <!-- HOME -->
    @yield('content')


</div>

<!-- SCRIPTS -->
<script src="{{url('/assets')}}/js/jquery.min.js"></script>
<script src="{{url('/assets')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/assets')}}/js/isotope.pkgd.min.js"></script>
<script src="{{url('/assets')}}/js/stickyfill.min.js"></script>
<script src="{{url('/assets')}}/js/jquery.fancybox.min.js"></script>
<script src="{{url('/assets')}}/js/jquery.easing.1.3.js"></script>

<script src="{{url('/assets')}}/js/jquery.waypoints.min.js"></script>
<script src="{{url('/assets')}}/js/jquery.animateNumber.min.js"></script>
<script src="{{url('/assets')}}/js/owl.carousel.min.js"></script>

<script src="{{url('/assets')}}/js/bootstrap-select.min.js"></script>

<script src="{{url('/assets')}}/js/custom.js"></script>


@stack('scripts')
</body>
</html>
