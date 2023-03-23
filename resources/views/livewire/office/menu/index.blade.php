<div class="card">
    @can('menu.create')
        <div class="card-header">
            <!-- Create modal -->
            <a href="{{ route('office.menu.create') }}" class="btn btn-icon icon-left btn-primary">
                <i class="fas fa-plus"></i>
                {{ __('menu.create') }}
            </a>
        </div>
    @endcan

    <div class="card-body">
        <div class="table-responsive">

            <x-page-search />

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('#') }}</th>
                        <th>{{ __('levels.name') }}</th>
                        <th>{{ __('Tag') }}</th>
                        <th>{{ __('Priority') }}</th>
                        <th>{{ __('levels.status') }}</th>
                        <th class="text-end">{{ __('levels.actions') }}</th>
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
                                    <i class="{{ $menu->icon }}"> </i>
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
                            <td>{{ $menu->tag ? $menu->tag : 'All' }}</td>
                            <td>{{ $menu->priority }}</td>
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
                                <a href="{{ route('office.menu.edit', $menu->id) }}"
                                    class="btn btn-sm btn-icon bg-transparent">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="{{ route('office.menu.destroy', $menu->id) }}"
                                    class="btn btn-sm btn-icon bg-transparent">
                                    <i class="fas fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $menus->links() }}
    </div>
</div>
