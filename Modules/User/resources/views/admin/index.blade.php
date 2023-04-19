<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('dashboard')" />
            {!! __($head['title'] ?? '') !!}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <div class="card">
            @can('user.create')
                <div class="card-header">
                    <!-- Create -->
                    <a type="button" class="btn btn-icon icon-left bg-transparent" data-bs-toggle="modal"
                        data-bs-target="#tenant-create-modal">
                        <i class="fas fa-plus-circle"></i>
                        {{ __('Create') }}
                    </a>
                </div>
                @push('modals')
                    <!-- Room: Create Modal -->
                    <livewire:tenant::admin.create-modal />
                @endpush
            @endcan

            <livewire:user::admin.index />
        </div>
    </section>
</x-app-layout>
