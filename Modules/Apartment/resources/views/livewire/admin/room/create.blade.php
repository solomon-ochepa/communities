<div class="card">
    <form wire:submit.prevent="store" method="POST">
        @csrf

        <div class="card-body">
            <x-alert />

            <section class="row g-3">
                {{-- Name --}}
                <div class="col-md-12">
                    <label for="room-name" class="form-label">{{ __('Name') }}
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="room-name" @error('room.name') is-invalid @enderror
                        value="{{ old('room.name') }}" required placeholder="" wire:model.lazy="room.name">
                    @error('room.name')
                        <div class="invalid-feedback form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Active? --}}
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="room-active"
                            @error('room.active') is-invalid @enderror value="{{ old('room.active') }}"
                            wire:model.lazy="room.active">
                        <label class="form-check-label" for="room-active">
                            Is active?
                        </label>
                    </div>
                    @error('room.active')
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
