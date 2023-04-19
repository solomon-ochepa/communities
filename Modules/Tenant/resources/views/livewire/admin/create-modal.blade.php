<div wire:ignore.self class="modal fade" id="tenant-create-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" role="dialog" aria-labelledby="tenant-create-modalLabel" aria-hidden="true">
    <div class="modal-dialog _modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tenant-create-modalLabel">
                    {{ __('Add Tenant') }}
                    @if ($room)
                        &rightarrow; {{ $room->name }}
                        &middot; {{ $room->roomable->name }}
                    @elseif ($apartment)
                        &rightarrow; {{ $apartment->name }}
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form x-data wire:submit.prevent="submit" class="mt-0" method="POST">
                <div class="modal-body">
                    <x-alert />

                    {{-- User ID --}}
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text" title="User" data-bs-toggle="tooltip">
                                <i class="fas fa-user"></i>
                            </span>
                            <select class="form-control" aria-label="users" wire:model="tenant.user_id" required>
                                <option value="">{{ __('Choose User') }}</option>
                                @foreach ($users ?? [] as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('tenant.user_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($tenant->user_id)
                        @if (!$apartment and !$room)
                            <div class="form-group mt-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-building"></i>
                                    </span>
                                    <select class="form-control" name="tenant[apartment_id]"
                                        aria-label="{{ __('apartment') }}" wire:model="tenant.apartment_id" required>
                                        <option value="">{{ __('Choose apartment') }}</option>
                                        @foreach ($apartments ?? [] as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tenant.apartment_id')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        @if ($tenant->apartment_id)
                            @if (!$room)
                                {{-- Room --}}
                                <div class="form-group mt-3">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-door-open _fa-beat-fade"></i>
                                        </span>
                                        <select class="form-control" name="tenant[room_id]"
                                            aria-label="{{ __('Room') }}" wire:model="tenant.room_id" required>
                                            <option value="0">{{ __('All rooms') }}</option>
                                            @foreach ($rooms ?? [] as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tenant.room_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            @endif

                            {{-- Move in --}}
                            <div class="form-group">
                                <div class="input-group mt-3">
                                    <span class="input-group-text" type="button" title="Moved in"
                                        data-bs-toggle="tooltip">
                                        <i class="fa-solid fa-person-walking _fa-beat-fade"></i>
                                    </span>
                                    <input type="date" class="form-control" name="form[moved_in]"
                                        aria-label="{{ __('Moved in') }}" wire:model="form.moved_in" required />
                                </div>
                                @error('form.moved_in')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Active ? --}}
                            <div class="d-flex justify-content-between">
                                <div class="form-check form-check-primary form-check-inline">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="form-check-primary" wire:model.defer="tenant.active" title=""
                                        data-bs-toggle="tooltip">
                                    <label class="form-check-label mb-0" for="form-check-primary">
                                        {{ __('Active') }}
                                    </label>
                                </div>
                                @error('tenant.active')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                {{-- <a href="javascript:void(0);">Forget Password?</a> --}}
                            </div>
                        @endif
                    @endif
                </div>

                <div class="modal-footer">
                    <button
                        class="btn btn-light-danger mt-2 mb-2 btn-no-effect _effect--ripple waves-effect waves-light"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-no-effect _effect--ripple waves-effect waves-light">{{ __('Submit') }}</button>
                </div>

                @csrf
                @method('PUT')
                @if ($room)
                    <input type="hidden" wire:model="tenant.apartment_id" value="{{ $room->roomable->id }}" />
                    <input type="hidden" wire:model="tenant.room_id" value="{{ $room->id }}" />
                @elseif ($apartment)
                    <input type="hidden" wire:model="tenant.apartment_id" value="{{ $apartment->id }}" />
                @endif
            </form>
        </div>
    </div>
</div>
