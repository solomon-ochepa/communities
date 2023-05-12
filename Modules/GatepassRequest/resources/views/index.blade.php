<x-app-layout :data="$head ?? []">
    <x-slot name="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.gatepass.index') }}">Gatepasses</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $head['title'] ?? config('app.name', '') }}
            </li>
        </ol>
    </x-slot>

    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('gatepassrequest.name') !!}
    </p>
</x-app-layout>
