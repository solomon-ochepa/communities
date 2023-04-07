<div class="section-body mb-3">
    <div class="card">
        <x-alert />

        <form wire:submit.prevent="submit" method="POST">
            @csrf

            <div class="card-body">
                <section class="row gy-3 pb-3 mb-2 bg-secondary rounded">
                    {{-- Parent --}}
                    <div class="col-md-6">
                        <label for="menu-parent" class="form-label">Parent</label>
                        <select _disabled id="menu-parent" class="form-select"
                            @error('menu.parent_id') is-invalid @enderror wire:model.lazy="menu.parent_id">
                            <option selected value="">Choose...</option>
                            @foreach ($parent_menus ?? [] as $key => $item)
                                <option value="{{ $item->id }}"
                                    {{ old('menu.parent_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('menu.parent_id')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Priority --}}
                    <div class="col-md-6">
                        <label for="menu-priority" class="form-label">Priority</label>
                        <input type="number" class="form-control" id="menu-priority"
                            @error('menu.priority') is-invalid @enderror value="{{ old('menu.priority') }}"
                            placeholder="0" wire:model.lazy="menu.priority">
                        @error('menu.priority')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </section>

                <section class="row g-3">
                    {{-- Name --}}
                    <div class="col-md-6">
                        <label for="menu-name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="menu-name"
                            @error('menu.name') is-invalid @enderror value="{{ old('menu.name') }}" placeholder="Home"
                            required wire:model.lazy="menu.name">
                        @error('menu.name')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Icon --}}
                    <div class="col-md-6">
                        <label for="menu-icon" class="form-label">Icon</label>
                        <input type="text" class="form-control" id="menu-icon"
                            @error('menu.icon') is-invalid @enderror value="{{ old('menu.icon') }}"
                            placeholder="fas fa-home" wire:model.lazy="menu.icon">
                        @error('menu.icon')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- URL --}}
                    <div class="col-md-12">
                        <label for="menu-url" class="form-label">URL <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="menu-url"
                            @error('menu.url') is-invalid @enderror value="{{ old('menu.url') }}" placeholder="home"
                            required wire:model.lazy="menu.url">
                        @error('menu.url')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Active? --}}
                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="menu-active"
                                @error('menu.active') is-invalid @enderror value="{{ old('menu.active') }}"
                                wire:model.lazy="menu.active">
                            <label class="form-check-label" for="menu-active">
                                Is active?
                            </label>
                        </div>
                        @error('menu.active')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </section>
            </div>

            <div class="card-footer text-end">
                <button class="btn btn-primary me-1" type="submit">{{ __('Submit') }}</button>
                <a href="{{ route('admin.menu.index') }}" class="btn btn-muted">
                    <i class="fas fa-undo"></i>
                    {{ __('Return') }}
                </a>
            </div>
        </form>
    </div>
</div>
