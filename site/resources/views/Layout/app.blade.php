<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="" rel="stylesheet">
    <link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet" >
    <link href="{{asset('/')}}assets/css/custom.css" rel="stylesheet" >
    <link href="{{asset('/')}}assets/css/responsive.css" rel="stylesheet" >
    <link href="{{asset('/')}}assets/css/owl.carousel.min.css" rel="stylesheet" >
    <link href="{{asset('/')}}assets/css/fontawesome.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/css/animate.css" rel="stylesheet">
</head>
<body>


@include('Layout.menu')
@yield('content')



{{--All JavaScript Link --}}
<script type="text/javascript" src="{{asset('/')}}assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/popper.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/axios.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/custom.js"></script>
</body>
</html>
