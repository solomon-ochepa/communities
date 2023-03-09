<x-app-layout :data="$data">
    <section class="section">
        <div class="section-header">
            <h1>
                <x-back :url="route('office.apartment.index')" />
                {!! $data['title'] ?? $apartment->name !!}
            </h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <div class="section-body">
            {{-- Stats --}}
            <div class="row">
                {{-- Rooms stats --}}
                <div class="col-md-4">
                    <a href="{{ route('office.apartment.room.index', ['apartment' => $apartment]) }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon card-image bg-primary">
                                <i class="fas fa-home"></i>
                            </div>

                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('room.rooms') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $apartment->rooms->count() }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Residents stats --}}
                <div class="col-md-4">
                    <a href="{{ route('office.apartment.resident.index', ['apartment' => $apartment]) }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon card-image bg-primary">
                                <i class="fas fa-users"></i>
                            </div>

                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('resident.residents') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $apartment->residents->count() }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Visitors stats --}}
                <div class="col-md-4">
                    <a href="{{ route('office.apartment.visitor.index', ['apartment' => $apartment]) }}">
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
                    </a>
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
