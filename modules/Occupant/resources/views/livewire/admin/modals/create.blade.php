<div aria-hidden="true" aria-labelledby="occupant-create-modalLabel" class="modal fade" data-bs-backdrop="static"
    data-bs-keyboard="false" id="occupant-create-modal" role="dialog" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="occupant-create-modalLabel">
                    {{ __('Add Tenant') }}
                    @if ($room)
                        &rightarrow; {{ $room->name }}
                        &middot; {{ $room->roomable->name }}
                    @elseif ($apartment)
                        &rightarrow; {{ $apartment->name }}
                    @endif
                </h5>
                <button aria-hidden="true" aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form class="mt-0" method="POST" wire:submit.prevent="submit" x-data>
                <div class="modal-body">
                    <x-alert />

                    {{-- User ID --}}
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text" data-bs-toggle="tooltip" title="User">
                                <i class="fas fa-user"></i>
                            </span>
                            <select aria-label="users" class="form-control" required wire:model="occupant.user_id">
                                <option value="">{{ __('Choose User') }}</option>
                                @foreach ($users ?? [] as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('occupant.user_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($occupant->user_id)
                        @if (!$apartment and !$room)
                            <div class="form-group mt-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-building"></i>
                                    </span>
                                    <select aria-label="{{ __('apartment') }}" class="form-control"
                                        name="occupant[apartment_id]" required wire:model="occupant.apartment_id">
                                        <option value="">{{ __('Choose apartment') }}</option>
                                        @foreach ($apartments ?? [] as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('occupant.apartment_id')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        @if ($occupant->apartment_id)
                            @if (!$room)
                                {{-- Room --}}
                                <div class="form-group mt-3">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-door-open _fa-beat-fade"></i>
                                        </span>
                                        <select aria-label="{{ __('Room') }}" class="form-control"
                                            name="occupant[room_id]" required wire:model="occupant.room_id">
                                            <option value="0">{{ __('All rooms') }}</option>
                                            @foreach ($rooms ?? [] as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('occupant.room_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            @endif

                            {{-- Move in --}}
                            <div class="form-group">
                                <div class="input-group mt-3">
                                    <span class="input-group-text" data-bs-toggle="tooltip" title="Moved in"
                                        type="button">
                                        <i class="fa-solid fa-person-walking _fa-beat-fade"></i>
                                    </span>
                                    <input aria-label="{{ __('Moved in') }}" class="form-control" name="form[moved_in]"
                                        required type="date" wire:model="form.moved_in" />
                                </div>
                                @error('form.moved_in')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Active ? --}}
                            <div class="d-flex justify-content-between">
                                <div class="form-check form-check-primary form-check-inline">
                                    <input class="form-check-input" data-bs-toggle="tooltip" id="form-check-primary"
                                        title="" type="checkbox" value="" wire:model.defer="occupant.active">
                                    <label class="form-check-label mb-0" for="form-check-primary">
                                        {{ __('Active') }}
                                    </label>
                                </div>
                                @error('occupant.active')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                {{-- <a href="javascript:void(0);">Forget Password?</a> --}}
                            </div>
                        @endif
                    @endif
                </div>

                <div class="modal-footer">
                    <button
                        class="btn btn-light-danger btn-no-effect _effect--ripple waves-effect waves-light mb-2 mt-2"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-primary btn-no-effect _effect--ripple waves-effect waves-light mb-2 mt-2"
                        type="submit">{{ __('Submit') }}</button>
                </div>

                @csrf
                @method('PUT')

                @if ($room)
                    <input type="hidden" value="{{ $room->roomable->id }}" wire:model="occupant.apartment_id" />
                    <input type="hidden" value="{{ $room->id }}" wire:model="occupant.room_id" />
                @elseif ($apartment)
                    <input type="hidden" value="{{ $apartment->id }}" wire:model="occupant.apartment_id" />
                @endif
            </form>
        </div>
    </div>
</div>
