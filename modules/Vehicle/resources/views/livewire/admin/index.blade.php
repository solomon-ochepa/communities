<div class="card-body">
    <!-- Knowing others is intelligence; knowing yourself is true wisdom. -->

    <x-page-search />

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">{{ __('#') }}</th>
                    <th scope="col">{{ __('Plate Number') }}</th>
                    <th scope="col">{{ __('VIN') }}</th>
                    <th scope="col">{{ __('Vehicle') }}</th>
                    <th scope="col">{{ __('Restricted') }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($vehicles ?? [] as $key => $vehicle)
                    <tr>
                        <td>
                            <input type="checkbox" name="selected" id="selected"
                                wire:model.lazy="selected.{{ $key }}.{{ $vehicle->id }}" />
                        </td>

                        <td>{{ $vehicle->vrn }}</td>
                        <td>{{ $vehicle->vin }}</td>

                        <td>
                            @if ($vehicle->active)
                                <i class="fas fa-check text-success"></i>
                                Ok
                            @else
                                <i class="fas fa-times text-danger"></i>
                                Restricted
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="text-end">
                            <div class="action-btns">
                                <a href="{{ route('admin.vehicle.show', $vehicle->id) }}"
                                    class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('admin.vehicle.edit', $vehicle->id) }}"
                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </a>

                                <form class="d-inline" method="POST"
                                    action="{{ route('admin.vehicle.destroy', $vehicle->id) }}">
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

        @if (!$vehicles->count())
            <p class="text-center py-4">No record found.</p>
        @endif
    </div>

    {{ $vehicles->links() }}
</div>
