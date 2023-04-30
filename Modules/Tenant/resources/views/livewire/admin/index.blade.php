<div class="card-body">
    <x-page-search class="mb-4" />

    <section class="row gy-3">
        @forelse ($tenants ?? [] as $tenant)
            {{-- @dd($tenant) --}}
            @if ($tenant->user)
                <x-tenant::admin.tenant :tenant="$tenant" />
            @endif
        @empty
            <p class="text-center py-4">No record found.</p>
        @endforelse

        @if ($tenants)
            {{ $tenants->links() }}
        @endif
    </section>
</div>
