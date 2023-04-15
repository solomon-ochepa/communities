<x-app-layout :data="$data['head'] ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.apartment.index')" />

            {!! __($head['title'] ?? '') !!}
        </h2>
    </x-slot>

    <div class="row layout-top-spacing">
        @isset($total_rooms)
            {{-- Rooms --}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            {{-- Title --}}
                            <div class="w-info">
                                <h6 class="value">
                                    <a href="{{ route('admin.apartment.room.index', ['apartment' => $apartment]) }}">
                                        {{ __('Rooms') }}
                                        <x-link-icon />
                                    </a>
                                </h6>
                            </div>

                            {{-- Actions dropdown --}}
                            <div class="task-action">
                                <div class="dropdown">
                                    <a class="disabled dropdown-toggle" href="#" role="button" id="expenses"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu left" aria-labelledby="expenses"
                                        style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);">This
                                            Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last
                                            Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last
                                            Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content mt-3">
                            <div class="w-info">
                                <p class="value">
                                    {{-- Count --}}
                                    {{ $total_rooms }}
                                    <span class="text-muted" title="Inactive rooms" data-toggle="tooltip">
                                        - {{ $inactive_rooms }}
                                    </span>
                                    {{-- Period --}}
                                    {{-- <span>this week</span> --}}
                                    {{-- Chart --}}
                                    {{-- <i class="fas fa-chart"></i> --}}
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg> --}}
                                </p>
                            </div>
                        </div>

                        <div class="w-progress-stats mt-0">
                            <div class="progress" title="Capacity" data-toggle="tooltip">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                    style="width: {{ $active_rooms_percentage }}%"
                                    aria-valuenow="{{ $active_rooms_percentage }}" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>

                            <div class="">
                                <div class="w-icon">
                                    <p>{{ $active_rooms_percentage }}%</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endisset

        {{-- Tenants --}}
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        {{-- Title --}}
                        <div class="w-info">
                            <h6 class="value">
                                <a href="{{ route('admin.apartment.tenant.index', ['apartment' => $apartment]) }}">
                                    {{ __('Tenants') }}
                                    <x-link-icon />
                                </a>
                            </h6>
                        </div>

                        {{-- Actions dropdown --}}
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="disabled dropdown-toggle" href="#" role="button" id="expenses"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-horizontal">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="expenses"
                                    style="will-change: transform;">
                                    <a class="dropdown-item" href="javascript:void(0);">This
                                        Week</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last
                                        Week</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last
                                        Month</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">
                        <div class="w-info">
                            <p class="value">
                                {{-- Count --}}
                                {{ $apartment->tenants->count() }}
                                {{-- Period --}}
                                {{-- <span>this week</span> --}}
                                {{-- Chart --}}
                                {{-- <i class="fas fa-chart"></i> --}}
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg> --}}
                            </p>
                        </div>
                    </div>

                    {{-- <div class="w-progress-stats d-none">
                        <div class="progress" title="Capacity" data-toggle="tooltip">
                            <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                style="width: {{ $active_rooms_percentage }}%"
                                aria-valuenow="{{ $active_rooms_percentage }}" aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>

                        <div class="">
                            <div class="w-icon">
                                <p>{{ $active_rooms_percentage }}%</p>
                            </div>
                        </div>

                    </div> --}}
                </div>
            </div>
        </div>

        @isset($total_visitors)
            {{-- Visitors --}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            {{-- Title --}}
                            <div class="w-info">
                                <h6 class="value">
                                    <a href="{{ route('admin.apartment.visitor.index', ['apartment' => $apartment]) }}">
                                        {{ __('visitor.visitors') }}
                                    </a>
                                </h6>
                            </div>

                            {{-- Actions dropdown --}}
                            <div class="task-action">
                                <div class="dropdown">
                                    <a class="disabled dropdown-toggle" href="#" role="button" id="expenses"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu left" aria-labelledby="expenses"
                                        style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);">This
                                            Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last
                                            Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last
                                            Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content mt-3">
                            <div class="w-info">
                                <p class="value">
                                    {{-- Count --}}
                                    <strong title="Active visitors" data-toggle="tooltip">{{ $active_visitors }}</strong>
                                    <span class="text-muted" title="Total visitors" data-toggle="tooltip">
                                        - {{ $total_visitors }}
                                    </span>
                                    {{-- Period --}}
                                    {{-- <span>this week</span> --}}
                                    {{-- Chart --}}
                                    {{-- <i class="fas fa-chart"></i> --}}
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg> --}}
                                </p>
                            </div>
                        </div>

                        <div class="w-progress-stats mt-0">
                            <div class="progress" title="Capacity" data-toggle="tooltip">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                    style="width: {{ $active_visitors_percentage }}%"
                                    aria-valuenow="{{ $active_visitors_percentage }}" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>

                            <div class="">
                                <div class="w-icon">
                                    <p>{{ $active_visitors_percentage }}%</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endisset
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
    </section>

    @push('css')
        <link href="/assets/app/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
        <link href="/assets/app/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
        <link href="/assets/app/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    @endpush
    @push('js')
        <script src="/assets/app/src/plugins/src/apex/apexcharts.min.js"></script>
        <script src="/assets/app/src/assets/js/dashboard/dash_1.js"></script>
    @endpush
</x-app-layout>
