<div class="card-body">
    <x-page-search class="mb-4" />

    <section class="row gy-3">
        @forelse ($visitors ?? [] as $visitor)
            @if ($visitor->user)
                <x-visitor::admin.visitor :visitor="$visitor" />
            @endif
        @empty
            <p class="text-center py-4">No record found.</p>
        @endforelse

        @if ($visitors)
            {{ $visitors->links() }}
        @endif
    </section>
</div>
