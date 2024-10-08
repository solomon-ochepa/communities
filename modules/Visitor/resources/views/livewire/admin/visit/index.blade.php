<div class="row" wire:poll.15s>
    {{-- Visits --}}
    <div class="col-12 _layout-spacing">
        <div class="widget widget-card-four">
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
                    <table class="table-hover table-strip table">
                        <thead>
                            <tr>
                                <th>{{ __('Visitor') }}</th>
                                <th>{{ __('Visiting') }}</th>
                                <th class="text-center">{{ __('Arrival') }}</th>
                                <th class="text-center">{{ __('Expiry Date') }}</th>
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
                                    <td>
                                        <a
                                            href="{{ route('admin.visitor.visit.index', ['visitor' => $visit->visitor->id]) }}">
                                            <span class="fw-bold">{{ $visit->visitor->user->name }}</span>
                                            @if ($visit->active)
                                                <i class="fas fa-circle text-success fa-beat-fade ms-1"
                                                    style="height: 14px !important;"></i>
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        <div>
                                            @if ($visit->status)
                                                <i class="{{ $visit->status->icon }} {{ $visit->status->color }} fa-beat-fade me-1"
                                                    style="height: 14px !important;"></i>
                                            @endif
                                            <span class="fw-bold">{{ $visit->visitable->user->name }}</span>
                                            @if (optional($visit->visitable)->status)
                                                <sup>
                                                    <i class="fas fa-circle {{ $visit->visitable->status->color }} ms-1"
                                                        style="width: 10px; height: 12px !important;"></i>
                                                </sup>
                                            @endif
                                        </div>

                                        <div class="text-muted border-top border-dashed">
                                            <small>
                                                <i class="fa-solid fa-building text-muted me-1"
                                                    style="height: 12px !important;"></i>
                                                {{ $visit->visitable->apartment->name }}
                                            </small>
                                            @if ($visit->visitable->room)
                                                &rightarrow;
                                                <small>
                                                    <i class="fa-solid fa-door-open _fa-xs text-muted me-1"
                                                        style="height: 12px !important;"></i>
                                                    {{ $visit->visitable->room->name }}
                                                </small>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div>
                                            <i class="fas fa-clock text-muted me-1"
                                                style="height: 14px !important;"></i>
                                            <span class="fw-bold me-1">{{ $visit->arrived_at->format('h:i A') }}</span>
                                            <small class="text-muted">
                                                {{ $visit->arrived_at->format('D, M d, Y') }}
                                            </small>
                                        </div>

                                        {{-- checked_in_at --}}
                                        <div class="border-top mt-1 border-dashed pt-1" title="Checked In"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-person-walking fa-beat-fade text-muted me-1"
                                                style="height: 14px !important;"></i>
                                            <span
                                                class="fw-bold me-1">{{ $visit->checked_in_at ? $visit->checked_in_at->format('h:i A') : '--:-- --' }}</span>
                                            <small class="text-muted">
                                                {{ $visit->checked_in_at ? $visit->checked_in_at->format('D, M d, Y') : '---, --- --, ----' }}
                                            </small>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div>
                                            <i class="fas fa-clock text-muted me-1"
                                                style="height: 12px !important;"></i>
                                            <span class="fw-bold me-1">{{ $visit->expired_at->format('h:i A') }}</span>
                                            <small class="text-muted">
                                                {{ $visit->expired_at->format('D, M d, Y') }}
                                            </small>
                                        </div>

                                        {{-- checked_out_at --}}
                                        <div class="border-top mt-1 border-dashed pt-1" title="Checked Out"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-house-lock fa-beat-fade text-muted me-1"
                                                style="height: 12px !important;"></i>
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
                                            class="btn btn-sm btn-icon">
                                            <i class="fas fa-eye"></i>
                                        </a> --}}
                                        <form class="d-inline-block" method="POST"
                                            action="{{ route('admin.visit.destroy', $visit->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <a href="javascript://delete" onclick="$(this).parent().submit()"
                                                class="btn btn-sm btn-icon">
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @empty($visits)
                        <p class="py-4 text-center">No record found.</p>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>
