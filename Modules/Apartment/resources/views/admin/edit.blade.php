<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.apartment.index')" />
            {{ __($head['title'] ?? '') }}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <livewire:apartment::admin.edit :apartment="$apartment" />
    </section>
</x-app-layout>
