<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.visit.index')" />

            {!! __($head['title'] ?? '') !!}
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </h2>
    </x-slot>

    <div class="layout-top-spacing">
        <div class="card">
            <livewire:visitor::visit.admin.index :visitor="$visitor" />
        </div>
    </div>

    @push('css')
        <link href="/assets/app/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
        <link href="/assets/app/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
        <link href="/assets/app/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    @endpush
    @push('js')
        <script src="/assets/app/src/plugins/src/apex/apexcharts.min.js"></script>
        <script src="/assets/app/src/assets/js/dashboard/dash_1.js"></script>
    @endpush
</x-app-layout>
