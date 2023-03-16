<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @isset($title)
            {{ $title }} &middot;
        @endisset {{ config('app.name', 'Laravel') }}
    </title>

    <meta name="description" content="{{ $description ?? '' }}">

    <!-- Scripts -->
    @vite('resources/js/app.js')

    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    @production
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @else
        <link rel="stylesheet" href="//cdn.test/font-awesome/6.1.2/css/all.min.css">
    @endproduction

    <link href="/assets/app/layouts/vertical-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="/assets/app/layouts/vertical-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="/assets/app/layouts/vertical-light-menu/loader.js"></script>

    <!-- GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <link href="/assets/app/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/app/layouts/vertical-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/assets/app/layouts/vertical-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />

    <!-- PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="/assets/app/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="/assets/app/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="/assets/app/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />

    @livewireStyles
</head>

<body class="layout-boxed">
    <x-layouts.app.loader />

    <x-layouts.app.navbar />

    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <livewire:layouts.app.sidebar />

        <!-- Page Content -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">
                    <x-layouts.app.breadcrumbs />

                    {{ $slot }}
                </div>
            </div>
        </div>

        <!-- Page Heading -->
        {{-- @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif --}}

    </div>

    @stack('modals')

    @production
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"
            integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @else
        <script src="//cdn.test/font-awesome/6.1.2/js/all.min.js"></script>
    @endproduction

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/assets/app/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/app/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/app/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="/assets/app/src/plugins/src/waves/waves.min.js"></script>
    <script src="/assets/app/layouts/vertical-light-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="/assets/app/src/plugins/src/apex/apexcharts.min.js"></script>
    <script src="/assets/app/src/assets/js/dashboard/dash_1.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    @livewireScripts

    @stack('js')
</body>

</html>
