<div class="card-body">
    <x-page-search class="mb-4" />

    <section class="row gy-3">
        @forelse ($gatepasses ?? [] as $gatepass)
            <x-gatepass::admin.gatepass :gatepass="$gatepass" />
        @empty
            <p class="py-4 text-center">No record found.</p>
        @endforelse

        @isset($gatepasses)
            {{ $gatepasses->links() }}
        @endisset
    </section>
</div>
