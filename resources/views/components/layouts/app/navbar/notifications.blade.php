<div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
    <div class="drodpown-title message">
        <h6 class="d-flex justify-content-between"><span class="align-self-center">Messages</span>
            <span class="badge badge-primary">
                @if ($messages->count())
                    {{ $messages->count() }} Unread
                @else
                    0
                @endif
            </span>
        </h6>
    </div>
    <div class="notification-scroll">
        @forelse ($messages as $message)
            <div class="dropdown-item">
                <div class="media server-log">
                    <img src="/assets/app/src/assets/img/profile-16.jpg" class="img-fluid me-2" alt="avatar">
                    <div class="media-body">
                        <div class="data-info">
                            <h6 class="">{{ $message->title }}</h6>
                            <p class="">{{ $message->created_at }}</p>
                        </div>

                        <div class="icon-status">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="dropdown-item">
                <div class="media ">
                    <img src="/assets/app/src/assets/img/profile-15.jpg" class="img-fluid me-2" alt="avatar">
                    <div class="media-body">
                        <div class="data-info">
                            <h6 class="">Daisy Anderson</h6>
                            <p class="">8 hrs ago</p>
                        </div>

                        <div class="icon-status">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="dropdown-item">
                <div class="media file-upload">
                    <img src="/assets/app/src/assets/img/profile-21.jpg" class="img-fluid me-2" alt="avatar">
                    <div class="media-body">
                        <div class="data-info">
                            <h6 class="">Oscar Garner</h6>
                            <p class="">14 hrs ago</p>
                        </div>

                        <div class="icon-status">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </div>
                    </div>
                </div>
            </div> --}}
        @empty
            <div class="dropdown-item">
                <div class="media server-log">
                    {{-- <img src="/assets/app/src/assets/img/profile-16.jpg" class="img-fluid me-2" alt="avatar"> --}}
                    <div class="media-body">
                        <div class="data-info">
                            {{-- <h6 class="">Empty</h6> --}}
                            <p class="">No new messages</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse

        <div class="drodpown-title notification mt-2">
            <h6 class="d-flex justify-content-between">
                <span class="align-self-center">Notifications</span>
                <span class="badge badge-secondary">
                    @if ($notifications->count())
                        {{ $notifications->count() }} New
                    @else
                        0
                    @endif
                </span>
            </h6>
        </div>
        @forelse ($notifications ?? [] as $notification)
            <div class="dropdown-item">
                <div class="media server-log">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-server">
                        <rect x="2" y="2" width="20" height="8" rx="2" ry="2">
                        </rect>
                        <rect x="2" y="14" width="20" height="8" rx="2" ry="2">
                        </rect>
                        <line x1="6" y1="6" x2="6" y2="6"></line>
                        <line x1="6" y1="18" x2="6" y2="18"></line>
                    </svg>
                    <div class="media-body">
                        <div class="data-info">
                            <h6 class="">{{ $notifications->title }}</h6>
                            <p class="">{{ $notifications->created_at }}</p>
                        </div>

                        <div class="icon-status">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="dropdown-item">
                <div class="media file-upload">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-file-text">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    <div class="media-body">
                        <div class="data-info">
                            <h6 class="">Kelly Portfolio.pdf</h6>
                            <p class="">670 kb</p>
                        </div>

                        <div class="icon-status">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="dropdown-item">
                <div class="media ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-heart">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg>
                    <div class="media-body">
                        <div class="data-info">
                            <h6 class="">Licence Expiring Soon</h6>
                            <p class="">8 hrs ago</p>
                        </div>

                        <div class="icon-status">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </div>
                    </div>
                </div>
            </div> --}}
        @empty
            <div class="dropdown-item">
                <div class="media ">
                    <div class="media-body">
                        <div class="data-info">
                            <p class="">No new notifications</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
