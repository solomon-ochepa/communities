<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.apartment.room.index', $apartment->id)" />
            {!! __($head['title'] ?? '') !!} &middot; {{ $apartment->name }}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <livewire:apartment::admin.room.create :apartment="$apartment" />
    </section>
</x-app-layout>
