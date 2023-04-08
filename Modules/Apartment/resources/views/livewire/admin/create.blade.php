<div class="card">
    <form wire:submit.prevent="submit" method="POST">
        @csrf

        <div class="card-body p-3">
            <x-alert />

            <section class="row g-3">
                {{-- Name --}}
                <div class="col-md-12">
                    <div class="input-group">
                        <label for="apartment-name" class="input-group-text m-0">
                            <i class="fas fa-edit"></i>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="apartment-name"
                            @error('apartment.name') is-invalid @enderror value="{{ old('apartment.name') }}" required
                            placeholder="{{ __('Name') }}" wire:model.lazy="apartment.name">
                    </div>
                    @error('apartment.name')
                        <div class="invalid-feedback form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Active? --}}
                <div class="col-md-10">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="apartment-active"
                            @error('apartment.active') is-invalid @enderror value="{{ old('apartment.active') }}"
                            wire:model.lazy="apartment.active">
                        <label class="form-check-label" for="apartment-active">
                            Is active?
                        </label>
                    </div>
                    @error('apartment.active')
                        <div class="invalid-feedback form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Rooms --}}
                <div class="col-md-2">
                    <div class="input-group input-group-sm">
                        <label class="input-group-text m-0" for="rooms">
                            <i class="fas fa-home"></i>
                        </label>
                        <input type="number" class="form-control" id="rooms" @error('rooms') is-invalid @enderror
                            value="{{ old('rooms') }}" placeholder="{{ __('Rooms') }}" wire:model.lazy="rooms">
                    </div>
                    @error('rooms')
                        <div class="invalid-feedback form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </section>
        </div>

        <div class="card-footer text-right">
            <button class="btn btn-primary _mr-1" type="submit">{{ __('Submit') }}</button>
        </div>
    </form>
</div>
