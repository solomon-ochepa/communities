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
                        <div class="col-md-6">
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
                                        <span class="input-group-text" title="Arrival Date" data-bs-toggle="tooltip">
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
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row gy-3">
                                {{-- Visitable (Tenant ID) --}}
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text" title="Tenant" data-bs-toggle="tooltip">
                                            <i class="fas fa-user-tie"></i>
                                        </span>
                                        <select class="form-control" aria-label="Tenant"
                                            wire:model.lazy="form.tenant_id" required>
                                            <option value="">{{ __('Choose Tenant') }}</option>
                                            @foreach ($tenants ?? [] as $item)
                                                <option value="{{ $item['id'] }}">
                                                    {{ $item['user']['first_name'] }} {{ $item['user']['last_name'] }}
                                                    &rightarrow;
                                                    @if ($item['room'])
                                                        {{ $item['room']['name'] }} &rightarrow;
                                                    @endif
                                                    {{ $item['apartment']['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('form.tenant_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
            </form>
        </div>
    </div>
</div>
