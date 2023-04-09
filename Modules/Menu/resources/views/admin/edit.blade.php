<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.menu.index')" />
            {!! __($head['title'] ?? '') !!}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <livewire:menu::admin.create :menu="$menu" />
    </section>
</x-app-layout>
