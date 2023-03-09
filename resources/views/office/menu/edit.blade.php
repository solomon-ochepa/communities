<x-app-layout :data="$data">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('menu.menus') }}</h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <livewire:office.menu.create :menu="$menu" />
    </section>
</x-app-layout>
