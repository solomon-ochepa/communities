<div class="card-body">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="table-responsive">
        <section class="row">
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
                    <th>{{ __('#') }}</th>
                    <th>{{ __('label.name') }}</th>
                    <th>{{ __('room.room') }}</th>
                    <th>{{ __('resident.resident') }}</th>
                    <th>{{ __('label.active') }}</th>
                    <th class="text-right"></th>
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
                            <a class="text-dark" href="{{ route('office.apartment.show', $apartment->slug) }}">
                                {{ $apartment->name }}
                            </a>
                        </td>
                        <td>
                            {{ $apartment->rooms->count() }}
                        </td>
                        <td>
                            {{ $apartment->residents->count() }}
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
                        <td class="text-right">
                            <a href="{{ route('office.apartment.show', $apartment->slug) }}"
                                class="btn btn-sm text-decoration-none">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('office.apartment.edit', $apartment->slug) }}"
                                class="btn btn-sm text-decoration-none">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- <a href="{{ route('office.apartment.destroy', $apartment->slug) }}"
                                class="btn btn-sm text-decoration-none">
                                <i class="fas fa-trash text-danger"></i>
                            </a> --}}

                            <form class="float-right ml-2"
                                action="{{ route('office.apartment.destroy', $apartment->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm text-danger" data-toggle="tooltip" data-placement="top"
                                    title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
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
