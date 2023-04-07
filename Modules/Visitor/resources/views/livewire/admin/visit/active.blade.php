<div class="row">
    {{-- Visitors --}}
    <div class="col-12 _layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-header">
                    {{-- Title --}}
                    <div class="w-info">
                        <h6 class="value">
                            <a href="{{ route('admin.visit.index') }}">
                                {{ __('Visitors') }}
                                <sup class="fs-12"><i class="fas fa-arrow-up-right-from-square"></i></sup>
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
                            <strong title="Active visits" data-toggle="tooltip">{{ $active_visits }}</strong>
                            <span class="text-muted" title="Total visits" data-toggle="tooltip">
                                - {{ $total_visits }}
                            </span>
                            {{-- Period --}}
                            <span>today</span>
                        </p>
                    </div>
                </div>

                <div class="w-progress-stats mt-0">
                    <div class="progress" title="Capacity" data-toggle="tooltip">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar"
                            style="width: {{ $active_visits_percentage }}%"
                            aria-valuenow="{{ $active_visits_percentage }}" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>

                    <div class="">
                        <div class="w-icon">
                            <p>{{ $active_visits_percentage }}%</p>
                        </div>
                    </div>

                </div>

                <div class="table-responsive mt-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Visitor') }}</th>
                                <th>{{ __('Visit') }}</th>
                                <th>{{ __('Checkin') }}</th>
                                <th class="text-end"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($visits ?? [] as $visit)
                                @php
                                    if ($loop->index > 5) {
                                        break;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ optional($visit->visitor)->name }}</td>
                                    <td>{{ optional($visit->visitor)->email }}</td>
                                    <td>{{ $visit->reg_no }}</td>
                                    <td>{{ optional($visit->employee)->user->name }}</td>
                                    <td>{{ date('d-M-Y h:i A', strtotime($visit->checkin_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.visitors.show', $visit) }}"
                                            class="btn btn-sm btn-icon btn-primary"><i class="far fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @empty($visit)
                        <p class="text-center py-4">
                            No record found.
                        </p>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>
