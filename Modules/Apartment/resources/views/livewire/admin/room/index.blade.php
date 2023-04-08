<div class="card-body">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <x-page-search />

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="">
                        <input disabled type="checkbox" name="select_all" id="select_all" wire:model.defer="select_all" />
                    </th>
                    <th>{{ __('label.name') }}</th>
                    <th>{{ __('resident.resident') }}</th>
                    <th>{{ __('visitor.visitors') }}</th>
                    <th>{{ __('label.active') }}</th>
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
                                href="{{ route('admin.apartment.room.show', ['apartment' => $room->roomable->slug, 'room' => $room->slug]) }}">
                                {{ $room->name }}
                            </a>
                        </td>
                        <td>
                            {{ $room->tenants->count() }}
                        </td>
                        <td>
                            {{-- {{ $room->visitors->count() }} --}}
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

    @if (isset($rooms) and $rooms->count())
        {{ $rooms->links() }}
    @else
        <p class="text-center py-4">No record found.</p>
    @endif
</div>
