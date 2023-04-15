<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('dashboard')" />

            {{ __('Tenants Management') }}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <div class="card">
            @can('apartment.room.tenant.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <button type="button" class="btn btn-icon icon-left" data-bs-toggle="modal"
                        data-bs-target="#createTenantModal">
                        <i class="fas fa-plus"></i>
                        {{ __('Create') }}
                    </button>
                </div>
            @endcan

            <livewire:tenant::admin.tenant.index />
        </div>
    </section>
</x-app-layout>
