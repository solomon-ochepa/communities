<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.apartment.show', $apartment->slug)" />

            {{ __('Apartment Rooms Management') }} &middot; {{ $apartment->name }}
        </h2>
    </x-slot>

    <div class="layout-top-spacing">
        <div class="card">
            @can('room.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <a href="{{ route('admin.apartment.room.create', ['apartment' => $apartment->slug]) }}"
                        class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i>
                        {{ __('Create') }}
                    </a>
                </div>
            @endcan

            <livewire:apartment::admin.room.index :apartment="$apartment" />
        </div>
    </div>
</x-app-layout>
