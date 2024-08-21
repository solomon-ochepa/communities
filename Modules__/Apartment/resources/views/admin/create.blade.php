<x-app-layout :data="$head ?? []">
    <x-slot name="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.apartment.index') }}">Apartments</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $head['title'] ?? config('app.name', '') }}
            </li>
        </ol>
    </x-slot>

    <section class="layout-top-spacing">
        <livewire:apartment::admin.create />
    </section>
</x-app-layout>
