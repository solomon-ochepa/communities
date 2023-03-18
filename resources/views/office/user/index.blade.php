<x-office-layout>
    <section class="section">
        {{-- <div class="section-header">
            <h1>{{ __('user.manage') }}</h1>

            {{ Breadcrumbs::render('administrators') }}
        </div> --}}

        <div class="card mt-4">
            @can('user.create')
                <div class="card-header">
                    <a href="{{ route('office.user.create') }}" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i> {{ __('user.create') }}
                    </a>
                </div>
            @endcan

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('levels.image') }}</th>
                                <th>{{ __('levels.name') }}</th>
                                <th>{{ __('levels.email') }}</th>
                                <th>{{ __('levels.phone') }}</th>
                                <th class="text-end">{{ __('levels.actions') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <figure class="avatar mr-2">
                                            <img src="{{ $user->images }}" alt="User">
                                        </figure>
                                    </td>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        {{ $user->phone }}
                                    </td>

                                    <!-- Actions -->
                                    <td class="text-end">
                                        <div class="action-btns">
                                            @can('user.show')
                                                <a href="{{ route('office.user.show', $user) }}"
                                                    class="btn btn-sm btn-icon bg-transparent me-2" data-toggle="tooltip"
                                                    data-placement="top" title="View">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            @endcan

                                            @can('user.edit')
                                                <a href="{{ route('office.user.edit', $user) }}"
                                                    class="btn btn-sm btn-icon bg-transparent me-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            @endcan

                                            {{-- User cannot delete himself --}}
                                            @if ($user->id !== auth()->id())
                                                @can('user.delete')
                                                    <form class='d-inline' method='POST'
                                                        action='{{ route('office.user.destroy', $user) }}'>
                                                        @method('DELETE')
                                                        @csrf

                                                        <button class='btn btn-sm btn-icon bg-transparent'
                                                            onclick='return confirmDelete()' data-toggle='tooltip'
                                                            data-placement='top' title='Delete'>
                                                            <i class='fa fa-trash'></i></button>
                                                    </form>
                                                @endcan
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush
    @section('css')
        <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endsection

    @section('scripts')
        <script src="{{ asset('assets/modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('js/office/user/index.js') }}"></script>
    @endsection
</x-office-layout>
