<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('office.apartment.show', $apartment->slug)" />

            {{ __('room.rooms') }} &middot; {{ $apartment->name }}
        </h2>
    </x-slot>

    <div class="layout-top-spacing">
        <div class="card">
            @can('room.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <a href="{{ route('office.apartment.room.create', ['apartment' => $apartment->slug]) }}"
                        class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i>
                        {{ __('label.create') }}
                    </a>
                </div>
            @endcan

            <livewire:office.apartment.room.index :apartment="$apartment" />
        </div>
    </div>
</x-app-layout>
