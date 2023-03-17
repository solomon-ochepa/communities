<div wire:ignore.self class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content _bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Resident</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" wire:submit.prevent="store()">
                <div class="modal-body">
                    <x-alert />

                    <div class="row gy-3">
                        <div class="col-md-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <select wire:model="resident.user_id" class="form-control" required>
                                    <option value="">User ?</option>
                                    @foreach ($users ?? [] as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name . ' - ' . $item->phone }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text">
                                    <i class="fas fa-home"></i>
                                </span>
                                <select wire:model="resident.apartment_id" class="form-control" required>
                                    <option value="">Apartment ?</option>
                                    @foreach ($apartments ?? [] as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if ($apartment)
                            <div class="col-md-6">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">
                                        <i class="fas fa-bed"></i>
                                    </span>
                                    <select wire:model="resident.room_id" class="form-control" required>
                                        <option value="">Room ?</option>
                                        @foreach ($apartment->rooms ?? [] as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                @csrf
            </form>
        </div>
    </div>
</div>
