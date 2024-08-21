<div class="col-md-3">
    <div class="card style-6{{ $gatepass->requests->count() ? ' bg-light-success' : '' }}" href="javascript://">
        <div class="card-body">
            <div class="badge d-flex justify-content-between gap-3">
                @if ($gatepass->requests->count())
                    <div class="text-primary">{{ $gatepass->requests->count() }}</div>
                @endif
                @canany(['edit', 'delete', 'restore', 'delete.permanent'], $gatepass)
                    <div class="d-flex justify-content-between gap-4">
                        {{-- Actions dropdown --}}
                        <div class="task-action">
                            <div class="dropdown-list dropdown" role="group">
                                <a class="dropdown-toggle" href="javascript://" role="button" id="users"
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

                                <div class="dropdown-menu left" aria-labelledby="users"
                                    style="min-width: 0; will-change: transform;">

                                    @can('admin.gatepass.edit')
                                        <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                            data-bs-target="#user-edit-modal">
                                            {{ __('Edit') }}
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- <a class="" href="{{ route('admin.user.edit', ['user' => $gatepass->id]) }}">
                                            <span>Edit</span>
                                            <i class="fas fa-edit"></i>
                                        </a> --}}
                                    @endcan

                                    {{-- @if (!in_array($gatepass->username, ['admin', 'super-admin']))
                                        <form action="{{ route('admin.gatepass.destroy', ['gatepass' => $gatepass->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="dropdown-item text-danger">
                                                <span>Delete</span>
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endcanany
            </div>

            <section class="row">
                <div class="col-md-12 text-center">
                    <p class="fw-bold text-dark m-0 uppercase">{{ config('app.name') }}</p>
                    @if ($gatepass->categories->count())
                        <p class="fw-normal text-dark m-0 uppercase">{{ __($gatepass->categories->first()->name) }}</p>
                    @else
                        <p class="fw-normal text-dark m-0 uppercase">{{ __('Gatepass') }}</p>
                    @endif
                </div>
            </section>
        </div>

        {{-- Photo --}}
        @if ($gatepass->hasMedia(['image', 'profile']))
            @php
                $image = $gatepass
                    ->media(['image', 'profile'])
                    ->first()
                    ->getUrl();
            @endphp
        @elseif($gatepass->user and $gatepass->user->hasMedia(['image', 'profile']))
            @php
                $image = $gatepass->user
                    ->media(['image', 'profile'])
                    ->first()
                    ->getUrl();
            @endphp
        @else
            @php $image = '/unknown.svg'; @endphp
        @endif
        <div class="text-center">
            <img src="{{ $image }}" class="card-img-top" style="height: 150px" alt="{{ $gatepass->name }}" />
        </div>

        {{-- User Name --}}
        <div class="card-body text-center">
            <h5 class="card-title fw-bold mb-0">
                <a href="{{ route('admin.gatepass.request.index', ['gatepass' => $gatepass->id]) }}">
                    @if ($gatepass->requests->count())
                        <i class="fas fa-person-walking fa-beat-fade text-success"></i>
                    @endif
                    <span>{{ optional($gatepass->user)->name }}</span>
                </a>
            </h5>
            {{-- <h5 class="card-subtitle fw-normal mb-1">{{ $gatepass->code }}</h5> --}}
        </div>

        <div class="card-footer" style="height: 70px;">
            @if ($gatepass->hasMedia(['barcode']))
                <img src="{{ $gatepass->media(['barcode'])->first()->getUrl() }}" class="card-img-bottom"
                    alt="{{ $gatepass->name }}" />
            @endif

            {{-- <section class="card-text small">
                <p>
                    <span title="{{ __('Username') }}" data-bs-toggle="tooltip"><i class="fas fa-user-tie"></i></span>
                    <span>{{ $gatepass->username }}</span>
                </p>
                <p>
                    <span title="{{ __('Email') }}" data-bs-toggle="tooltip"><i class="fas fa-envelope"></i></span>
                    <span>{{ $gatepass->email }}</span>
                </p>
                <p>
                    <span title="{{ __('Phone') }}" data-bs-toggle="tooltip"><i class="fas fa-phone"></i></span>
                    <span>{{ $gatepass->phone }}</span>
                </p>
                <p class="border-top border-muted pt-1">
                    <span title="{{ __('Registered') }}" data-bs-toggle="tooltip"><i
                            class="fas fa-user-plus"></i></span>
                    <span>{{ $gatepass->created_at->format('D, M d, Y H:i A') }}</span>
                </p>
            </section> --}}
        </div>
    </div>
</div>
