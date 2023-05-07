<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('dashboard')" />
            {!! __($head['title'] ?? '') !!}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <div class="card">
            @can('admin.gatepass.create')
                <div class="card-header">
                    <!-- Create -->
                    <a type="button" class="btn btn-icon icon-left bg-transparent" data-bs-toggle="modal"
                        data-bs-target="#gatepass-create-modal">
                        <i class="fas fa-plus-circle"></i>
                        {{ __('Create') }}
                    </a>
                </div>
            @endcan

            <livewire:gatepass::admin.index />
        </div>
    </section>

    @push('modals')
        <livewire:gatepass::admin.create-modal />
        <livewire:gatepass::admin.edit-modal />
    @endpush
</x-app-layout>
