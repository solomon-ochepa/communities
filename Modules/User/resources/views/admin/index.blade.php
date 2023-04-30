<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('dashboard')" />
            {!! __($head['title'] ?? '') !!}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <div class="card">
            @can('users.create')
                <div class="card-header">
                    <!-- Create -->
                    <a type="button" class="btn btn-icon icon-left bg-transparent" data-bs-toggle="modal"
                        data-bs-target="#user-create-modal">
                        <i class="fas fa-plus-circle"></i>
                        {{ __('Create') }}
                    </a>
                </div>
            @endcan

            <livewire:user::admin.index />
        </div>
    </section>

    @push('modals')
        <livewire:user::admin.create-modal />
        <livewire:user::admin.edit-modal />
    @endpush
</x-app-layout>
