<div wire:ignore.self class="modal fade" id="gatepass-create-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" role="dialog" aria-labelledby="gatepass-create-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg _modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gatepass-create-modalLabel">
                    {{ __('Create Gatepass') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form x-data wire:submit.prevent="submit" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    {{-- <x-alert /> --}}

                    <div class="row">
                        <section class="col-md-9">
                            <div class="row gy-3">
                                {{-- first_name --}}
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('First Name') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" name="user[first_name]"
                                            class="form-control @error('user.first_name') is-invalid @enderror"
                                            value="{{ old('user.first_name') }}" aria-label="{{ __('First Name') }}"
                                            placeholder="{{ __('First Name') }}" wire:model.lazy="user.first_name"
                                            required>
                                    </div>
                                    @error('user.first_name')
                                        <div class="form-text text-danger">{{ __($message) }}</div>
                                    @enderror
                                </div>

                                {{-- last_name --}}
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('Last Name') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" name="user[last_name]"
                                            class="form-control @error('user.last_name') is-invalid @enderror"
                                            value="{{ old('user.last_name') }}" aria-label="{{ __('Last Name') }}"
                                            placeholder="{{ __('Last Name') }}" wire:model.lazy="user.last_name"
                                            required>
                                    </div>
                                    @error('user.last_name')
                                        <div class="form-text text-danger">{{ __($message) }}</div>
                                    @enderror
                                </div>

                                {{-- username --}}
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('Username') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-user-tie"></i>
                                        </span>
                                        <input type="tel" name="user[username]"
                                            class="form-control @error('user.username') is-invalid @enderror"
                                            value="{{ old('user.username') }}" aria-label="{{ __('Username') }}"
                                            placeholder="{{ __('Username') }}" wire:model.lazy="user.username"
                                            required>
                                    </div>
                                    @error('user.username')
                                        <div class="form-text text-danger">{{ __($message) }}</div>
                                    @enderror
                                </div>

                                {{-- phone --}}
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('Phone') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                        <input type="tel" name="user[phone]"
                                            class="form-control @error('user.phone') is-invalid @enderror"
                                            value="{{ old('user.phone') }}" aria-label="{{ __('Phone') }}"
                                            placeholder="{{ __('Phone') }}" wire:model.lazy="user.phone" required>
                                    </div>
                                    @error('user.phone')
                                        <div class="form-text text-danger">{{ __($message) }}</div>
                                    @enderror
                                </div>

                                {{-- email --}}
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('Email') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" name="user[email]"
                                            class="form-control @error('user.email') is-invalid @enderror"
                                            value="{{ old('user.email') }}" aria-label="{{ __('Email') }}"
                                            placeholder="{{ __('Email') }}" wire:model.lazy="user.email" required>
                                    </div>
                                    @error('user.email')
                                        <div class="form-text text-danger">{{ __($message) }}</div>
                                    @enderror
                                </div>

                                {{-- password --}}
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('Password') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-user-lock"></i>
                                        </span>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{ old('password') }}" aria-label="{{ __('Password') }}"
                                            placeholder="{{ __('Password') }}" wire:model.lazy="password" required>
                                    </div>
                                    @error('password')
                                        <div class="form-text text-danger">{{ __($message) }}</div>
                                    @enderror
                                </div>

                                {{-- password_confirmation --}}
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('Confirm Password') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-user-lock"></i>
                                        </span>
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            value="{{ old('password_confirmation') }}"
                                            aria-label="{{ __('Confirm Password') }}"
                                            placeholder="{{ __('Confirm Password') }}"
                                            wire:model.lazy="password_confirmation" required>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="form-text text-danger">{{ __($message) }}</div>
                                    @enderror
                                </div>

                                {{-- user.address --}}
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('Address') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-home"></i>
                                        </span>
                                        <textarea name="user[address]" class="form-control small-textarea-height" id="user-address" placeholder="Address"
                                            _rows="1" wire:model.lazy="user.address">{{ old('user.address') }}</textarea>
                                        @error('user.address')
                                            <div class="invalid-feedback form-text">
                                                {{ __($message) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="col-md-3">
                            <div class="row gy-3">
                                {{-- image --}}
                                <div class="col-md-12">
                                    {{-- Image Preview --}}
                                    @if ($image)
                                        <img class="img-thumbnail d-block image-width mb-3" id="previewImage"
                                            src="{{ $image->temporaryUrl() }}" alt="Profile Image" />
                                    @else
                                        <img class="img-thumbnail d-block image-width mb-3" id="previewImage"
                                            src="{{ asset('unknown.svg') }}" alt="Profile Image" />
                                    @endif

                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('Profile Image') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-image"></i>
                                        </span>
                                        <input name="image" type="file"
                                            class="form-control @error('image') is-invalid @enderror" id="image"
                                            wire:model.lazy="image" />
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback form-text help-block text-danger">
                                            {{ __($message) }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- roles --}}
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('Role') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-user-cog"></i>
                                        </span>
                                        <select id="role" name="role"
                                            class="form-control @error('role') is-invalid @enderror"
                                            wire:model.lazy="role" required>
                                            <option value="">Choose role</option>
                                            @foreach ($roles ?? [] as $id => $name)
                                                <option value="{{ $id }}"
                                                    {{ old('role') == $id ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role')
                                        <div class="invalid-feedback form-text">
                                            {{ __($message) }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="modal-footer">
                    <button
                        class="btn btn-light-danger mt-2 mb-2 btn-no-effect _effect--ripple waves-effect waves-light"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-no-effect _effect--ripple waves-effect waves-light">{{ __('Submit') }}</button>
                </div>

                @csrf
            </form>
        </div>
    </div>
</div>
