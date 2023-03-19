<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/')}}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/mdb.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/sidenav.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/responsive.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/datatables.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/datatables-select.min.css">
</head>
<body class="fix-header fix-sidebar">

@include('Layout.menu')
@yield('content')






    {{--All JavaScript Link --}}

<script src="{{asset('/')}}assets/js/jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/popper.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/mdb.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/sidebarmenu.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/sticky-kit.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/custom.min-2.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/datatables.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/datatables-select.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/custom.js"></script>
<script type="text/javascript" src="{{asset('/')}}assets/js/axios.min.js"></script>

@yield('script')
</body>
</html>
