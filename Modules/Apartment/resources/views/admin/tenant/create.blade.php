<x-app-layout :data="$head ?? []">
    <section class="section">
        <div class="section-header">
            <h1>
                <x-back :url="route('admin.apartment.resident.index', $apartment->id)" />
                {!! $head['title'] !!}
            </h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <livewire:office.apartment.resident.create :apartment="$apartment" />
    </section>
</x-app-layout>
