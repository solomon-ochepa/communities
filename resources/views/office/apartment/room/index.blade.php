<x-app-layout :data="$data">
    <section class="section">
        <div class="section-header">
            <h1>
                <x-back :url="route('office.apartment.show', $apartment->slug)" />
                {{ __('room.rooms') }} &middot; {{ $apartment->name }}
            </h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @can('room.create')
                            <div class="card-header">
                                <!-- Create modal -->
                                <a href="{{ route('office.apartment.room.create', ['apartment' => $apartment->slug]) }}"
                                    class="btn btn-icon icon-left btn-primary">
                                    <i class="fas fa-plus"></i>
                                    {{ __('label.create') }}
                                </a>
                            </div>
                        @endcan

                        <livewire:office.apartment.room.index :apartment="$apartment" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
