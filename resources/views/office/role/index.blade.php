<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>{{ __('role.roles') }}</h1>

            {{ Breadcrumbs::render('roles') }}
        </div>

        <div class="section-body">
            <div class="card">
                @can('role.create')
                    <div class="card-header">
                        <a href="{{ route('office.role.create') }}" class="btn btn-icon icon-left btn-primary">
                            <i class="fas fa-plus"></i> {{ __('Add Role') }}
                        </a>
                    </div>
                @endcan

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="w-50">{{ __('levels.name') }}</th>
                                    <th>{{ __('Permissions') }}</th>
                                    <th>{{ __('Users') }}</th>
                                    @if (auth()->user()->canAny(['role.show', 'role.edit', 'role.delete']))
                                        <th class="text-right text-end">{{ __('levels.actions') }}</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @if (!blank($roles))
                                    @foreach ($roles as $role)
                                        <tr>
                                            {{-- <td>{{ $loop->index + 1 }}</td> --}}
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->permissions->count() }}</td>
                                            <td>{{ $role->users->count() }}</td>

                                            @if (auth()->user()->canAny(['role.show', 'role.edit', 'role.delete']))
                                                <td class="text-right text-end">
                                                    @if (!in_array($role->id, $notDeleteArray) &&
                                                        auth()->user()->can('role.delete'))
                                                        <form class="float-right ml-2"
                                                            action="{{ route('office.role.destroy', $role) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-sm btn-icon btn-danger"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if (auth()->user()->can('role.edit'))
                                                        <a href="{{ route('office.role.edit', $role) }}"
                                                            class="btn btn-sm btn-icon float-right btn-primary ml-2"
                                                            data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                    @endif

                                                    @if (auth()->user()->can('role.show'))
                                                        <a href="{{ route('office.role.show', $role) }}"
                                                            class="btn btn-sm btn-icon float-right btn-success ml-2"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Permission">
                                                            <i class="fas fa-cog"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
