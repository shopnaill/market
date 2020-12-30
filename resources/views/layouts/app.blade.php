<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rajdhani:400,600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <!-- Styles -->
        <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/product.css') }}" rel="stylesheet">


     <style type="text/css">
     body
     {
         font-family: 'Cairo', sans-serif;

     }
     .backpack.dropzone {
         font-family: 'Cairo', sans-serif;
     font-size: 15px;
     text-align: center;
     display: flex;
     flex-direction: column;
     justify-content: center;
     align-items: center;
     width: 250px;
     height: 150px;
     font-weight: lighter;
     color: white;
     will-change: right;
     z-index: 2147483647;
     bottom: 20%;
     background: #333;
     position: fixed;
     user-select: none;
     transition: left .5s, right .5s;
     right: 0px; }
     .backpack.dropzone .animation {
       height: 80px;
       width: 250px;
     .backpack.dropzone .title::before {
       content: 'Save to'; }
     .backpack.dropzone.closed {
       right: -250px; }
     .backpack.dropzone.hover .animation {
       animation: sxt-play-anim-hover 0.91s steps(21);
       animation-fill-mode: forwards;

   @keyframes sxt-play-anim-hover {
     from {
       background-position: 0px; }
     to {
       background-position: -5250px; } }
     .backpack.dropzone.saving .title::before {
       content: 'Saving to'; }
     .backpack.dropzone.saving .animation {
       animation: sxt-play-anim-saving steps(59) 2.46s infinite; }

   @keyframes sxt-play-anim-saving {
     100% {
       background-position: -14750px; } }
     .backpack.dropzone.saved .title::before {
       content: 'Saved to'; }
     .backpack.dropzone.saved .animation {
       animation: sxt-play-anim-saved steps(20) 0.83s forwards; }

   @keyframes sxt-play-anim-saved {
     100% {
       background-position: -5000px; } }
   </style>

</head>
<body>
    <div id="app">

        @include('layouts.navbar')
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <form action="{{route('search')}}" class="form-inline my-2 my-lg-0">
                        <input value="@if(isset($_GET['keyword'])){{$_GET['keyword']}}@endif" class="form-control mr-sm-2" type="search" placeholder="بحث عن منتج" name="keyword" aria-label="Search">
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">بحث</button>
                    </form>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('دخول') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('التسجيل') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin') }}" >
                                        {{ __('لوحة التحكم') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile') }}" >
                                        {{ __('الملف الشخصي') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="margin-top: -20px;">
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')
    @yield('pagescripts')

</body>
</html>
