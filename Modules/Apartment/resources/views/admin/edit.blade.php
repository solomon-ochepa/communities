<x-app-layout :data="$head ?? []">
    <section class="section">
        <div class="section-header">
            <h1>
                <x-back :url="route('admin.apartment.index')" />
                {{ $head['title'] ?? '' }}
            </h1>
            {{-- {{ Breadcrumbs::render('apartments') }} --}}
        </div>

        <livewire:apartment::admin.create :apartment="$apartment" />
    </section>
</x-app-layout>
