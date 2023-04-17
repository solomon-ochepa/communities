<div class="col-md-3">
    <div class="card _border-0 style-6" href="javascript://">
        <span class="badge">
            <div class="d-flex justify-content-between gap-4">
                {{-- Actions dropdown --}}
                <div class="task-action">
                    <div class="_dropdown-list dropdown" role="group">
                        <a class="dropdown-toggle" href="javascript://" role="button" id="expenses"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-more-horizontal">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="19" cy="12" r="1"></circle>
                                <circle cx="5" cy="12" r="1"></circle>
                            </svg>
                        </a>

                        <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                            <a class="dropdown-item" href="javascript:void(0);">
                                <span>Edit</span>
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.tenant.destroy', ['tenant' => $tenant->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="dropdown-item text-danger">
                                    <span>Delete</span>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </span>

        <img src="{{ $tenant->user->hasMedia(['image', 'profile'])? $tenant->user->media(['image', 'profile'])->first()->getUrl(): '/unknown.svg' }}"
            class="card-img-top p-1" alt="{{ $tenant->user->name }}">

        <div class="card-footer">
            <h5 class="card-title mb-0">{{ $tenant->user->name }}</h5>
            <p class="card-text">
                <i class="fas fa-user-cog"></i>
                Tenant
            </p>
        </div>
    </div>

    @push('css')
        <link href="/assets/app/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
        <link href="/assets/app/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
        <link href="/assets/app/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    @endpush
    @push('js')
        <script src="/assets/app/src/plugins/src/apex/apexcharts.min.js"></script>
        <script src="/assets/app/src/assets/js/dashboard/dash_1.js"></script>
    @endpush
</div>
