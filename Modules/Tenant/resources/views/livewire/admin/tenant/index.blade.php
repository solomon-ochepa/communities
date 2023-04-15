<div class="card-body">
    <x-page-search class="mb-4" />

    <div class="row gy-3">
        @forelse ($tenants ?? [] as $tenant)
            <div class="col-md-3">
                <a class="card style-7" href="javascript://">
                    <img src="{{ $tenant->user->hasMedia(['image', 'profile'])? $tenant->user->media(['image', 'profile'])->first()->getUrl(): '/unknown.svg' }}"
                        class="card-img-top" alt="...">
                    <div class="card-footer">
                        <h5 class="card-title mb-0">{{ $tenant->user->name }}</h5>
                        <p class="card-text">
                            <i class="fas fa-user-cog"></i>
                            Tenant
                        </p>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-center py-4">No record found.</p>
        @endforelse


        {{ $tenants->links() }}
    </div>
</div>
