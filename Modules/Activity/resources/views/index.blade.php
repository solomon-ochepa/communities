<x-app-layout :data="$head ?? []">
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('activity.name') !!}
    </p>
</x-app-layout>
