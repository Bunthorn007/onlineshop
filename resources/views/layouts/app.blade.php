<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" sizes="16x16">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" >
    <link rel="stylesheet" href="{{mix('css/libs.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar.min.css')}}">
    @yield('header')

</head>
<body class="layout layout-header-fixed layout-sidebar-fixed">
<div class="layout-header">

    @include('layouts.navbar-header')

</div>
<div class="layout-main">

    @include('layouts.sidebar')

    <div class="layout-content">
        <div class="layout-content-body">

            @yield('content')

        </div>
    </div>
    @yield('modal')

    <div class="layout-footer">
        <div class="layout-footer-body">
            <small class="version">Developer : Bunthorn-KH</small>
            <small class="copyright">2018 &copy; Onlineshop</small>
        </div>
    </div>
</div>

<script src="{{mix('js/libs.js')}}"></script>
@yield('footer')

</body>
</html>