<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SCEO - @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/src/assets/img/logo.png') }}"/>
    <link href="{{ asset('assets/layouts/collapsible-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/layouts/collapsible-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/layouts/collapsible-menu/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('assets/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/layouts/collapsible-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/layouts/collapsible-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    {{-- For alert messages --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/elements/alert.css') }}">
    {{-- end alert messages --}}
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/src/sweetalerts2/sweetalerts2.css') }}">
    <link href="{{ asset('assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/plugins/src/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/custom/js/jquery-3.6.0.js') }}"></script>
    @yield('custom_css_content')
</head>
<body class="layout-boxed alt-menu">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('layouts.admin_layouts.header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sidebar-closed" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">
        
                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="/dashboard">
                                <img src="{{ asset('assets/src/assets/img/logo.png') }}" class="navbar-logo" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="/dashboard" class="nav-link"> SCEO </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                        </div>
                    </div>
                </div>
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu {{ Request::is('user/profile') || Request::is('dashboard') || Request::is('chatify') ? 'active' : '' }}"">
                        <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ Request::is('dashboard') ? 'recent-submenu' : '' }}" id="dashboard" data-bs-parent="#accordionExample">
                            <li class="{{ Request::is('user/profile') ? 'active' : '' }}">
                                <a href="{{ route('profile.show') }}"> Profile </a>
                            </li>
                            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                                <a href="/dashboard"> Analytics </a>
                            </li>
                            <li class="{{ Request::is('chatify') ? 'active' : '' }}">
                                <a href="/chatify"> Messenger </a>
                            </li>
                        </ul>
                    </li>

                    @if(Auth::user()->role->name === 'admin')
                        @include('layouts.admin_layouts.sidebar')

                    @elseif(Auth::user()->role->name === 'Teacher')
                        @include('layouts.teacher_layouts.sidebar')

                    @elseif(Auth::user()->role->name === 'Student')
                        @include('layouts.student_layouts.sidebar')
                    
                    @elseif(Auth::user()->role->name === 'Director')
                        @include('layouts.director_layouts.sidebar')
                        
                    @endif
                    
                </ul>
                
            </nav>
        
        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        @yield('content')
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('assets/layouts/collapsible-menu/app.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    @yield('custom_js_content')
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>