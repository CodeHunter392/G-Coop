<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titre')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">



        <link rel="stylesheet" href="{{ asset('layoutSinone/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ asset('layoutSinone/vendor/owl-carousel/css/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('layoutSinone/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('layoutSinone/css/theme.css') }}">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="layout-top-nav    " style="height: auto; ">
    <div class="back-to-top" style="visibility: visible; "></div>
    <div class="wrapper">



      @include('layoutsWelcome.nav')


        @yield('content')



        @include('layoutsWelcome.footer')

    </div>



    <script src="{{ asset('layoutSinone/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('layoutSinone/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('layoutSinone/vendor/owl-carousel/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('layoutSinone/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('layoutSinone/js/theme.js') }}"></script>











</body>

</html>
