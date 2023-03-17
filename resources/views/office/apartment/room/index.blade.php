<x-office-layout :data="$data">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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
</x-office-layout>
