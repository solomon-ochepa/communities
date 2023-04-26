<div class="col-md-3">
    <div class="card style-6{{ $user->trashed() ? ' hover:bg-opacity-95 opacity-50' : '' }}" href="javascript://">
        @canany(['edit', 'delete', 'transfer', 'restore', 'delete.permanent'], $user)
            <span class="badge">
                <div class="d-flex justify-content-between gap-4">
                    {{-- Actions dropdown --}}
                    <div class="task-action">
                        <div class="dropdown-list dropdown" role="group">
                            <a class="dropdown-toggle" href="javascript://" role="button" id="users"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>

                            <div class="dropdown-menu left" aria-labelledby="users"
                                style="min-width: 0; will-change: transform;">
                                @if ($user->trashed())
                                    @can('users.restore')
                                        <a class="dropdown-item"
                                            href="{{ route('admin.user.restore', ['user' => $user->id]) }}">
                                            <span>Restore</span>
                                            <i class="fas fa-undo"></i>
                                        </a>
                                    @endcan
                                    @can('users.delete.permanent')
                                        <form action="{{ route('admin.user.destroy.permanent', ['user' => $user->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="dropdown-item text-danger">
                                                <span>Delete permanent</span>
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endcan
                                @else
                                    @can('users.edit')
                                        <a class="dropdown-item" href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
                                            <span>Edit</span>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('users.delete')
                                        @if (!in_array($user->username, ['admin', 'super-admin']))
                                            <form action="{{ route('admin.user.destroy', ['user' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="dropdown-item text-danger">
                                                    <span>Trash</span>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endcan
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </span>
        @endcanany

        <img src="{{ $user->hasMedia(['image', 'profile'])? $user->media(['image', 'profile'])->first()->getUrl(): '/unknown.svg' }}"
            class="card-img-top p-1" alt="{{ $user->name }}" />

        <div class="card-footer">
            <h5 class="card-title fw-bold mb-1">{{ $user->name }}</h5>
            <section class="card-text small">
                <p>
                    <span title="{{ __('Username') }}" data-bs-toggle="tooltip"><i class="fas fa-user-tie"></i></span>
                    <span>{{ $user->username }}</span>
                </p>
                <p>
                    <span title="{{ __('Email') }}" data-bs-toggle="tooltip"><i class="fas fa-envelope"></i></span>
                    <span>{{ $user->email }}</span>
                </p>
                <p>
                    <span title="{{ __('Phone') }}" data-bs-toggle="tooltip"><i class="fas fa-phone"></i></span>
                    <span>{{ $user->phone }}</span>
                </p>
                <p class="border-top border-muted pt-1">
                    <span title="{{ __('Registered') }}" data-bs-toggle="tooltip"><i
                            class="fas fa-user-plus"></i></span>
                    <span>{{ $user->created_at->format('D, M d, Y H:i A') }}</span>
                </p>
            </section>
        </div>
    </div>
</div>
