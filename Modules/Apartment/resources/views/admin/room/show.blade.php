<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.apartment.room.index', ['apartment' => $room->roomable->id])" />
            {!! __($head['title'] ?? '') !!} &middot; {{ $room->roomable->name }}
        </h2>
    </x-slot>

    <section class="layout-top-spacing mb-3">
        {{-- Activities --}}
        <div class="card mb-3">
            <div class="card-header">
                <h3>Activities</h3>
            </div>
            <div class="card-body">
                ...
            </div>
        </div>

        {{-- Visitors --}}
        <div class="card mb-3">
            <div class="card-header d-flex">
                <h3 class="col">{{ __('Visitors') }} (0)</h3>
            </div>

            <div class="card-body">
                <div class="row gy-3">
                    <p class="text-center py-4">No record found.</p>
                </div>
            </div>
        </div>

        {{-- Tenants --}}
        <div class="card mb-3">
            <div class="card-header d-flex">
                <h3 class="col m-0">{{ __('Tenants') }} ({{ $room->tenants->count() }})</h3>

                @can('tenant.create')
                    <!-- Create modal -->
                    <button type="button" class="col-auto btn btn-icon icon-left" data-bs-toggle="modal"
                        data-bs-target="#tenant-create-modal">
                        <i class="fas fa-plus"></i>
                        {{ __('Create') }}
                    </button>
                @endcan
            </div>

            <div class="card-body">
                <div class="row gy-3">
                    @forelse ($room->tenants as $tenant)
                        <x-tenant::admin.tenant :tenant="$tenant" />
                    @empty
                        <p class="text-center py-4">No record found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    @push('modals')
        <!-- Modal -->
        <livewire:tenant::admin.create-modal :room="$room" />
    @endpush
</x-app-layout>
