<x-office-layout>
    {{-- <div class="section-header">
            <h1>{{ __('employee.employees') }}</h1>
            {{ Breadcrumbs::render('employees') }}
        </div> --}}

    <div class="card my-4">
        @can('employee.create')
            <div class="card-header">
                <a href="{{ route('office.employee.create') }}" class="btn btn-icon icon-left btn-primary">
                    <i class="fas fa-plus"></i>
                    {{ __('employee.add_employee') }}
                </a>
            </div>
        @endcan

        <livewire:office.employee.index />
    </div>
</x-office-layout>
