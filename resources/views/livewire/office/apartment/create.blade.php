<div class="section-body">
    <div class="card">
        <form wire:submit.prevent="submit" method="POST">
            @csrf

            <div class="card-body p-3">
                <x-alerts />

                <section class="row d-none g-3 pb-3 mb-2 bg-secondary rounded">
                    {{-- Parent --}}
                    <div class="col-md-4">
                        <label for="apartment-parent" class="form-label">Parent</label>
                        <select disabled id="apartment-parent" class="form-select"
                            @error('apartment.parent_id') is-invalid @enderror wire:model.lazy="apartment.parent_id">
                            <option selected>Choose...</option>
                            <option>...</option>
                            {{-- @foreach (trans('statuses') as $key => $status)
                                <option value="{{ $key }}" {{ old('status') == $key ? 'selected' : '' }}>
                                    {{ $status }}</option>
                            @endforeach --}}
                        </select>
                        @error('apartment.parent_id')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Position --}}
                    <div class="col-md-4">
                        <label for="apartment-position" class="form-label">Position</label>
                        <select disabled id="apartment-position" class="form-select"
                            @error('apartment.tag') is-invalid @enderror wire:model.lazy="apartment.tag" multiple
                            size="1">
                            <option selected disabled>Choose...</option>
                            <option value="">All</option>
                        </select>
                        @error('apartment.tag')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Priority --}}
                    <div class="col-md-4">
                        <label for="apartment-priority" class="form-label">Priority</label>
                        <input type="number" class="form-control" id="apartment-priority"
                            @error('apartment.priority') is-invalid @enderror value="{{ old('apartment.priority') }}"
                            placeholder="0" wire:model.lazy="apartment.priority">
                        @error('apartment.priority')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </section>

                <section class="row g-3">
                    {{-- Name --}}
                    <div class="col-md-12">
                        <label for="apartment-name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="apartment-name"
                            @error('apartment.name') is-invalid @enderror value="{{ old('apartment.name') }}" required
                            placeholder="" wire:model.lazy="apartment.name">
                        @error('apartment.name')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Active? --}}
                    <div class="col-12">
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
                </section>
            </div>

            <div class="card-footer text-right">
                <button class="btn btn-primary _mr-1" type="submit">{{ __('levels.submit') }}</button>
            </div>
        </form>
    </div>
</div>
