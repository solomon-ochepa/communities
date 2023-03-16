<x-office-layout :data="$data">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('dashboard') }} --}}
            <x-back :url="route('dashboard')" />

            {!! $data['title'] !!}
        </h2>

        {{-- {{ Breadcrumbs::render('menus') }} --}}
    </x-slot>

    <div class="layout-top-spacing">
        <div class="card">
            @can('apartment.create')
                <div class="card-header">
                    <!-- Create modal -->
                    <button type="button" class="btn btn-primary btn-icon icon-left" data-bs-toggle="modal"
                        data-bs-target="#create">
                        <i class="fas fa-plus"></i>
                        {{ __('label.create') }}
                    </button>

                    @push('modals')
                        <!-- Create resident Modal -->
                        <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content _bg-light">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Understood</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endpush
                </div>
            @endcan

            <livewire:office.resident.index />
        </div>
    </div>
</x-office-layout>
