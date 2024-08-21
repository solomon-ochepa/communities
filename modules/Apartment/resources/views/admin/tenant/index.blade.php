<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.apartment.show', ['apartment' => $apartment->id])" />
            {!! __($head['title'] ?? '') !!}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <x-alert />

        <div class="card">
            @can('occupant.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <a type="button" class="btn btn-icon icon-left bg-transparent" data-bs-toggle="modal"
                        data-bs-target="#occupant-create-modal">
                        <i class="fas fa-plus-circle"></i>
                        {{ __('Create') }}
                    </a>
                </div>
                @push('modals')
                    <!-- Room: Create Modal -->
                    <livewire:occupant::admin.modals.create :apartment="$apartment" />
                @endpush
            @endcan

            <livewire:apartment::admin.occupant.index :apartment="$apartment" />
        </div>
    </section>
</x-app-layout>
