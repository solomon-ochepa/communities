<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('admin.apartment.show', ['apartment' => $apartment->id])" />
            {!! __($head['title'] ?? '') !!}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <livewire:apartment::admin.tenant.index :apartment="$apartment" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
