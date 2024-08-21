<x-app-layout :data="$head ?? []">
    <x-slot name="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $head['title'] ?? config('app.name', '') }}
            </li>
        </ol>
    </x-slot>

    <div class="layout-top-spacing">
        <div class="card">
            @can('apartment.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <a href="{{ route('admin.apartment.create') }}" class="btn btn-icon icon-left">
                        <i class="fas fa-plus"></i>
                        {{ __('Create') }}
                    </a>
                </div>
            @endcan

            <livewire:community::admin.index />
        </div>
    </div>
</x-app-layout>
