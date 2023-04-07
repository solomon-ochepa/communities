<x-app-layout :data="$data">
    <section class="section">
        <div class="section-header">
            <h1>
                <x-back :url="route('office.apartment.resident.index', $apartment->slug)" />
                {!! $data['title'] !!}
            </h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <livewire:office.apartment.resident.create :apartment="$apartment" />
    </section>
</x-app-layout>
