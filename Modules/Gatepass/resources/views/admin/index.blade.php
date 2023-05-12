<x-app-layout :data="$head ?? []">
    <x-slot name="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $head['title'] ?? config('app.name', '') }}
            </li>
        </ol>
    </x-slot>

    <section class="layout-top-spacing">
        <div class="card">
            @can('admin.gatepass.create')
                <div class="card-header">
                    {{-- <!-- Create -->
                    <a type="button" class="btn btn-icon icon-left bg-transparent" data-bs-toggle="modal"
                        data-bs-target="#gatepass-create-modal">
                        <i class="fas fa-plus-circle"></i>
                        {{ __('Create') }}
                    </a> --}}

                    <a type="button" class="btn btn-icon icon-left bg-transparent" data-bs-toggle="modal"
                        data-bs-target="#gatepass-update-modal">
                        <i class="fas fa-rotate fa-spin"></i>
                        {{ __('Update') }}
                    </a>
                </div>
            @endcan

            <livewire:gatepass::admin.index />
        </div>
    </section>

    @push('modals')
        <livewire:gatepass::admin.create-modal />
        <livewire:gatepass::admin.update-modal />
        <livewire:gatepass::admin.edit-modal />
    @endpush
</x-app-layout>
