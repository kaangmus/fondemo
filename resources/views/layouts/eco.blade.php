<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{settings('app_name')}}</title>
    <link rel="icon" href="{{ settings('favicon') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fancybox.min.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
</head>

<body>
    @include('partials.header')


    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('js/jquery-1.12.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fancybox.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
  
    
    
</body>

</html>