<div class="section-body">
    <div class="card">
        <form wire:submit.prevent="submit" method="POST">
            @csrf

            <div class="card-body p-3">
                <x-alert />

                <section class="row d-none g-3 pb-3 mb-2 bg-secondary rounded">
                    {{-- Parent --}}
                    <div class="col-md-4">
                        <label for="room-parent" class="form-label">Parent</label>
                        <select disabled id="room-parent" class="form-select"
                            @error('room.parent_id') is-invalid @enderror wire:model.lazy="room.parent_id">
                            <option selected>Choose...</option>
                            <option>...</option>
                            {{-- @foreach (trans('statuses') as $key => $status)
                                <option value="{{ $key }}" {{ old('status') == $key ? 'selected' : '' }}>
                                    {{ $status }}</option>
                            @endforeach --}}
                        </select>
                        @error('room.parent_id')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Position --}}
                    <div class="col-md-4">
                        <label for="room-position" class="form-label">Position</label>
                        <select disabled id="room-position" class="form-select" @error('room.tag') is-invalid @enderror
                            wire:model.lazy="room.tag" multiple size="1">
                            <option selected disabled>Choose...</option>
                            <option value="">All</option>
                        </select>
                        @error('room.tag')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Priority --}}
                    <div class="col-md-4">
                        <label for="room-priority" class="form-label">Priority</label>
                        <input type="number" class="form-control" id="room-priority"
                            @error('room.priority') is-invalid @enderror value="{{ old('room.priority') }}"
                            placeholder="0" wire:model.lazy="room.priority">
                        @error('room.priority')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </section>

                <section class="row g-3">
                    {{-- Name --}}
                    <div class="col-md-12">
                        <label for="room-name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="room-name"
                            @error('room.name') is-invalid @enderror value="{{ old('room.name') }}" required
                            placeholder="" wire:model.lazy="room.name">
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
                <button class="btn btn-primary _mr-1" type="submit">{{ __('levels.submit') }}</button>
            </div>
        </form>
    </div>
</div>
