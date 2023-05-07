<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('dashboard')" />

            {!! __($head['title'] ?? '') !!}
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </h2>
    </x-slot>

    <div class="layout-top-spacing">
        <div class="card">
            @can('admin.vehicle.create')
                <div class="card-header">
                    <a type="button" class="btn btn-icon icon-left bg-transparent" data-bs-toggle="modal"
                        data-bs-target="#vehicle-create-modal">
                        <i class="fas fa-plus-circle"></i>
                        {{ __('Add Vehicle') }}
                    </a>
                </div>
            @endcan

            <livewire:vehicle::admin.index />
        </div>
    </div>

    @push('modals')
        <livewire:vehicle::admin.create-modal />
        <livewire:vehicle::admin.edit-modal />
    @endpush
</x-app-layout>
