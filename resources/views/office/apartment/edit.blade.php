<x-app-layout :data="$data">
    <section class="section">
        <div class="section-header">
            <h1>
                <x-back :url="route('office.apartment.index')" />
                {{ __('label.edit') }} - {{ $apartment->name }} &middot; Apartment
            </h1>
            {{-- {{ Breadcrumbs::render('apartments') }} --}}
        </div>

        <livewire:office.apartment.create :apartment="$apartment" />
    </section>
</x-app-layout>
