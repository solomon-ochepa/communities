<div class="card-body">
    <x-page-search class="mb-4" />

    <section class="row gy-3">
        @forelse ($users ?? [] as $user)
            <x-user::admin.user :user="$user" />
        @empty
            <p class="text-center py-4">No record found.</p>
        @endforelse

        @isset($users)
            {{ $users->links() }}
        @endisset
    </section>
</div>
