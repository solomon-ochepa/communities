<!-- Simplicity is an acquired taste. - Katharine Gerould -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>
        {!! isset($data['title']) ? $data['title'] . ' &middot; ' : '' !!}{{ setting('site_name') }}
    </title>

    <!-- SEO Meta Tags-->
    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon and Touch Icons-->
    <link href="{{ asset('') }}/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180" />
    <link href="{{ asset('') }}/favicon-32x32.png" rel="icon" type="image/png" sizes="32x32" />
    <link href="{{ asset('') }}/favicon-16x16.png" rel="icon" type="image/png" sizes="16x16" />
    <link href="{{ asset('') }}/site.webmanifest" rel="manifest" />
    <link href="{{ asset('') }}/safari-pinned-tab.svg" rel="mask-icon" color="#fe6a6a">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Styles -->
    {{-- @livewireStyles --}}

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    @stack('css')
</head>

<body>
    <main id="app">
        {{ $slot }}
    </main>

    {{-- Modals --}}
    @stack('modals')

    {{-- Scripts --}}
    {{-- @livewireScripts --}}

    {{-- Required --}}
    <script src="{{ asset('frontend/frontend/js/jquery.js') }}"></script>

    <script src="{{ asset('frontend/js/demo-login.js') }}"></script>

    @stack('js')
</body>

</html>
