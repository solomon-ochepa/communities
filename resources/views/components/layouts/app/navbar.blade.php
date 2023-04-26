<div class="header-container container-xxl">
    <header class="header navbar navbar-expand-sm expand-header">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="{{ route('dashboard') }}">
                    {{-- <img src="/logo.png" class="_navbar-logo rounded -circle" alt="logo"> --}}
                    <x-logo class="_w-20 _h-20 fill-current text-gray-500" alt="logo" width="auto" height="50px" />
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{ route('dashboard') }}" class="nav-link"> {{ config('app.name') }} </a>
            </li>
        </ul>

        <div class="search-animated toggle-search">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>

            <form class="form-inline search-full form-inline search" role="search">
                <div class="search-bar">
                    <input type="text" class="form-control search-form-control  ml-lg-auto" disabled
                        placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x search-close">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </form>

            <span class="badge badge-secondary">Ctrl + /</span>
        </div>

        <ul class="navbar-item flex-row ms-lg-auto ms-0 action-area">
            {{-- <li class="nav-item dropdown language-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://designreset.com/cork/html/src/assets/img/1x1/us.svg" class="flag-width"
                        alt="flag">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                    <a class="dropdown-item d-flex" href="javascript:void(0);"><img
                            src="https://designreset.com/cork/html/src/assets/img/1x1/us.svg" class="flag-width"
                            alt="flag"> <span class="align-self-center">&nbsp;English</span></a>
                    <a class="dropdown-item d-flex" href="javascript:void(0);"><img
                            src="https://designreset.com/cork/html/src/assets/img/1x1/tr.svg" class="flag-width"
                            alt="flag"> <span class="align-self-center">&nbsp;Turkish</span></a>
                    <a class="dropdown-item d-flex" href="javascript:void(0);"><img
                            src="https://designreset.com/cork/html/src/assets/img/1x1/br.svg" class="flag-width"
                            alt="flag"> <span class="align-self-center">&nbsp;Portuguese</span></a>
                    <a class="dropdown-item d-flex" href="javascript:void(0);"><img
                            src="https://designreset.com/cork/html/src/assets/img/1x1/in.svg" class="flag-width"
                            alt="flag"> <span class="align-self-center">&nbsp;Hindi</span></a>
                    <a class="dropdown-item d-flex" href="javascript:void(0);"><img
                            src="https://designreset.com/cork/html/src/assets/img/1x1/de.svg" class="flag-width"
                            alt="flag"> <span class="align-self-center">&nbsp;German</span></a>
                </div>
            </li> --}}

            <!-- Dark mode -->
            <li class="nav-item theme-toggle-item">
                <a href="javascript:void(0);" class="nav-link theme-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-moon dark-mode">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-sun light-mode">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </a>
            </li>

            <!-- Notifications -->
            <li class="nav-item dropdown notification-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span class="badge badge-success"></span>
                </a>

                <x-layouts.app.navbar.notifications />
            </li>

            <!-- User profile -->
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar-container">
                        <div class="avatar avatar-sm avatar-indicators avatar-online">
                            @if ($user->hasMedia(['image', 'profile']))
                                <img alt="avatar" src="{{ $user->media(['image', 'profile'])->first()->getUrl() }}"
                                    class="rounded-circle">
                            @else
                                <img alt="avatar" src="/assets/app/src/assets/img/profile-30.png"
                                    class="rounded-circle">
                            @endif
                        </div>
                    </div>
                </a>

                <x-layouts.app.navbar.user-profile />
            </li>
        </ul>
    </header>
</div>
