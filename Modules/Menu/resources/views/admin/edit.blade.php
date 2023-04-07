<x-app-layout :data="$head ?? []">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Edit Menu') }}</h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <livewire:menu::admin.create :menu="$menu" />
    </section>
</x-app-layout>
