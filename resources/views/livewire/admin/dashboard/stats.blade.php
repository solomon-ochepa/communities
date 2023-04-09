<div class="row mt-4">
    @isset($total_apartments)
        {{-- Apartment --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        {{-- Title --}}
                        <div class="w-info">
                            <h6 class="value">
                                <a href="{{ route('admin.apartment.index') }}">
                                    {{ __('Apartments') }}
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

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
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
                                {{ $total_apartments }}
                                <span class="text-muted" title="Inactive apartments" data-toggle="tooltip">
                                    - {{ $inactive_apartments }}
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
                                style="width: {{ $active_apartments_percentage }}%"
                                aria-valuenow="{{ $active_apartments_percentage }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>

                        <div class="">
                            <div class="w-icon">
                                <p>{{ $active_apartments_percentage }}%</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endisset

    @isset($inactive_rooms)
        {{-- Rooms --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        {{-- Title --}}
                        <div class="w-info">
                            <h6 class="value">
                                {{ __('Rooms') }}
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

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
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

    @isset($total_tenants)
        {{-- Tenants --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        {{-- Title --}}
                        <div class="w-info">
                            <h6 class="value">
                                <a href="{{ route('admin.tenant.index') }}">
                                    {{-- dmin.apartment.tenant.index --}}
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
                                {{ $total_tenants }}
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
    @endisset
</div>
