<x-app-layout :data="$head ?? []">
    <section class="section">
        {{-- Header title --}}
        <div class="section-header">
            <h1>
                <x-back :url="route('admin.apartment.show', $apartment->id)" />
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
