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

    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <!-- Scripts -->
    @vite('resources/js/app.js')

    @production
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @else
        <link rel="stylesheet" href="//cdn.test/font-awesome/6.4.0/css/all.min.css">
    @endproduction

    <link href="/assets/app/layouts/vertical-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="/assets/app/layouts/vertical-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="/assets/app/layouts/vertical-light-menu/loader.js"></script>

    <!-- GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <link href="/assets/app/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/app/layouts/vertical-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/assets/app/layouts/vertical-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />

    <!-- EXTRA -->
    {{-- <link href="/assets/app/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css"> --}}
    <link href="/assets/app/src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css">
    <link href="/assets/app/src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css">

    <!-- PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @stack('css')

    @livewireStyles
</head>

<body class="layout-boxed">
    <x-layouts.app.loader />

    <x-layouts.app.navbar />

    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <livewire:menu::sidebar />

        <!-- Page Content -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">
                    <x-layouts.app.breadcrumbs />

                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="container -fluid mt-3 py-2 rounded shadow-sm">
                            <div class="row">
                                <div class="col-sm-12 border-start border-5">
                                    {{ $header }}
                                </div>
                            </div>
                        </header>
                    @endif

                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    @stack('modals')

    @production
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
            integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @else
        <script src="//cdn.test/font-awesome/6.4.0/js/all.min.js"></script>
    @endproduction

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/assets/app/src/plugins/src/global/vendors.min.js"></script>

    <script src="/assets/app/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/app/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/app/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="/assets/app/src/plugins/src/waves/waves.min.js"></script>
    <script src="/assets/app/layouts/vertical-light-menu/app.js"></script>

    <!-- EXTRA -->
    <script>
        // Enable Popover
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
        // $(document).ready(function() {
        //     $('[data-bs-toggle="popover"]').popover({
        //         html: true,
        //         placement: 'auto left',
        //         trigger: 'hover',
        //         selector: '[data-bs-toggle="popover"]'
        //     });
        // });

        // Enable Tooltip
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        // Enable Toast
        const toastElList = document.querySelectorAll('.toast')
        const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl, option))
    </script>

    {{-- <script src="/assets/app/src/plugins/src/apex/apexcharts.min.js"></script> --}}
    {{-- <script src="/assets/app/src/plugins/src/jquery-ui/jquery-ui.min.js"></script> --}}

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @stack('js')

    @livewireScripts
</body>

</html>
