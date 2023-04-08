<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.apartment.index')" />

            {{ __('Create Apartment') }}
        </h2>
    </x-slot>

    <livewire:apartment::admin.create />
</x-app-layout>
