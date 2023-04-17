<div class="card-body">
    <x-page-search class="mb-4" />

    <div class="row gy-3">
        @forelse ($tenants ?? [] as $tenant)
            <x-tenant::admin.tenant :tenant="$tenant" />
        @empty
            <p class="text-center py-4">No record found.</p>
        @endforelse


        {{ $tenants->links() }}
    </div>
</div>
