<x-app-layout :data="$head ?? []">
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('comment.name') !!}
    </p>
</x-app-layout>
