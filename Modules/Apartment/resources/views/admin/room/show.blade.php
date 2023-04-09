<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.apartment.room.index', ['apartment' => $room->roomable->id])" />
            {!! __($head['title'] ?? '') !!} &middot; {{ $room->roomable->name }}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        {{-- Activities --}}
        <div class="card mb-3">
            <div class="card-header">
                <h3>Activities</h3>
            </div>
            <div class="card-body">
                ...
            </div>
        </div>

        {{-- Tenants --}}
        <div class="card mb-3">
            <div class="card-header d-flex">
                <h3 class="col">{{ __('Tenants') }} ({{ $room->tenants->count() }})</h3>

                @can('apartment.room.tenant.create')
                    <!-- Create modal -->
                    <a href="{{ route('admin.apartment.tenant.create', ['apartment' => $room->roomable->id]) }}"
                        class="col-auto btn btn-icon icon-left">
                        <i class="fas fa-plus"></i>
                        {{ __('Create') }}
                    </a>
                @endcan
            </div>

            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-4">
                        <a class="card style-7"
                            href="https://themeforest.net/item/cork-responsive-admin-dashboard-template/25582188"
                            target="_blank">
                            <img src="/assets/app/src/assets/img/ecommerce-1.jpg" class="card-img-top" alt="...">
                            <div class="card-footer">
                                <h5 class="card-title mb-0">Kelly Young</h5>
                                <p class="card-text">Project manager</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Visitors --}}
        <div class="card mb-3">
            <div class="card-header d-flex">
                <h3 class="col">{{ __('Visitors') }} ({{ $room->tenants->count() }})</h3>
            </div>

            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-4">
                        <a class="card style-7"
                            href="https://themeforest.net/item/cork-responsive-admin-dashboard-template/25582188"
                            target="_blank">
                            <img src="/assets/app/src/assets/img/tl-2.jpg" class="card-img-top" alt="...">
                            <div class="card-footer">
                                <h5 class="card-title mb-0">Kelly Young</h5>
                                <p class="card-text">Project manager</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
