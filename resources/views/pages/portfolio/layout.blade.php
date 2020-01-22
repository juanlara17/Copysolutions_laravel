<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Copysolutions....</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/jcarousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/navbar-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skins/default.css') }}">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
    <link rel="shortcut icon" href="ico/favicon.png" />
</head>
<body>
    <div class="wrapper">
        {{-- TOOGLE TOP --}}
        @include('pages.wrapper')

        {{-- NAVBAR --}}
        @include('layouts.navbar')


        @yield('content')


        {{-- FOOTER --}}
        @include('layouts.footer')
        <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jcarousel/jquery.jcarousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox-media.js') }}"></script>
    <script src="{{ asset('js/google-code-prettify/prettify.js') }}"></script>
    <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('js/jquery.nivo.slider.js') }}"></script>
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('js/jquery.ba-cond.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slitslider.js') }}"></script>
    <script src="{{ asset('js/animate.js') }}"></script>
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <!-- Contact Form JavaScript File -->
    <script src="{{ asset('js/contactform.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
