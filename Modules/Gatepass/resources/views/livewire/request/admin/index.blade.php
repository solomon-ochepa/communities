<div class="row layout-spacing layout-top-spacing" id="cancel-row">
    <div class="col-lg-12">
        <div class="widget-content searchable-container list">
            {{-- Header --}}
            <div class="row">
                {{-- Search --}}
                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                    <form class="form-inline my-lg-0 my-2">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                            <input type="search" class="form-control product-search" id="input-search"
                                placeholder="Search ...">
                        </div>
                    </form>
                </div>

                {{-- Action buttons --}}
                <div
                    class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right layout-spacing align-self-center text-center">
                    <div class="d-flex justify-content-sm-end justify-content-center">
                        {{-- Add new record --}}
                        {{-- <svg id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg> --}}

                        {{-- Display types --}}
                        <div class="d-flex switch align-self-center">
                            {{-- List display --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-list view-list active-view">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3" y2="6"></line>
                                <line x1="3" y1="12" x2="3" y2="12"></line>
                                <line x1="3" y1="18" x2="3" y2="18"></line>
                            </svg>

                            {{-- Grid display --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-grid view-grid">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="searchable-items list">
                {{-- List Head --}}
                <div class="items items-header-section">
                    <div class="item-content">
                        <div class="user-profile d-inline-flex">
                            {{-- Checkbox --}}
                            <div class="n-chk align-self-center text-center">
                                <div class="form-check form-check-primary me-0 mb-0">
                                    <input class="form-check-input inbox-chkbox" id="contact-check-all"
                                        type="checkbox">
                                </div>
                            </div>

                            <h4 class="user-profile-head">Name</h4>
                        </div>

                        <div class="user-email">
                            <h4 class="m-0" title="Expected Time of Arrival" data-bs-toggle="tooltip">From
                            </h4>
                        </div>

                        <div class="user-location">
                            <h4 style="margin-left: 0;" title="Expiring date" data-bs-toggle="tooltip">To</h4>
                        </div>

                        {{-- <div class="user-phone">
                                <h4 style="margin-left: 3px;">Phone</h4>
                            </div> --}}

                        <div class="action-btn">
                            <h4>Actions</h4>
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-trash-2 delete-multiple">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg> --}}

                            {{-- multiple check-in, checkout --}}
                        </div>
                    </div>
                </div>

                <x-alert />

                {{-- List Items --}}
                @forelse ($gatepass->requests ?? [] as $request)
                    {{-- @dd($request) --}}
                    {{-- @dd($request->requestable) --}}
                    {{-- @dd($request->requestable->visitable) --}}
                    {{-- @dd($request->requestable->visitable->user) --}}
                    <div class="items">
                        <div class="item-content">
                            {{-- Name --}}
                            <div class="user-profile">
                                <div class="n-chk align-self-center text-center">
                                    <div class="form-check form-check-primary me-0 mb-0">
                                        <input class="form-check-input inbox-chkbox contact-chkbox" type="checkbox">
                                    </div>
                                </div>

                                {{-- Image --}}
                                <img class="d-inline-block"
                                    src="{{ $request->requestable->visitable->user->hasMedia(['profile', 'image'])
                                        ? $request->requestable->visitable->user->media(['profile', 'image'])->first()->getUrl()
                                        : asset('assets/app') . '/src/assets/img/profile-5.jpg' }}"
                                    alt="avatar" />

                                {{-- Name & Request Code --}}
                                <div class="user-meta-info">
                                    <p class="user-name"
                                        data-name="{{ $request->requestable->visitable->user->name }}">
                                        {{ $request->requestable->visitable->user->name }}</p>
                                    <p class="user-work" data-occupation="Web Developer">
                                        <code class="strong" title="Gatepass request code" data-bs-toggle="tooltip">#
                                            {{ $request->code }}</code>
                                    </p>
                                </div>
                            </div>

                            {{--  --}}
                            <div class="user-email">
                                @php
                                    $from = $request->requestable->arrived_at;
                                @endphp
                                <p class="info-title">From: </p>
                                <p class="usr-email-addr fw-normal"
                                    data-email="{{ $from->format('h:iA - D, M d, y') }}">
                                    <span class="d-block">
                                        <span>{{ $from->format('h:iA') }}</span>
                                        <span class="text-muted"> &middot; </span>
                                        <small class="text-muted">{{ $from->format('D, M d') }}</small>
                                        <span>{{ $from->year !== now()->year ? ', ' . $from->format('y') : '' }}</span>
                                    </span>
                                    <code class="d-block">{{ $from->since() }}</code>
                                </p>
                            </div>

                            <div class="user-location">
                                @php
                                    $to = $request->requestable->expired_at;
                                @endphp
                                <p class="info-title">To: </p>
                                <p class="usr-location fw-normal"
                                    data-location="{{ $to->format('h:iA - D, M d, y') }}">
                                    <span class="d-block">
                                        <span>{{ $to->format('h:iA') }}</span>
                                        <span class="text-muted"> &middot; </span>
                                        <small class="text-muted">{{ $to->format('D, M d') }}</small>
                                        <span>{{ $to->year !== now()->year ? ', ' . $to->format('y') : '' }}</span>
                                    </span>
                                    <code class="d-block">{{ $to->since() }}</code>
                                </p>
                            </div>

                            {{-- <div class="user-phone">
                                    <p class="info-title">Phone: </p>
                                    <p class="usr-ph-no fw-normal" data-phone="+1 (070) 123-4567">+1 (070)
                                        123-4567</p>
                                </div> --}}

                            {{-- Actions --}}
                            <div class="action-btn d-flex">
                                @if (
                                    ($log = $request->access_logs()->latest()->first()) and
                                        $log->checked_out_at == null)
                                @else
                                    <a href="javascript://" disabled class="edit" title="Check-in"
                                        data-bs-toggle="tooltip" wire:click="check_in(@js($request->id))">
                                        <i class="fas fa-user-plus fa-xl text-success"></i>
                                    </a>
                                @endif

                                @if (
                                    ($log = $request->access_logs()->latest()->first()) and
                                        $log->checked_out_at !== null)
                                @else
                                    <a href="javascript://" class="ms-3 edit disabled" title="Checkout"
                                        data-bs-toggle="tooltip" wire:click="checkout(@js($request->id))">
                                        <i class="fas fa-user-minus fa-xl text-primary"></i>
                                    </a>
                                @endif

                                {{--
                                        <span class="border-start mx-1 border-dashed border-dark"></span>

                                        <span class="ms-2" title="Alarm" data-bs-toggle="tooltip" wire:click="alarm(@js($request->id))">
                                            <i class="fas fa-bell fa-shake fa-xl text-warning edit"></i>
                                        </span>

                                        <span class="ms-2" title="Block" data-bs-toggle="tooltip" wire:click="block(@js($request->id))">
                                            <i class="fas fa-user-slash fa-beat-fade fa-xl text-danger edit"></i>
                                        </span>
                                    --}}

                                {{--
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit-2 edit">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                            </path>
                                        </svg>
                                    --}}

                                {{--
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user-minus delete">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg>
                                    --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="py-4 text-center">
                        No request found.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
