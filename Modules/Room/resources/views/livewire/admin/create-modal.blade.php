<div wire:ignore.self class="modal fade" id="room-create-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" role="dialog" aria-labelledby="room-create-modalLabel" aria-hidden="true">
    <div class="modal-dialog _modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="room-create-modalLabel">
                    {{ __('Add Room') }}
                    @if ($apartment)
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

                    @if (!$apartment ?? null)
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="fas fa-building"></i>
                                </span>
                                <select class="form-control" name="room[roomable_id]" aria-label="{{ __('apartment') }}"
                                    wire:model="room.roomable_id" required>
                                    <option value="">{{ __('Choose apartment') }}</option>
                                    @foreach ($apartments ?? [] as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('room.roomable_id')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    {{-- Name --}}
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-door-open _fa-beat-fade"></i>
                            </span>
                            <input type="text" class="form-control" name="room[name]" placeholder="Name"
                                aria-label="{{ __('room name') }}" wire:model="room.name" required />
                        </div>
                        @error('room.name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Active ? --}}
                    <div class="d-flex justify-content-between">
                        <div class="form-check form-check-primary form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="form-check-primary"
                                wire:model.defer="room.active">
                            <label class="form-check-label mb-0" for="form-check-primary">
                                {{ __('Active') }}
                            </label>
                        </div>
                        @error('room.active')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror

                        {{-- <a href="javascript:void(0);">Forget Password?</a> --}}
                    </div>
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
                @if ($apartment)
                    <input type="hidden" wire:model="room.roomable_id" value="{{ $apartment->id }}" />
                    <input type="hidden" wire:model="room.roomable_type" value="" />
                @endif
            </form>
        </div>
    </div>
</div>
