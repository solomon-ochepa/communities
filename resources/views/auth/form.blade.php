<div
    class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-12 ms-auto me-auto">
                <x-alert />

                <ul class="login-register-tab-list nav">
                    <li><a class="active" href="#login-tab" data-bs-toggle="tab">Login</a></li>
                    <li>or</li>
                    <li><a href="#register-tab" data-bs-toggle="tab">Register</a></li>
                </ul>

                <div class="tab-content">
                    <div id="login-tab" class="tab-pane show active">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row">
                                <!-- Email Address -->
                                <div class="col-12 mb-3">
                                    <input class="form-control" type="email" placeholder="Email" name="email"
                                        :value="old('email')" autofocus autocomplete="username" required />
                                    @error('email')
                                        <div class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-12 mb-3">
                                    <input class="form-control" type="password" id="password" name="password"
                                        autocomplete="current-password" placeholder="Password" required />
                                    @error('password')
                                        <div class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Remember Me -->
                                <div class="col-12 mb-3">
                                    <ul>
                                        <li>
                                            <input class="rounded" type="checkbox" id="remember_me" />
                                            <label for="remember_me">
                                                <span
                                                    class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12 mb-3"><button class="btn">Login</button></div>

                                <div class="col-12 d-flex justify-content-between">
                                    <span>
                                        New to {{ config('app.name') }}?
                                        <a class="register-toggle" href="#register-tab">Register now!</a>
                                    </span>

                                    @if (Route::has('password.request'))
                                        <span>
                                            <a href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>

                    @if (Route::has('register'))
                        <div id="register-tab" class="tab-pane">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row gy-3">
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" id="first_name"
                                                name="user[first_name]" :value="old('user.first_name')"
                                                placeholder="First Name" autofocus autocomplete="first_name" required />
                                            @error('user.first_name')
                                                <div class="form-text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" id="last_name"
                                                name="user[last_name]" :value="old('user.last_name')"
                                                placeholder="Last Name" autocomplete="last_name" required />
                                        </div>
                                        @error('user.last_name')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Username -->
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                            <input type="text" class="form-control" id="username"
                                                name="user[username]" :value="old('user.username')"
                                                placeholder="Username" title="Username" data-bs-toggle="tooltip"
                                                autocomplete="username" required />
                                        </div>
                                        @error('user.username')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input type="tel" class="form-control" id="phone" name="user[phone]"
                                                :value="old('user.phone')" placeholder="Phone" title="Phone"
                                                data-bs-toggle="tooltip" autocomplete="phone" required />
                                        </div>
                                        @error('user.phone')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control" id="email"
                                                name="user[email]" :value="old('user.email')" placeholder="Email"
                                                title="Email" data-bs-toggle="tooltip" autocomplete="email"
                                                required />
                                        </div>
                                        @error('user.email')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <input type="password" class="form-control" id="password"
                                                name="password" placeholder="Password" title="Password"
                                                data-bs-toggle="tooltip" autocomplete="new-password" required />
                                        </div>
                                        @error('password')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Confirm Password -->
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" placeholder="Confirm Password"
                                                title="Confirm Password" data-bs-toggle="tooltip"
                                                autocomplete="new-password" required />
                                        </div>
                                        @error('password_confirmation')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-12">
                                            <ul>
                                                <li>
                                                    <input type="checkbox" id="register_agree" required>
                                                    <label for="register_agree">I agree with your <a
                                                            href="#">Terms & Conditions</a>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div> --}}

                                    {{-- <div class="col-12">
                                        <ul>
                                            <li><input type="radio" name="account_type" id="register_normal"
                                                    checked><label for="register_normal">Normal</label></li>
                                            <li><input type="radio" name="account_type" id="register_agent"><label
                                                    for="register_agent">Agent</label></li>
                                            <li><input type="radio" name="account_type" id="register_agency"><label
                                                    for="register_agency">Agency</label></li>
                                        </ul>
                                    </div> --}}
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-sm rounded btn-primary">Register</button>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between">
                                        <span>{{ __('Already registered?') }}&nbsp;
                                            <a class="register-toggle" href="#login-tab">Login now!</a>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
