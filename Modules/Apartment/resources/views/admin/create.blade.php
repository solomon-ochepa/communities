<x-app-layout :data="$data">
    <section class="section">
        <div class="section-header">
            <h1>
                <x-back :url="route('office.apartment.index')" />
                {{ __('menu.apartments') }}
            </h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <livewire:office.apartment.create />
    </section>
</x-app-layout>
