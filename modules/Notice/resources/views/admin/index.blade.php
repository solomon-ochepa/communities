<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h3 class="h3 m-0">
            <x-back :url="route('dashboard')" />
            {!! $head['title'] !!}
        </h3>
    </x-slot>

    <div class="layout-top-spacing">
        <div class="card">
            @can('notice.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <a href="{{ route('admin.notice.create') }}" class="btn btn-icon icon-left">
                        <i class="fas fa-plus"></i>
                        {{ __('Create') }}
                    </a>
                </div>
            @endcan

            <livewire:notice::admin.index />
        </div>
    </div>
</x-app-layout>
