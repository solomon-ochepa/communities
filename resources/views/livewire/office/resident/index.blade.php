<div class="card-body">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @isset($residents)
        {{-- Filter --}}
        <section class="row">
            {{-- Limit --}}
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
                        <th class="">
                            <input disabled type="checkbox" name="select_all" id="select_all"
                                wire:model.defer="select_all" />
                        </th>
                        <th>{{ __('label.name') }}</th>
                        <th>{{ __('label.phone') }}</th>
                        <th>{{ __('label.email') }}</th>
                        <th>{{ __('room.room') }}</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($residents ?? [] as $key => $resident)
                        <tr>
                            <td>
                                <input disabled type="checkbox" name="selected" id="selected"
                                    wire:model.defer="selected.{{ $key }}.{{ $resident->id }}" />
                            </td>
                            <td>
                                <a class="text-dark" href="#">
                                    {{ $resident->user->first_name }} {{ $resident->user->last_name }}
                                </a>
                            </td>
                            <td>
                                {{ $resident->user->phone }}
                            </td>
                            <td>
                                {{ $resident->user->email }}
                            </td>
                            <td>
                                {{ $resident->room->name ?? '-' }}
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

        @if ($residents->count() > $limit)
            {{ $residents->links() }}
        @endif
    @else
        ...{{ __('resident.not_found') }}!
        @can('resident.create')
            <a class="card-link" href="{{ route('office.apartment.resident.create', ['apartment' => $apartment->slug]) }}">
                <i class="fas fa-plus"></i>
                {{ __('label.create') }}
            </a>
            {{-- <a href="" class="btn btn-icon icon-left btn-primary">
            </a> --}}
        @endcan
    @endisset
</div>
