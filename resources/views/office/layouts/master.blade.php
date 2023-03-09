<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>
        {!! isset($title) ? $title . ' &middot; ' : '' !!}{{ setting('site_name') }}
    </title>

    <!-- SEO Meta Tags-->
    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon and Touch Icons-->
    <link href="{{ asset('') }}/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180" />
    <link href="{{ asset('') }}/favicon-32x32.png" rel="icon" type="image/png" sizes="32x32" />
    <link href="{{ asset('') }}/favicon-16x16.png" rel="icon" type="image/png" sizes="16x16" />
    <link href="{{ asset('') }}/site.webmanifest" rel="manifest" />
    <link href="{{ asset('') }}/safari-pinned-tab.svg" rel="mask-icon" color="#fe6a6a">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    @vite('resources/js/app.js')

    {{-- Styles --}}
    @livewireStyles

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/@fortawesome/fontawesome-free/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/dist/css/iziToast.min.css') }}">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @stack('css')
</head>

<body>
    <audio id="myAudio1">
        <source src="{{ asset('beep.mp3') }}" type="audio/mpeg">
    </audio>

    <div id="app">
        <div class="main-wrapper">
            <x-app-layout.menu />
            <x-app-layout.sidebar />

            <!-- Main Content -->
            <div class="main-content">
                @yield('main-content')
            </div>

            <x-app-layout.footer />
        </div>
    </div>

    <x-app-layout.scripts />
</body>

</html>
