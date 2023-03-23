<div class="card-body">
    <!-- Knowing others is intelligence; knowing yourself is true wisdom. -->

    <x-page-search />

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">{{ __('levels.name') }}</th>
                    <th scope="col">{{ __('levels.email') }}</th>
                    <th scope="col">{{ __('levels.phone') }}</th>
                    <th scope="col">{{ __('employee.employed_at') }}</th>
                    <th scope="col">{{ __('levels.status') }}</th>
                    <th scope="col" class="text-end">{{ __('levels.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employees ?? [] as $key => $employee)
                    <tr>
                        <td>
                            <a href="{{ route('office.employee.show', ['employee' => $employee->id]) }}">
                                {{ $employee->user->name }}
                            </a>
                        </td>
                        <td>
                            {{ $employee->user->email }}
                        </td>
                        <td>
                            {{ $employee->user->phone }}
                        </td>
                        <td>
                            {{ $employee->employed_at->format('D, M d, Y') }}
                        </td>
                        <td>
                            @if ($employee->status)
                                @if ($employee->status->icon)
                                    <i class="fas fa-check text-success"></i>
                                @endif
                                {{ $employee->status->name }}
                            @else
                                -
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="text-end">
                            <div class="action-btns">
                                <a href="{{ route('office.employee.show', $employee->id) }}"
                                    class="btn btn-sm btn-icon bg-transparent btn-view bs-tooltip me-2"
                                    data-toggle="tooltip" data-placement="top" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('office.employee.edit', $employee->id) }}"
                                    class="btn btn-sm btn-icon bg-transparent me-2 bs-tooltip" data-toggle="tooltip"
                                    data-placement="top" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </a>

                                <form class="d-inline" method="POST"
                                    action="{{ route('office.employee.destroy', $employee->id) }}">
                                    @method('delete')
                                    @csrf

                                    <button type="submit"
                                        class="btn btn-sm bg-transparent px-2 btn-icon action-btn btn-delete bs-tooltip"
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

        @if (!$employees->count())
            <p class="text-center py-4">No record found.</p>
        @endif
    </div>

    {{ $employees->links() }}
</div>
