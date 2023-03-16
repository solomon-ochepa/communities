@extends('office.layouts.master')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('visitor.visitors') }}</h1>
            {{ Breadcrumbs::render('visitors') }}
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        @can('visitor.create')
                            <div class="card-header">
                                <a href="{{ route('office.visitors.create') }}" class="btn btn-icon icon-left btn-primary"><i
                                        class="fas fa-plus"></i> {{ __('visitor.add_visitor') }}</a>
                            </div>
                        @endcan

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="_maintable"
                                    data-url="{{ route('office.visitors.get-visitors') }}"
                                    data-status="{{ \App\Enums\Status::ACTIVE }}"
                                    data-hidecolumn="{{ auth()->user()->can('visitor.show') ||auth()->user()->can('visitor.edit') ||auth()->user()->can('visitor.delete') }}">
                                    <thead>
                                        <tr>
                                            <th>{{ __('levels.id') }}</th>
                                            <th>{{ __('levels.image') }}</th>
                                            <th>{{ __('visitor.visitor_id') }}</th>
                                            <th>{{ __('levels.name') }}</th>
                                            <th>{{ __('visitor.employee') }}</th>
                                            <th>{{ __('visitor.checkin') }}</th>
                                            <th>{{ __('visitor.check_out') }}</th>
                                            <th>{{ __('levels.status') }}</th>
                                            <th class="col-md-3">{{ __('levels.actions') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- @section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/visitor/index.js') }}"></script>
@endsection --}}
