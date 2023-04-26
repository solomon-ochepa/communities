<header class="header header-sticky">
    <div class="header-bottom menu-center">
        <div class="container">
            <div class="row justify-content-between">

                <!--Logo start-->
                <div class="col mt-10 mb-10">
                    <div class="logo">
                        <a href="/">
                            <x-logo class="navbar-logo w-20 h-20 mh-60 fill-current text-gray-500" alt="Logo"
                                style="max-height: 60px;" />
                        </a>
                    </div>
                </div>

                <!--Menu start-->
                {{-- <div class="col d-none d-lg-flex">
                    <nav class="main-menu">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/#services">Services</a></li>
                        </ul>
                    </nav>
                </div> --}}

                <!-- User -->
                <div class="col-auto mr-sm-50 _mr-xs-50">
                    <div class="header-user">
                        <a href="{{ route('login') }}" class="user-toggle" aria-label="Login or Register">
                            <i class="pe-7s-user"></i>
                            <span>Login or Register</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="row">
                <div class="col-12 d-flex d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
