<div class="card-body">
    {{-- <x-page-search class="mb-4" /> --}}

    <section class="row gy-3">
        @forelse ($tenants ?? [] as $tenant)
            <x-tenant::admin.tenant :tenant="$tenant" />
        @empty
            <p class="text-center py-4">No record found.</p>
        @endforelse

        @isset($tenants)
            {{ $tenants->links() }}
        @endisset
    </section>
</div>
