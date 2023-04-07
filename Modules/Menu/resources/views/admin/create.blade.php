<x-app-layout :data="$head ?? []">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Create Menu') }}</h1>
            {{-- {{ Breadcrumbs::render('menus') }} --}}
        </div>

        <livewire:menu::admin.create />
    </section>
</x-app-layout>
