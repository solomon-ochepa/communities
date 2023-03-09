<!DOCTYPE>
<html>

@include('frontend.layouts.partials.head._head')

<body class="pm-home pm-home-css-custom">
    {{-- <div class="pm-preloader" id="preloader"></div> --}}

    {{-- Header --}}
    <header id="pm-header" class="pm-main-header  header-type-one">
        <div class="container">
            <div class="pm-main-header-content clearfix">
                {{-- Brand Logo --}}
                <div class="pm-logo float-left">
                    @if (setting('site_logo'))
                        <a href="{{ route('/') }}">
                            <img src="{{ asset(setting('site_logo')) }}" data-inject-svg="" alt=""
                                style="height: 40px;">
                        </a>
                    @endif
                </div>

                <div class="pm-main-menu-item float-right">
                    <div class="pm-header-btn text-center text-capitalize float-right">
                        @if (auth()->user())
                            <a href="{{ route('office.dashboard') }}">{{ __('frontend.go_to_dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}">{{ __('frontend.login') }}</a>
                        @endif
                    </div>

                    {{-- Navbar --}}
                    <nav class="pm-main-navigation float-right clearfix ul-li">
                        <ul id="main-nav" class="navbar-nav text-capitalize clearfix">
                            {{-- <li>
                                <a href="{{ route('check-in.pre.registered') }}">
                                    {{ __('frontend.have_appoinment') }}
                                </a>
                            </li> --}}
                            {{-- <li>
                                <a href="{{ route('check-in.return') }}">
                                    {{ __('frontend.been_here_before') }}
                                </a>
                            </li> --}}
                            {{-- @if (auth()->user())
                                <li>
                                    <a href="{{ route('checkout.index') }}">{{ __('frontend.check_out') }}</a>
                                </li>
                            @endif --}}

                            {{-- Language --}}
                            <li class="dropdown">
                                <a href="javascript://" data-toggle="dropdown"
                                    class="language nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    @if (!blank($language))
                                        @foreach ($language as $lang)
                                            @if (Session()->has('applocale') and Session()->get('applocale') and setting('locale'))
                                                @if (Session()->get('applocale') == $lang->code)
                                                    <div class="d-sm-none d-lg-inline-block "><span
                                                            class="flag-icon">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}</span>{{ $lang->name }}
                                                    </div>
                                                @endif
                                            @else
                                                @if (setting('locale') == $lang->code)
                                                    <div class="d-sm-none d-lg-inline-block "><span
                                                            class="flag-icon">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}</span>{{ $lang->name }}
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right"
                                    style="border-bottom:none !important; width:100px !important">
                                    @if (!blank($language))
                                        @foreach ($language as $lang)
                                            <a href="{{ route('office.lang.index', $lang->code) }}"
                                                class="language dropdown-item has-icon text-center"
                                                style="min-width:100px !important">
                                                <span
                                                    class="flag-icon flag-icon-aw">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}
                                                </span>{{ $lang->name }}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            {{-- Mobile --}}
            <div class="pm-mobile_menu relative-position">
                <div class="pm-mobile_menu_button pm-open_mobile_menu">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="pm-mobile_menu_wrap">
                    <div class="mobile_menu_overlay pm-open_mobile_menu"></div>
                    <div class="pm-mobile_menu_content">
                        <div class="pm-mobile_menu_close pm-open_mobile_menu">
                            <i class="far fa-times-circle"></i>
                        </div>
                        {{-- Brand --}}
                        <div class="m-brand-logo text-center">
                            <a href="{{ route('/') }}">
                                <img src="{{ asset(setting('site_logo')) }}" alt="logo">
                            </a>
                        </div>
                        <nav class="pm-mobile-main-navigation  clearfix ul-li">
                            <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                                {{-- <li>
                                    <a href="{{ route('check-in.pre.registered') }}">
                                        {{ __('frontend.have_appoinment') }}
                                    </a>
                                </li> --}}
                                {{-- <li>
                                    <a href="{{ route('check-in.return') }}">
                                        {{ __('frontend.been_here_before') }}
                                    </a>
                                </li> --}}
                                @if (auth()->user())
                                    <li>
                                        <a href="{{ route('checkout.index') }}">{{ __('frontend.check_out') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('office.dashboard') }}">{{ __('frontend.go_to_dashboard') }}</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('login') }}">{{ __('frontend.login') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <div class="main" data-mobile-height="">
        @yield('content')
    </div>

    @yield('extras')
    @stack('modals')
    @stack('scripts')
    @yield('scripts')
    @include('frontend.layouts.partials.script._scripts')
    @stack('js')
</body>

</html>
