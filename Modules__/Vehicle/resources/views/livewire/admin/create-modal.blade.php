<div wire:ignore.self class="modal fade" id="vehicle-create-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" role="dialog" aria-labelledby="vehicle-create-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg _modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vehicle-create-modalLabel">
                    {{ __('Register a new Vihicle') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form x-data wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    {{-- <x-alert /> --}}

                    <div class="row">
                        <section class="col-md-9">
                            <div class="row gy-3">
                                {{-- vrn --}}
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            title="{{ __('Vehicle Registration (Plate) Number') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-car"></i>
                                        </span>
                                        <input type="text" value="{{ old('vehicle.vrn') }}"
                                            class="form-control @error('vehicle.vrn') is-invalid @enderror"
                                            aria-label="{{ __('Vehicle Registration (Plate) Number') }}"
                                            placeholder="{{ __('Registration Number') }}" wire:model.lazy="vehicle.vrn"
                                            required />
                                    </div>
                                    @error('vehicle.vrn')
                                        <div class="form-text text-danger">{{ __($message) }}</div>
                                    @enderror
                                </div>

                                {{-- vin --}}
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text" title="{{ __('VIN') }}"
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-car"></i>
                                        </span>
                                        <input type="text"
                                            class="form-control @error('vehicle.vin') is-invalid @enderror"
                                            value="{{ old('vehicle.vin') }}" aria-label="{{ __('VIN') }}"
                                            placeholder="{{ __('VIN') }}" wire:model.lazy="vehicle.vin" />
                                    </div>
                                    @error('vehicle.vin')
                                        <div class="form-text text-danger">{{ __($message) }}</div>
                                    @enderror
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
