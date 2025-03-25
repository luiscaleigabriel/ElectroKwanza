<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="Ekwanza lojá especializada no comercio de produtos electrónicos" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ElectoKwanza</title>
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body>

    @include('site.partials.header')

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    @yield('content')

    @include('site.partials.footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
    <script src="{{ asset('assets/js/glibox.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('js')
</body>

</html>