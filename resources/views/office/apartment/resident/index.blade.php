<x-app-layout :data="$data">
    <section class="section">
        {{-- Header title --}}
        <div class="section-header">
            <h1>
                <x-back :url="route('office.apartment.show', $apartment->slug)" />
                {!! $data['title'] !!}
            </h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <livewire:office.apartment.resident.index :apartment="$apartment" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
