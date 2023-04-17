<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.apartment.show', $apartment->id)" />

            {{ __('Apartment Rooms Management') }} &middot; {{ $apartment->name }}
        </h2>
    </x-slot>

    <div class="layout-top-spacing">
        <x-alert />

        <div class="card">
            @can('room.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <a type="button" class="cursor-pointer btn bg-transparent btn-icon icon-left" data-bs-toggle="modal"
                        data-bs-target="#room-create-modal">
                        <i class="fas fa-plus-circle"></i>
                        {{ __('Create') }}
                    </a>
                </div>
                @push('modals')
                    <!-- Room: Create Modal -->
                    <livewire:room::admin.create-modal :apartment="$apartment" />
                @endpush
            @endcan

            <livewire:apartment::admin.room.index :apartment="$apartment" />
        </div>
    </div>
</x-app-layout>
