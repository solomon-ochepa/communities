<div class="card-body">
    <x-page-search class="mb-4" />

    <section class="row gy-3">
        @forelse ($occupants ?? [] as $occupant)
            @if ($occupant->user)
                <x-occupant::admin.occupant :occupant="$occupant" />
            @endif
        @empty
            <p class="text-center py-4">No record found.</p>
        @endforelse

        @if ($occupants)
            {{ $occupants->links() }}
        @endif
    </section>
</div>
