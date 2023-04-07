<x-app-layout :head="$head ?? []">
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('media.name') !!}
    </p>
</x-app-layout>
