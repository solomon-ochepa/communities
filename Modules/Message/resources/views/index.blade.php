<x-app-layout :data="$head ?? []">
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('message.name') !!}
    </p>
</x-app-layout>
