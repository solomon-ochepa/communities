<x-office-layout :data="$data">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('dashboard') }} --}}
            <x-back :url="route('dashboard')" />

            {!! $data['title'] !!}
        </h2>

        {{-- {{ Breadcrumbs::render('menus') }} --}}
    </x-slot>

    <div class="layout-top-spacing">
        <div class="card">
            @can('resident.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <button type="button" class="btn btn-primary btn-icon icon-left" data-bs-toggle="modal"
                        data-bs-target="#create">
                        <i class="fas fa-plus"></i>
                        {{ __('label.create') }}
                    </button>

                    @push('modals')
                        <!-- Create resident Modal -->
                        <livewire:office.resident.create-modal />
                    @endpush
                </div>
            @endcan

            <livewire:office.resident.index />
        </div>
    </div>
</x-office-layout>
