<div class="card-body">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <x-page-search />

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Tenants') }}</th>
                    <th>{{ __('Visitors') }}</th>
                    <th class="text-right"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($rooms ?? [] as $key => $room)
                    <tr>
                        <td>
                            <a class="text-dark"
                                href="{{ route('admin.apartment.room.show', ['apartment' => $room->roomable->id, 'room' => $room->id]) }}">
                                {{ $room->name }}

                                @if ($room->active)
                                    <i class="fas fa-check-circle text-success"></i>
                                @else
                                    <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </a>
                        </td>
                        <td>
                            {{ $room->tenants->count() }}
                        </td>
                        <td>
                            {{-- {{ $room->visitors->count() }} --}}
                        </td>

                        <!-- Actions -->
                        <td class="text-end">
                            <div class="action-btns">
                                <a href="{{ route('admin.apartment.room.show', ['apartment' => $room->roomable->id, 'room' => $room->id]) }}"
                                    class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('admin.apartment.room.edit', ['apartment' => $room->roomable->id, 'room' => $room->id]) }}"
                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </a>

                                <form class="d-inline" method="POST"
                                    action="{{ route('admin.apartment.room.destroy', ['apartment' => $room->roomable->id, 'room' => $room->id]) }}">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit"
                                        class="btn btn-sm bg-transparent px-2 action-btn btn-delete bs-tooltip"
                                        data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if (isset($rooms) and $rooms->count())
        {{ $rooms->links() }}
    @else
        <p class="text-center py-4">No record found.</p>
    @endif
</div>
