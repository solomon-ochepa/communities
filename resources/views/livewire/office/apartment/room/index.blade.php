<div class="card-body">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @isset($rooms)
        <div class="table-responsive">
            {{-- Filter --}}
            <section class="row">
                {{-- Limit --}}
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="maintable_length">
                        <label class="d-flex justify-content-start align-items-center">
                            <span class="mr-1">Show</span>
                            <select wire:model.lazy="limit"
                                class="custom-select custom-select-sm form-control form-control-sm w-25 mr-1">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="_col-auto">entries</span>
                        </label>
                    </div>
                </div>

                {{-- Search --}}
                <div class="col-sm-12 col-md-6">
                    <div id="maintable_filter" class="dataTables_filter">
                        <label class="d-flex justify-content-start align-items-center">
                            <span class="mr-1">Search:</span>
                            <input type="search" class="form-control form-control-sm" placeholder="" wire:model="search">
                        </label>
                    </div>
                </div>
            </section>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="">
                            <input disabled type="checkbox" name="select_all" id="select_all"
                                wire:model.defer="select_all" />
                        </th>
                        <th>{{ __('word.name') }}</th>
                        <th>{{ __('resident.resident') }}</th>
                        <th>{{ __('word.active') }}</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rooms ?? [] as $key => $room)
                        <tr>
                            <td>
                                <input disabled type="checkbox" name="selected" id="selected"
                                    wire:model.defer="selected.{{ $key }}.{{ $room->id }}" />
                            </td>
                            <td>
                                <a class="text-dark"
                                    href="{{ route('office.apartment.room.show', ['apartment' => $room->apartment->slug, 'room' => $room->slug]) }}">
                                    {{ $room->name }}
                                </a>
                            </td>
                            <td>
                                {{ $room->residents->count() }}
                            </td>
                            <td>
                                @if ($room->active)
                                    <i class="fas fa-check text-success"></i>
                                    Active
                                @else
                                    <i class="fas fa-times text-danger"></i>
                                    Disabled
                                @endif
                            </td>
                            <td class="text-right">
                                <a href="#" class="btn btn-sm text-decoration-none">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="#" class="btn btn-sm text-decoration-none">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="#" class="btn btn-sm text-decoration-none">
                                    <i class="fas fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $rooms->links() }}
    @else
        ...room rooms not found.
    @endisset
</div>
