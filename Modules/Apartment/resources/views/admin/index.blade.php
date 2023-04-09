<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('dashboard')" />

            {{ __('Apartments Management') }}
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </h2>
    </x-slot>

    <div class="layout-top-spacing">
        <div class="card">
            @can('apartment.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <a href="{{ route('admin.apartment.create') }}" class="btn btn-icon icon-left">
                        <i class="fas fa-plus"></i>
                        {{ __('Create') }}
                    </a>
                </div>
            @endcan

            <livewire:apartment::admin.index />
        </div>
    </div>
</x-app-layout>
