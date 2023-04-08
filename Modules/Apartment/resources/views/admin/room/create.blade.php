<x-app-layout :data="$head ?? []">
    <section class="section">
        <div class="section-header">
            <h1>
                <x-back :url="route('admin.apartment.room.index', $apartment->slug)" />
                {{ __('room.create') }}
            </h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <livewire:office.apartment.room.create :apartment="$apartment" />
    </section>
</x-app-layout>
