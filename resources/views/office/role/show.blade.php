@extends('office.layouts.master')

@section('main-content')
    <section class="section">
        {{-- Header --}}
        <div class="section-header">
            <h1>
                <x-back url="{{ route('office.role.index') }}" />
                {{ $title }}
            </h1>
            {{ Breadcrumbs::render('role/view') }}
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="{{ route('office.role.save-permission', $role) }}" method="POST">
                            @csrf

                            <div class="card-header">
                                <h3>{{ __('permission.permissions') }}</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('word.module_name') }}</th>
                                            <th>{{ __('word.create') }}</th>
                                            <th>{{ __('word.list') }}</th>
                                            <th>{{ __('word.show') }}</th>
                                            <th>{{ __('word.edit') }}</th>
                                            <th>{{ __('word.delete') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (count($permissionList))
                                            @foreach ($permissionList as $permission)
                                                <tr>
                                                    {{-- Checkbox --}}
                                                    <td data-title="{{ __('#') }}">
                                                        <input type="checkbox" id="{{ $permission->name }}"
                                                            name="{{ $permission->name }}" value="{{ $permission->id }}"
                                                            {{ isset($permissions[$permission->id]) ? 'checked' : '' }}
                                                            onclick="processCheck(this)" class="mainmodule" />
                                                    </td>

                                                    {{-- Name --}}
                                                    <td data-title="{{ __('Module Name') }}">
                                                        {{ ucfirst($permission->name) }}
                                                    </td>

                                                    {{-- Create --}}
                                                    <td data-title="{{ __('Create') }}">
                                                        @php
                                                            $create_permission = $permission->name . '.create';
                                                        @endphp

                                                        @if (isset($permissionArray[$create_permission]))
                                                            {{-- {{ dd($create_permission) }} --}}
                                                            <input type="checkbox"
                                                                id="{{ Str::replace('.', '_', $create_permission) }}"
                                                                name="{{ $create_permission }}"
                                                                value="{{ $permissionArray[$create_permission] }}"
                                                                {{ isset($permissions[$permissionArray[$create_permission]]) ? 'checked' : '' }} />
                                                        @else
                                                            &nbsp;
                                                        @endif
                                                    </td>

                                                    {{-- List --}}
                                                    <td data-title="{{ __('List') }}">
                                                        @php $list_permission = $permission->name.'.list' @endphp

                                                        @isset($permissionArray[$list_permission])
                                                            <input type="checkbox"
                                                                id="{{ Str::replace('.', '_', $list_permission) }}"
                                                                name="{{ $list_permission }}"
                                                                value="{{ $permissionArray[$list_permission] }}"
                                                                {{ isset($permissions[$permissionArray[$list_permission]]) ? 'checked' : '' }} />
                                                        @else
                                                            &nbsp;
                                                        @endisset
                                                    </td>

                                                    {{-- Show --}}
                                                    <td data-title="{{ __('Show') }}">
                                                        @php $permissionShow = $permission->name.'.show' @endphp

                                                        @isset($permissionArray[$permissionShow])
                                                            <input type="checkbox"
                                                                id="{{ Str::replace('.', '_', $permissionShow) }}"
                                                                name="{{ $permissionShow }}"
                                                                value="{{ $permissionArray[$permissionShow] }}"
                                                                {{ isset($permissions[$permissionArray[$permissionShow]]) ? 'checked' : '' }} />
                                                        @else
                                                            &nbsp;
                                                        @endisset
                                                    </td>

                                                    {{-- Edit --}}
                                                    <td data-title="{{ __('Edit') }}">
                                                        @php $edit_permission = $permission->name.'.edit'; @endphp

                                                        @isset($permissionArray[$edit_permission])
                                                            <input type="checkbox"
                                                                id="{{ Str::replace('.', '_', $edit_permission) }}"
                                                                name="{{ $edit_permission }}"
                                                                value="{{ $permissionArray[$edit_permission] }}"
                                                                {{ isset($permissions[$permissionArray[$edit_permission]]) ? 'checked' : '' }} />
                                                        @else
                                                            &nbsp;
                                                        @endisset
                                                    </td>

                                                    {{-- Delete --}}
                                                    <td data-title="{{ __('Delete') }}">
                                                        @php $permissionDelete = $permission->name.'.delete' @endphp

                                                        @isset($permissionArray[$permissionDelete])
                                                            <input type="checkbox"
                                                                id="{{ Str::replace('.', '_', $permissionDelete) }}"
                                                                name="{{ $permissionDelete }}"
                                                                value="{{ $permissionArray[$permissionDelete] }}"
                                                                {{ isset($permissions[$permissionArray[$permissionDelete]]) ? 'checked' : '' }} />
                                                        @else
                                                            &nbsp;
                                                        @endisset
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-primary mr-1" type="submit">{{ __('levels.submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $('.mainmodule').each(function() {
            var mainmodule = $(this).attr('id');

            var mainidCreate = mainmodule + "_create";
            var mainidList = mainmodule + "_list";
            var mainidShow = mainmodule + "_show";
            var mainidEdit = mainmodule + "_edit";
            var mainidDelete = mainmodule + "_delete";

            console.log(mainidCreate);

            if (!$('#' + mainmodule).is(':checked')) {
                $('#' + mainidCreate).prop('disabled', true);
                $('#' + mainidCreate).prop('checked', false);

                $('#' + mainidList).prop('disabled', true);
                $('#' + mainidList).prop('checked', false);

                $('#' + mainidShow).prop('disabled', true);
                $('#' + mainidShow).prop('checked', false);

                $('#' + mainidEdit).prop('disabled', true);
                $('#' + mainidEdit).prop('checked', false);

                $('#' + mainidDelete).prop('disabled', true);
                $('#' + mainidDelete).prop('checked', false);
            }
        });

        function processCheck(event) {
            var mainmodule = $(event).attr('id');

            console.log(mainmodule);

            var mainidCreate = mainmodule + "_create";
            var mainidList = mainmodule + "_list";
            var mainidShow = mainmodule + "_show";
            var mainidEdit = mainmodule + "_edit";
            var mainidDelete = mainmodule + "_delete";

            if ($('#' + mainmodule).is(':checked')) {
                $('#' + mainidCreate).prop('disabled', false);
                $('#' + mainidCreate).prop('checked', true);

                $('#' + mainidList).prop('disabled', false);
                $('#' + mainidList).prop('checked', true);

                $('#' + mainidShow).prop('disabled', false);
                $('#' + mainidShow).prop('checked', true);

                $('#' + mainidEdit).prop('disabled', false);
                $('#' + mainidEdit).prop('checked', true);

                $('#' + mainidDelete).prop('disabled', false);
                $('#' + mainidDelete).prop('checked', true);
            } else {
                $('#' + mainidCreate).prop('disabled', true);
                $('#' + mainidCreate).prop('checked', false);

                $('#' + mainidList).prop('disabled', true);
                $('#' + mainidList).prop('checked', false);

                $('#' + mainidShow).prop('disabled', true);
                $('#' + mainidShow).prop('checked', false);

                $('#' + mainidEdit).prop('disabled', true);
                $('#' + mainidEdit).prop('checked', false);

                $('#' + mainidDelete).prop('disabled', true);
                $('#' + mainidDelete).prop('checked', false);
            }
        };
    </script>
@endsection
