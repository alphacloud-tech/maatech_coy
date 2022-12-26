
@php
    $favicon = App\Models\Home\Favicon::findOrFail(1);
@endphp

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="keywords" content="Maatech Aluminium & Construction" />
    <meta name="Maatech Aluminium & Construction" content="Maatech Aluminium & Construction" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>@yield('title')</title>
    {{-- {{asset('frontend/maatech/')}} --}}
    <link rel="shortcut icon" href="{{asset($favicon->name)}}" />
    <link rel="stylesheet" href="{{asset('frontend/maatech/css/plugins.css')}} " />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Didact+Gothic&amp;family=Syne:wght@400;500;600;700;800&amp;display=swap">
    <link rel="stylesheet" href="{{asset('frontend/maatech/css/style.css')}} " />
</head>
<body>
    <!-- Preloader -->
    <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div>



    <!-- Navbar -->
    @include("frontend.body.header")


    @yield("home_frontend")

    <!-- Footer -->
    @include("frontend.body.footer")




    <!-- jQuery -->
    <script src="{{asset('frontend/maatech/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/jquery-migrate-3.0.0.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/modernizr-2.6.2.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/jquery.isotope.v3.0.2.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/scrollIt.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/YouTubePopUp.js')}}"></script>
    <script src="{{asset('frontend/maatech/js/custom.js')}}"></script>
</body>

</html>
