<div class="col-md-3">
    <div class="card style-6" href="javascript://">
        <div class="card-body">
            @canany(['edit', 'delete', 'transfer', 'restore', 'delete.permanent'], $gatepass)
                <span class="badge">
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

                                    @role('super-admin')
                                        @if (!in_array($gatepass->username, ['admin', 'super-admin']))
                                            <form action="{{ route('admin.gatepass.destroy', ['gatepass' => $gatepass->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="dropdown-item text-danger">
                                                    <span>Delete</span>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endrole
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
            @endcanany

            <section class="row">
                <div class="col-md-12 text-center">
                    <p class="m-0 fw-bold uppercase text-dark">{{ config('app.name') }}</p>
                    @if ($gatepass->categories->count())
                        <p class="m-0 fw-normal uppercase text-dark">{{ __($gatepass->categories->first()->name) }}</p>
                    @else
                        <p class="m-0 fw-normal uppercase text-dark">{{ __('Gatepass') }}</p>
                    @endif
                </div>
            </section>
        </div>

        @if ($gatepass->hasMedia(['image', 'profile']))
            @php
                $image = $gatepass
                    ->media(['image', 'profile'])
                    ->first()
                    ->getUrl();
            @endphp
        @elseif($gatepass->user and $gatepass->user->hasMedia(['image', 'profile']))
            {{-- @dd($gatepass->user) --}}
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

        <div class="card-body text-center">
            <h5 class="card-title fw-bold mb-0">{{ optional($gatepass->user)->name }}</h5>
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
