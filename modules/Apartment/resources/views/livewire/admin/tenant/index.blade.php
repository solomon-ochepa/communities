<div class="card-body">
    {{-- <x-page-search class="mb-4" /> --}}

    <section class="row gy-3">
        @forelse ($occupants ?? [] as $occupant)
            <x-occupant::admin.occupant :occupant="$occupant" />
        @empty
            <p class="text-center py-4">No record found.</p>
        @endforelse

        @isset($occupants)
            {{ $occupants->links() }}
        @endisset
    </section>
</div>
