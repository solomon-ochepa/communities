<div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <div class="user-profile-section">
        <div class="media mx-auto">
            <div class="emoji me-2">
                &#x1F44B;
            </div>
            <div class="media-body">
                <h5>{{ $user->name }}</h5>
                @if ($user->roles->count())
                    <p>{{ $user->roles()->first()->name }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="dropdown-item">
        <a href="{{ route('profile.edit') }}" class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-user">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span>Profile</span>
        </a>
    </div>

    {{-- <div class="dropdown-item">
        <a href="app-mailbox.html">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-inbox">
                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                <path
                    d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                </path>
            </svg> <span>Inbox</span>
        </a>
    </div> --}}

    {{-- <div class="dropdown-item">
        <a href="auth-boxed-lockscreen.html">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-lock">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            <span>Lock Screen</span>
        </a>
    </div> --}}

    <div class="dropdown-item">
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')" class="d-flex"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-log-out">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                <span>{{ __('Log Out') }}</span>
            </x-responsive-nav-link>
        </form>
    </div>
</div>
