<x-app-layout :data="$head ?? []">
    <x-slot name="header">
        <h2 class="h3 m-0">
            <x-back :url="route('dashboard')" />
            {!! __($head['title'] ?? '') !!}
        </h2>
    </x-slot>

    <section class="layout-top-spacing">
        <div class="card">
            @can('users.create')
                <div class="card-header">
                    <!-- Create -->
                    <a type="button" class="btn btn-icon icon-left bg-transparent" data-bs-toggle="modal"
                        data-bs-target="#user-create-modal">
                        <i class="fas fa-plus-circle"></i>
                        {{ __('Create') }}
                    </a>
                </div>
            @endcan

            <livewire:user::admin.index />
        </div>
    </section>

    @push('modals')
        <livewire:user::admin.create-modal />
    @endpush
    @push('js')
        <script>
            $(document).ready(function() {
                $('.edit').on('click', function(event) {
                    _id = $(this).data('id');
                    // console.log(_id);

                    $.get("/user/" + _id + "/get", function(response) {
                        user = response.data;

                        console.log(response.status);

                        $('#user-create-modal .modal-title').html("Edit User");
                        $('#user-create-modal .submit').html("Update");

                        $('#user-create-modal .password').parents('.password').remove();
                        $('#user-create-modal .password_confirmation').parents('.col-md-6').remove();
                        $('#user-create-modal #right').remove();
                        $('#user-create-modal #left').removeClass('col-md-9').addClass('col-md-12');
                        $('#user-create-modal form').attr('wire:submit.prevent', 'update');

                        $('#user-create-modal .first_name').val(user.first_name);
                        $('#user-create-modal .last_name').val(user.last_name);
                        $('#user-create-modal .username').val(user.username);
                        $('#user-create-modal .phone').val(user.phone);
                        $('#user-create-modal .email').val(user.email);
                        $('#user-create-modal .address').val(user.address);
                        // $('#user-create-modal .image').val(user.image).trigger('changed');

                        $('#user-create-modal').modal('show');
                    })
                })
            })
        </script>
    @endpush
</x-app-layout>
