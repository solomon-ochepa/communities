<div class="card-body">
    <!-- Knowing others is intelligence; knowing yourself is true wisdom. -->

    <x-page-search />

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">{{ __('#') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Rooms') }}</th>
                    <th scope="col">{{ __('Occupants') }}</th>
                    <th scope="col">{{ __('Active') }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($estates ?? [] as $key => $estate)
                    <tr>
                        <td>
                            <input type="checkbox" name="selected" id="selected"
                                wire:model.defer="selected.{{ $key }}.{{ $estate->id }}" />
                        </td>
                        <td>
                            <a href="{{ route('admin.apartment.show', ['apartment' => $estate->id]) }}">
                                {{ $estate->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.apartment.room.index', ['apartment' => $estate->id]) }}">
                                <i class="fas fa-home text-muted me-1"></i>
                                {{ $estate->rooms->count() }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.apartment.occupant.index', ['apartment' => $estate->id]) }}">
                                <i class="fas fa-users text-muted me-1"></i>
                                {{ $estate->occupants->count() }}
                            </a>
                        </td>
                        <td>
                            @if ($estate->active)
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
                                <a href="{{ route('admin.apartment.show', $estate->id) }}"
                                    class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('admin.apartment.edit', $estate->id) }}"
                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </a>

                                <form class="d-inline" method="POST"
                                    action="{{ route('admin.apartment.destroy', $estate->id) }}">
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

        @if (!$estates->count())
            <p class="text-center py-4">No record found.</p>
        @endif
    </div>

    {{ $estates->links() }}
</div>
