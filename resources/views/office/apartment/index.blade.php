<x-office-layout :data="$data">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <x-back :url="route('dashboard')" />

            {{ __('apartment.manage') }}
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </h2>
    </x-slot>

    <div class="layout-top-spacing">
        <div class="card">
            @can('apartment.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <a href="{{ route('office.apartment.create') }}" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i>
                        {{ __('label.create') }}
                    </a>
                </div>
            @endcan

            <livewire:office.apartment.index />
        </div>
    </div>
</x-office-layout>
