@extends('layouts.root')

@section('body')
    
    <!-- BEGIN: Header-->
    @include('components.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('components.sideBar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            @yield('content')
            
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('components.footer')
    <!-- END: Footer-->


@endsection
