<x-office-layout :data="$data">
    {{-- <div class="section-header">
            <h1>{{ __('menu.menus') }}</h1>
            {{ Breadcrumbs::render('menus') }}
        </div> --}}

    <section class="my-4">
        <livewire:office.menu.index />
    </section>

    {{-- @push('modals')
    <livewire:office.menu.create-modal />
    @endpush --}}

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush

    @push('js')
        <script src="{{ asset('assets/modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/department/index.js') }}"></script>
    @endpush
</x-office-layout>
