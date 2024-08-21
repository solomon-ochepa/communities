<x-app-layout :data="$head ?? []">
    <div class="chat-section layout-top-spacing">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <livewire:message::index />
            </div>
        </div>
    </div>

    @push('css')
        <link href="/assets/app/src/assets/css/light/apps/chat.css" rel="stylesheet" type="text/css" />
        <link href="/assets/app/src/assets/css/dark/apps/chat.css" rel="stylesheet" type="text/css" />
    @endpush
    @push('js')
        <script src="/assets/app/src/assets/js/apps/chat.js"></script>
    @endpush
</x-app-layout>
