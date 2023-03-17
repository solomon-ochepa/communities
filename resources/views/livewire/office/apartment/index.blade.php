<div class="card-body">
    <!-- Knowing others is intelligence; knowing yourself is true wisdom. -->

    <section class="row">
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="maintable_length">
                <label class="d-flex justify-content-start align-items-center">
                    <span class="me-1">Show</span>
                    <select wire:model.lazy="limit"
                        class="custom-select custom-select-sm form-control form-control-sm w-25 me-1">
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
                    <span class="me-1">Search:</span>
                    <input type="search" class="form-control form-control-sm" placeholder="" wire:model="search">
                </label>
            </div>
        </div>
    </section>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">{{ __('#') }}</th>
                    <th scope="col">{{ __('label.name') }}</th>
                    <th scope="col">{{ __('room.room') }}</th>
                    <th scope="col">{{ __('resident.resident') }}</th>
                    <th scope="col">{{ __('label.active') }}</th>
                    <th scope="col" class="text-right"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($apartments ?? [] as $key => $apartment)
                    <tr>
                        <td>
                            <input type="checkbox" name="selected" id="selected"
                                wire:model.defer="selected.{{ $key }}.{{ $apartment->id }}" />
                        </td>
                        <td>
                            <a href="{{ route('office.apartment.show', ['apartment' => $apartment->slug]) }}">
                                {{ $apartment->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('office.apartment.room.index', ['apartment' => $apartment->slug]) }}">
                                <i class="fas fa-home text-muted me-1"></i>
                                {{ $apartment->rooms->count() }}
                            </a>
                        </td>
                        <td>
                            <a
                                href="{{ route('office.apartment.resident.index', ['apartment' => $apartment->slug]) }}">
                                <i class="fas fa-users text-muted me-1"></i>
                                {{ $apartment->residents->count() }}
                            </a>
                        </td>
                        <td>
                            @if ($apartment->active)
                                <i class="fas fa-check text-success"></i>
                                Active
                            @else
                                <i class="fas fa-times text-danger"></i>
                                Disabled
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="text-end">
                            <div class="action-btns">
                                <a href="{{ route('office.apartment.show', $apartment->slug) }}"
                                    class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('office.apartment.edit', $apartment->slug) }}"
                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </a>

                                <form class="d-inline" method="POST"
                                    action="{{ route('office.apartment.destroy', $apartment->slug) }}">
                                    @method('delete')
                                    @csrf

                                    <button type="submit"
                                        class="btn btn-sm bg-transparent px-2 action-btn btn-delete bs-tooltip"
                                        data-toggle="tooltip" data-placement="top" title="Delete">
                                        {{-- <i class="fas fa-trash text-danger"></i> --}}
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (!$apartments->count())
            <p class="text-center py-4">No record found.</p>
        @endif
    </div>

    {{ $apartments->links() }}
</div>
