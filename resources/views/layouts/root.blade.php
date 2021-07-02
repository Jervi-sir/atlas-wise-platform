<!DOCTYPE html>
<html class="{{ session('dark-theme') == 1 ? 'dark-layout' : 'light-layout' }} loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Atlas Platforme, Where Elites belongs to, Atlas focus on gathering a community that focuses on providing a suitable envirnment so you can ....">
    <meta name="keywords" content="Atlas, Elites, Entrepreneur, smart, intelligents, club, vision, future,...">
    <meta name="author" content="Jervi, of 2Ks">
    <title>
        @yield('title')
    </title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/atlas/logo3.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/atlas/logo3.png">

    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    @yield('top-styles')
    
</head>

<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    @yield('body')

    @yield('bottom-script')

    <script src="../../assets/js/scripts.js"></script>

</body>

<!-- END: Body-->

</html>