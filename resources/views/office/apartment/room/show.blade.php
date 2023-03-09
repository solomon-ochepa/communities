<x-app-layout :data="$data">
    <section class="section">
        <div class="section-header">
            <h1>
                <x-back :url="route('office.apartment.room.index', ['apartment' => $room->apartment->slug])" />
                {!! $data['title'] ?? $room->apartment->name !!}
            </h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <div class="section-body">
            {{-- Navbar --}}
            @can('resident.create')
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <!-- Create modal -->
                        <a href="{{ route('office.apartment.resident.create', ['apartment' => $room->apartment->slug]) }}"
                            class="btn btn-icon icon-left btn-primary">
                            <i class="fas fa-plus"></i>
                            {{ __('label.create') }}
                        </a>
                    </div>
                </div>
            @endcan

            {{-- Stats --}}
            <div class="row">
                {{-- Residents stats --}}
                <div class="col-md-4">
                    <div class="card card-statistic-1">
                        @can('resident.create')
                            <span class="position-absolute" style="right: 8px; top: 8px;">
                                <!-- Create modal -->
                                <a href="{{ route('office.apartment.resident.create', ['apartment' => $room->apartment->slug]) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </span>
                        @endcan

                        <div class="card-icon card-image bg-primary">
                            <i class="fas fa-users"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('resident.residents') }}</h4>
                            </div>
                            <div class="card-body">
                                {{ $room->apartment->residents->count() }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Visitors stats --}}
                <div class="col-md-4">
                    <div class="card card-statistic-1">
                        <div class="card-icon card-image bg-primary">
                            <i class="fas fa-users"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('visitor.visitors') }}</h4>
                            </div>
                            <div class="card-body">
                                0
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Activities --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Activities</h3>
                        </div>
                        <div class="card-body">
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
