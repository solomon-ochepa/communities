<div class="section-body">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-12">
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
                    @isset($menus)
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="maintable_length">
                                        <label class="d-flex justify-content-start align-items-center">
                                            <span class="mr-1">Show</span>
                                            <select wire:model.lazy="limit"
                                                class="custom-select custom-select-sm form-control form-control-sm w-25 mr-1">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                            <span class="_col-auto">entries</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div id="maintable_filter" class="dataTables_filter">
                                        <label class="d-flex justify-content-start align-items-center">
                                            <span class="mr-1">Search:</span>
                                            <input type="search" class="form-control form-control-sm" placeholder=""
                                                wire:model="search">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('levels.name') }}</th>
                                        <th>{{ __('Tag') }}</th>
                                        <th>{{ __('Priority') }}</th>
                                        <th>{{ __('levels.status') }}</th>
                                        <th>{{ __('levels.actions') }}</th>
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
                                                {{ $menu->name }}
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
                                            <td>
                                                <a href="{{ route('office.menu.edit', $menu->id) }}"
                                                    class="text-decoration-none">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('office.menu.destroy', $menu->id) }}"
                                                    class="text-decoration-none">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $menus->links() }}
                    @else
                        ...menus not found.
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
