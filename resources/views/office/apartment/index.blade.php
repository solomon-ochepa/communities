<x-app-layout :data="$data">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('apartment.manage') }}</h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @can('apartment.create')
                            <div class="card-header">
                                <!-- Create modal -->
                                <a href="{{ route('office.apartment.create') }}" class="btn btn-icon icon-left btn-primary">
                                    <i class="fas fa-plus"></i>
                                    {{ __('label.create') }}
                                </a>
                            </div>
                        @endcan

                        <livewire:office.apartment.index />
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
