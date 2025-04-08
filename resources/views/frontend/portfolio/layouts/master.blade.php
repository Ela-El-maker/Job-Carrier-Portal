<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    {{-- <titl e>Modern & Minimal Resume / CV & vCard Template</title> --}}


    <!--==		==		=================================================
   CSS Stylesheets
  =====================================================-->
    <link rel='stylesheet' type='text/css' href='{{ asset('frontend/portfolio/bootstrap/css/bootstrap.min.css') }}'>
    <link rel='stylesheet' type='text/css' href='{{ asset('frontend/portfolio/css/linea.css') }}'>
    <link rel='stylesheet' type='text/css' href='{{ asset('frontend/portfolio/css/ionicons.min.css') }}'>
    <link rel='stylesheet' type='text/css' href='{{ asset('frontend/portfolio/css/owl.carousel.css') }}'>
    <link rel='stylesheet' type='text/css' href='{{ asset('frontend/portfolio/css/magnific-popup.css') }}'>
    <link rel='stylesheet' type='text/css' href='{{ asset('frontend/portfolio/css/style.css') }}'>

</head>

<body>


    <!--===================================================
        Preloader
        =====================================================-->
    <div id='preloader'>
        <div class='loader'></div>
        <div class='left'></div>
        <div class='right'></div>
    </div>


    <div class='main-content'>
        <!--=====================================================
            Page Borders
            =====================================================-->
        <div class='page-border border-left'></div>
        <div class='page-border border-right'></div>
        <div class='page-border border-top'></div>
        <div class='page-border border-bottom'></div>



        <!--=================================================
            Menu Button
            =====================================================-->
        <a href='#' class='menu-btn'>
            <span class='lines'>
                <span class='l1'></span>
                <span class='l2'></span>
                <span class='l3'></span>
            </span>
        </a>


        <!--=====================================================
        Menu
        =====================================================-->
        @include('frontend.portfolio.layouts.menu')

        @yield('content')

    </div>


    <!--
    =====================================================
   JavaScript Files
  =====================================================-->
    <script src='{{ asset('frontend/portfolio/js/jquery.min.js') }}'></script>
    <script src='{{ asset('frontend/portfolio/js/jquery.shuffle.min.js') }}'></script>
    <script src='{{ asset('frontend/portfolio/js/owl.carousel.min.js') }}'></script>
    <script src='{{ asset('frontend/portfolio/js/jquery.magnific-popup.min.js') }}'></script>
    <script src='{{ asset('frontend/portfolio/js/validator.min.js') }}'></script>
    <script src='{{ asset('frontend/portfolio/js/script.js') }}'></script>
</body>

</html>
