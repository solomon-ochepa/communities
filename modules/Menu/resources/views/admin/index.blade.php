<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('dashboard')" />
            {!! __($head['title'] ?? '') !!}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <x-alert />

        <livewire:menu::admin.index />
    </section>
</x-app-layout>
