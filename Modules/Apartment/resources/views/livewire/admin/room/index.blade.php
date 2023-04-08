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
                                href="{{ route('admin.apartment.room.show', ['apartment' => $room->roomable->slug, 'room' => $room->slug]) }}">
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

                        {{-- Actions --}}
                        <td class="text-end">
                            <a href="{{ route('admin.apartment.room.show', ['apartment' => $room->roomable->slug, 'room' => $room->slug]) }}"
                                class="btn btn-sm text-decoration-none">
                                <i class="fas fa-eye"></i>
                            </a>

                            {{-- <a href="#" class="btn btn-sm text-decoration-none">
                                <i class="fas fa-edit"></i>
                            </a> --}}

                            {{-- <a href="#" class="btn btn-sm text-decoration-none">
                                <i class="fas fa-trash text-danger"></i>
                            </a> --}}
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
