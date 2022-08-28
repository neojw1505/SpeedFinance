<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SpeedFinance</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
        @yield('before-css')
        {{-- theme css --}}








        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-5.10.1-web/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/metisMenu.min.css') }}">
        <link id="gull-theme" rel="stylesheet" href="{{ asset('assets\fonts\iconsmind\iconsmind.css') }}">
        <link id="gull-theme" rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-blue.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/perfect-scrollbar.css') }}">
        <style>
            .breadcrumb ul li:after {
                position: absolute;
                top: -1px;
                right: 0;
                content: "/";
                height: 16px;
                width: 1px;
                background: transparent;
                border-radius: 5px;
            }
        </style>
        {{-- page specific css --}}
        @yield('page-css')
    </head>






    <body class="text-left">
        @php
        $layout = session('layout');
        @endphp

        <!-- Pre Loader Strat  -->
        <div class='loadscreen' id="preloader">

            <div class="loader spinner-glow spinner-glow-primary">


            </div>
        </div>
        <!-- Pre Loader end  -->







        <!-- ============ Vetical SIdebar Layout start ============= -->
        
        @include('layouts.vertical-sidebar.master')

        <!-- ============ Vetical SIdebar Layout End ============= -->




        <!-- ============ Search UI Start ============= -->
        {{-- @include('layouts.search') --}}
        <!-- ============ Search UI End ============= -->

        <!-- ============ Customizer UI Start ============= -->
        @include('layouts.common.customizer')
        <!-- ============ Customizer UI Start ============= -->



        {{-- common js --}}
        <script src="{{ asset('assets/js/common-bundle-script.js') }}"></script>
        {{-- page specific javascript --}}
        @stack('page-js')

        {{-- theme javascript --}}
        {{-- <script src="{{ mix('assets/js/es5/script.js') }}"></script>
        --}}
        <script src="{{ asset('assets/js/script.js') }}"></script>


    

        <script src="{{ asset('assets/js/tooltip.script.js') }}"></script>
        <script src="{{ asset('assets/js/es5/script_2.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/layout-sidebar-vertical.js') }}"></script>


      



        <script src="{{ asset('assets/js/customizer.script.js') }}"></script>

        {{-- laravel js --}}
        {{-- <script src="{{ mix('assets/js/laravel/app.js') }}"></script>
        --}}

        @yield('bottom-js')
    </body>

</html>