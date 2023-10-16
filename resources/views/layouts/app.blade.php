<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body id="body-pd">
<header class="header" id="header">
    <div class="header_toggle"><i class='bi bi-three-dots-vertical' id="header-toggle"></i></div>
    @auth()
        <div>{{auth()->user()->name}}</div>
    @endauth
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="/home" class="nav_logo">
                <i class="bi bi-threads text-light"></i>
                <span class="nav_logo-name">Threadsta</span>
            </a>
            <div class="nav_list">

            </div>
        </div>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="nav_link btn">
                <i class='bi bi-box-arrow-left'></i>
                <span class="nav_name">SignOut</span>
            </button>
        </form>
    </nav>
</div>
<!--Container Main start-->
<div class="height-100 bg-light">
    <div style="height: 5rem; background-color: transparent"></div>
        @yield('content')
</div>
</body>
