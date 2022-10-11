<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SignIn Boxed | CORK - Multipurpose Bootstrap Dashboard Template </title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/src/assets/img/favicon.ico') }}"/>
        <link href="{{ asset('assets/layouts/collapsible-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/layouts/collapsible-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/layouts/collapsible-menu/loader.js') }}"></script>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="{{ asset('assets/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        
        <link href="{{ asset('assets/layouts/collapsible-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/src/assets/css/light/authentication/auth-boxed.css') }}" rel="stylesheet" type="text/css" />
        
        <link href="{{ asset('assets/layouts/collapsible-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/src/assets/css/dark/authentication/auth-boxed.css') }}" rel="stylesheet" type="text/css" />

        <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    </head>
    <body class="form">

        <!-- BEGIN LOADER -->
        <div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
        <!--  END LOADER -->

        <div class="auth-container d-flex">
            <div class="container mx-auto align-self-center">

            {{ $slot }}
            
            </div>
        </div>
        

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="{{ asset('assets/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->
    </body>
</html>
