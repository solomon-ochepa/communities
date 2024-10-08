<div class="row" wire:poll.15s>
    {{-- Visitors --}}
    <div class="col-12 _layout-spacing">
        <div class="widget widget-card-four">
            <div class="w-header">
                {{-- Title --}}
                <div class="w-info">
                    <h6 class="value">
                        {{ __('Latest Visits') }}
                    </h6>
                </div>

                {{-- Actions dropdown --}}
                <div class="task-action">
                </div>
            </div>

            <div class="widget-content">
                <div class="w-header d-none">
                    {{-- Title --}}
                    <div class="w-info">
                        <h6 class="value">
                            {{ __('Latest Visits') }}
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
                    <div class="progress" title="Active" data-toggle="tooltip">
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
                            <tr class="text-uppercase">
                                <th class="fw-bold">{{ __('Visiting') }}</th>
                                <th class="text-center fw-bold">{{ __('Arrival') }}</th>
                                <th class="text-center fw-bold">{{ __('Expiry Date') }}</th>
                                <th class="text-end fw-bold"></th>
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
                                    {{-- <td>
                                        <span class="fw-bold">{{ $visit->visitor->user->name }}</span>
                                        @if ($visit->active)
                                            <i class="fas fa-circle text-success fa-beat-fade ms-1"></i>
                                        @endif
                                    </td> --}}
                                    <td>
                                        <div>
                                            @if ($visit->status)
                                                <i
                                                    class="{{ $visit->status->icon }} {{ $visit->status->color }} me-1"></i>
                                            @endif
                                            <span class="fw-bold">{{ $visit->visitable->user->name }}</span>
                                            {{-- @if (optional($visit->visitable)->status)
                                                <i
                                                    class="{{ $visit->visitable->status->icon }} {{ $visit->visitable->status->color }} fa-beat-fade ms-1"></i>
                                            @endif --}}
                                        </div>

                                        <div class="pt-1 mt-1 border-top _border-default _border-dashed">
                                            @if ($visit->visitable->room)
                                                <small>
                                                    <i class="fa-solid fa-door-open text-muted me-1"></i>
                                                    {{ $visit->visitable->room->name }}
                                                </small>
                                                &rightarrow;
                                            @endif
                                            <small>
                                                <i class="fa-solid fa-building text-muted small me-1"></i>
                                                {{ $visit->visitable->apartment->name }}
                                            </small>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div>
                                            <i class="fas fa-clock text-muted me-1"></i>
                                            <span class="fw-bold me-1">{{ $visit->arrived_at->format('h:i A') }}</span>
                                            <small class="text-muted">
                                                {{ $visit->arrived_at->format('D, M d, Y') }}
                                            </small>
                                        </div>

                                        {{-- checked_in_at --}}
                                        <div class="pt-1 mt-1 border-top _border-default _border-dashed"
                                            title="Checked In" data-bs-toggle="tooltip">
                                            <i class="fas fa-person-walking fa-beat-fade text-muted me-1"></i>
                                            <span
                                                class="fw-bold me-1">{{ $visit->checked_in_at ? $visit->checked_in_at->format('h:i A') : '--:-- --' }}</span>
                                            <small class="text-muted">
                                                {{ $visit->checked_in_at ? $visit->checked_in_at->format('D, M d, Y') : '---, --- --, ----' }}
                                            </small>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div>
                                            <i class="fas fa-clock text-muted me-1"></i>
                                            <span class="fw-bold me-1">{{ $visit->expired_at->format('h:i A') }}</span>
                                            <small class="text-muted">
                                                {{ $visit->expired_at->format('D, M d, Y') }}
                                            </small>
                                        </div>

                                        {{-- checked_out_at --}}
                                        <div class="pt-1 mt-1 border-top _border-default _border-dashed"
                                            title="Checked Out" data-bs-toggle="tooltip">
                                            <i class="fas fa-house-lock fa-beat-fade text-muted me-1"></i>
                                            <span
                                                class="fw-bold me-1">{{ $visit->checked_out_at ? $visit->checked_out_at->format('h:i A') : '--:-- --' }}</span>
                                            <small class="text-muted">
                                                {{ $visit->checked_out_at ? $visit->checked_out_at->format('D, M d, Y') : '---, --- --, ----' }}
                                            </small>
                                        </div>
                                    </td>

                                    {{-- Actions --}}
                                    <td>
                                        {{-- <a href="{{ route('admin.visit.show', $visit->id) }}"
                                            class="btn btn-sm btn-icon btn-primary">
                                            <i class="far fa-eye"></i>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @empty($visits)
                        <p class="text-center py-4">No record found.</p>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>
