<div class="section-body">
    <div class="card">
        <div class="card-body p-3 rounded shadow bg-secondary">
            <x-alerts />

            {{-- Search --}}
            <section class="row g-3 _mb-3 _pb-3">
                <div class="col-md-12">
                    <label for="search-user" class="form-label">User ID</label>
                    <input type="search" class="form-control" id="search-user" value="{{ old('search') }}" placeholder=""
                        wire:model="search" />
                    <div class="form-text">
                        Search by names, email, telephone, NIN etc.
                    </div>
                </div>

                @if ($users->count())
                    {{-- Search results --}}
                    <div class="col-md-12">
                        <ul class="list-group _list-group-flush">
                            @foreach ($users ?? [] as $key => $user)
                                @php
                                    $exists = in_array($user['id'], $apartment->residents->pluck('user_id')->toArray());
                                    $check = in_array($user['id'], $checked->pluck('id')->toArray());
                                @endphp
                                <li class="list-group-item">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" aria-label=""
                                            {{ $check ? 'checked ' : '' }}
                                            @if ($exists) checked disabled @else id="{{ md5('checked-user-' . $user['id']) }}" wire:change="check({{ $user['id'] }})" @endif />
                                        <label for="{{ md5('checked-user-' . $user['id']) }}"
                                            @if ($exists) title="User already allocated" class="text-muted" @endif
                                            data-bs-toggle="tooltip">
                                            <i class="fas fa-user-tie"></i>
                                            {{ $user['first_name'] }} {{ $user['last_name'] }}
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </section>
        </div>

        <form wire:submit.prevent="submit" class="needs-validation" _novalidate>
            @csrf

            <section class="card-body p-3">
                <div class="accordion _accordion-flush" id="residents-accordion">
                    @php $open = true; @endphp
                    @forelse ($checked ?? [] as $key => $user)
                        {{-- {{ dd($user) }} --}}
                        <div class="accordion-item" wire:key="resident-{{ $user['id'] }}">
                            <h3 class="accordion-header p-0 fw-bold rounded-top bg-muted"
                                id="resident-accordion-header-{{ $user['id'] }}">
                                <button class="accordion-button {{ ($key == 0 or $open) ?: ' collapsed' }}"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#resident-accordion-{{ $user['id'] }}"
                                    aria-expanded="{{ ($key == 0 or $open) ? 'true' : 'false' }}"
                                    aria-controls="resident-accordion-{{ $user['id'] }}">
                                    {{-- <span class="me-2">{{ $key + 1 }}.</span> --}}
                                    <span class="me-2" title="Names" data-bs-toggle="tooltip">
                                        <i class="fas fa-user"></i>
                                        <span>{{ $user['first_name'] }} {{ $user['last_name'] }}</span>
                                    </span>

                                    <span class="me-2" title="Phone number" data-bs-toggle="tooltip">
                                        <i class="fas fa-phone-alt"></i>
                                        <span>{{ $user['phone'] }}</span>
                                    </span>
                                </button>
                            </h3>

                            <div id="resident-accordion-{{ $user['id'] }}"
                                class="accordion-collapse collapse {{ ($key == 0 or $open) ? 'show' : '' }}"
                                aria-labelledby="resident-accordion-header-{{ $user['id'] }}"
                                data-bs-parent="#residents-accordion">
                                <div class="accordion-body p-3">
                                    <section class="row gy-3 pb-md-0 pb-2">
                                        {{-- Room --}}
                                        <div class="col-sm-6">
                                            <label class="form-label" for="room">
                                                Room <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="room-icon">
                                                    <i class="fas fa-home"></i>
                                                </span>
                                                <select id="menu-parent" class="form-select"
                                                    @error("residents.{$user['id']}.room_id") is-invalid @enderror
                                                    wire:model.lazy="residents.{{ $user['id'] }}.room_id" required>
                                                    <option>Choose...</option>
                                                    @foreach ($apartment->rooms as $room)
                                                        <option value="{{ $room->id }}"
                                                            @isset($user['room_id']) @if ($user['room_id'] == $room->id) selected @endif @endisset>
                                                            {{ $room->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error("residents.{$user['id']}.room_id")
                                                    <div class="form-text text-danger error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Moved in --}}
                                        <div class="col-sm-6">
                                            <label class="form-label" for="room">Moved in
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="room-icon">
                                                    <i class="fas fa-clock"></i>
                                                </span>
                                                <input type="date" value="{{ $user['moved_in'] ?? '' }}"
                                                    id="room" class="form-control" placeholder=""
                                                    @error("residents.{$user['id']}.moved_in") is-invalid @enderror
                                                    wire:model.lazy="residents.{{ $user['id'] }}.moved_in"
                                                    aria-label="Moved in" aria-describedby="room-icon" _required />
                                                @error("residents.{$user['id']}.moved_in")
                                                    <div class="form-text text-danger error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                        @if ($open)
                            @php
                                $open = false;
                            @endphp
                        @endif
                    @empty
                        No user checked!
                    @endforelse
                </div>
            </section>

            <div class="card-footer text-right">
                <button class="btn btn-primary _mr-1" type="submit">{{ __('levels.submit') }}</button>
            </div>
        </form>
    </div>
</div>
