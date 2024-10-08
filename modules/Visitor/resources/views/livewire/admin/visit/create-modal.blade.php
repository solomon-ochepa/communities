<div wire:ignore.self class="modal fade" id="visit-create-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" role="dialog" aria-labelledby="visit-create-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visit-create-modalLabel">
                    {{ __('Visit Request') }}
                    @if (isset($visiting))
                        &rightarrow; {{ $visiting->user->name }}
                        {{-- &middot; {{ $visiting->roomable->name }} --}}

                        {{-- @if ($room)
                            &rightarrow; {{ $room->name }}
                            &middot; {{ $room->roomable->name }}
                        @elseif ($apartment)
                            &rightarrow; {{ $apartment->name }}
                        @endif --}}
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form x-data wire:submit.prevent="submit" class="mt-0" method="POST">
                <div class="modal-body">
                    <x-alert />

                    <div class="row">
                        <div
                            class="col-md-6{{ (isset($form['user_id']) and $form['user_id']) ? '' : ' offset-md-3 mx-auto' }}">
                            <div class="row gy-3">
                                {{-- user_id --}}
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text" title="Visitor" data-bs-toggle="tooltip">
                                            <i class="fas fa-user-tie"></i>
                                        </span>
                                        <select class="form-control" aria-label="Visitors"
                                            wire:model.lazy="form.user_id" required>
                                            <option value="">{{ __('Choose Visitor') }}</option>
                                            @foreach ($users ?? [] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['first_name'] }}
                                                    {{ $item['last_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('form.user_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                @if (isset($form['occupant_id']) and $form['occupant_id'])
                                    {{-- reason --}}
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-text" title="Reason for visiting"
                                                data-bs-toggle="tooltip">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <textarea class="form-control" placeholder="Reason(s) for visiting" rows="2" maxlength="840"
                                                aria-label="Reason for visiting" wire:model.lazy="visit.reason" required></textarea>
                                        </div>
                                        @error('visit.reason')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- arrived_at --}}
                                    <div class="col-md-12">
                                        <label for="">Expected time of arrival</label>
                                        <div class="input-group">
                                            <span class="input-group-text" title="Arrival Date"
                                                data-bs-toggle="tooltip">
                                                <i class="fas fa-clock"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control" aria-label="Arrival Date"
                                                wire:model.defer="visit.arrived_at" required />
                                        </div>
                                        @error('visit.arrived_at')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- expired_at --}}
                                    <div class="col-md-12">
                                        <label for="">Expiry date</label>
                                        <div class="input-group">
                                            <span class="input-group-text" title="Visit expiration date"
                                                data-bs-toggle="tooltip">
                                                <i class="fas fa-clock"></i>
                                            </span>
                                            <input type="datetime-local" class="form-control"
                                                aria-label="Visit expiration date" wire:model.defer="visit.expired_at"
                                                required />
                                        </div>
                                        @error('visit.expired_at')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if (isset($form['user_id']) and $form['user_id'])
                            <div class="col-md-6">
                                <div class="row gy-3">
                                    {{-- Visitable (Occupant ID) --}}
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-text" title="Occupant" data-bs-toggle="tooltip">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                            <select class="form-control" aria-label="Occupant"
                                                wire:model.lazy="form.occupant_id" required>
                                                <option value="">{{ __('Choose Occupant') }}</option>
                                                @foreach ($occupants ?? [] as $item)
                                                    <option value="{{ $item['id'] }}">
                                                        {{ $item['user']['first_name'] }}
                                                        {{ $item['user']['last_name'] }}
                                                        &rightarrow;
                                                        @if ($item['room'])
                                                            {{ $item['room']['name'] }} &rightarrow;
                                                        @endif
                                                        {{ $item['apartment']['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('form.occupant_id')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="switch form-switch-custom switch-inline form-switch-success">
                                        <input type="checkbox" class="switch-input" role="switch" checked
                                            id="gatepass" wire:model.lazy="form.gatepass" />
                                        <label class="switch-label" for="gatepass">
                                            Request <strong>Gatepass</strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button
                        class="btn btn-light-danger btn-no-effect _effect--ripple waves-effect waves-light mt-2 mb-2"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit"
                        class="btn btn-primary btn-no-effect _effect--ripple waves-effect waves-light mt-2 mb-2">{{ __('Submit') }}</button>
                </div>

                @csrf
            </form>
        </div>
    </div>
</div>
