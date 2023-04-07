<div class="card">
    @can('menu.create')
        <div class="card-header">
            <!-- Create modal -->
            <a href="{{ route('admin.menu.create') }}" class="btn btn-icon icon-left btn-primary">
                <i class="fas fa-plus"></i>
                {{ __('Create') }}
            </a>
        </div>
    @endcan

    <div class="card-body">
        <x-page-search />

        <div class="table-responsive">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('#') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th class="text-center">{{ __('Priority') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th class="text-end"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($menus ?? [] as $key => $menu)
                        <tr>
                            <td>
                                <input type="checkbox" name="selected" id="selected"
                                    wire:model.defer="selected.{{ $key }}.{{ $menu->id }}" />
                            </td>

                            <td>
                                @isset($menu->icon)
                                    <i class="{{ $menu->icon }} me-1"> </i>
                                @endisset
                                @if ($menu->parent)
                                    {{ $menu->parent->name }} &raquo;
                                @endif
                                {{ $menu->name }}
                                <p class="m-0 small text-muted">
                                    <i class="fas fa-link text-muted"></i>
                                    {{ $menu->url }}
                                </p>
                            </td>

                            <td class="text-center">{{ $menu->priority ?? 0 }}</td>

                            <td>
                                @if ($menu->active)
                                    <i class="fas fa-check text-success"></i>
                                    Active
                                @else
                                    <i class="fas fa-times text-danger"></i>
                                    Disabled
                                @endif
                            </td>

                            {{-- Actions --}}
                            <td class="text-end">
                                <a href="{{ route('admin.menu.edit', $menu->id) }}"
                                    class="btn btn-sm btn-icon bg-transparent">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form class="d-inline-block" method="POST"
                                    action="{{ route('admin.menu.destroy', ['menu' => $menu->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-icon bg-transparent">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $menus->links() }}
    </div>
</div>
