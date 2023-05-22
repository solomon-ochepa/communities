<x-app-layout :data="$head ?? []">
    <x-slot name="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.gatepass.index') }}">Gatepass</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $gatepass->code }} &rightarrow; {{ $head['title'] ?? config('app.name', '') }}
            </li>
        </ol>
    </x-slot>

    <livewire:gatepass::request.admin :gatepass="$gatepass" />

    @push('modals')
        {{-- <livewire:gatepass::admin.create-modal />
        <livewire:gatepass::admin.update-modal />
        <livewire:gatepass::admin.edit-modal /> --}}

        <!-- Modal -->
        {{-- <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog"
            aria-labelledby="addContactModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title add-title" id="addContactModalTitleLabel1">Add Contact
                        </h5>
                        <h5 class="modal-title edit-title" id="addContactModalTitleLabel2" style="display: none;">
                            Edit Contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="add-contact-box">
                            <div class="add-contact-content">
                                <form id="addContactModalTitle">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="contact-name">
                                                <input type="text" id="c-name" class="form-control"
                                                    placeholder="Name">
                                                <span class="validation-text"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="contact-email">
                                                <input type="text" id="c-email" class="form-control"
                                                    placeholder="Email">
                                                <span class="validation-text"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="contact-occupation">
                                                <input type="text" id="c-occupation" class="form-control"
                                                    placeholder="Occupation">
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="contact-phone">
                                                <input type="text" id="c-phone" class="form-control"
                                                    placeholder="Phone">
                                                <span class="validation-text"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="contact-location">
                                                <input type="text" id="c-location" class="form-control"
                                                    placeholder="Location">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="btn-edit"
                            class="btn btn-success _effect--ripple waves-effect waves-light float-left">Save</button>

                        <button class="btn _effect--ripple waves-effect waves-light" data-bs-dismiss="modal"> <i
                                class="flaticon-delete-1"></i>
                            Discard</button>

                        <button id="btn-add"
                            class="btn btn-primary _effect--ripple waves-effect waves-light">Add</button>
                    </div>
                </div>
            </div>
        </div> --}}
    @endpush
    @push('css')
        <link href="{{ asset('assets/app') }}/src/assets/css/light/components/modal.css" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('assets/app') }}/src/assets/css/light/apps/contacts.css" rel="stylesheet"
            type="text/css" />

        <link href="{{ asset('assets/app') }}/src/assets/css/dark/components/modal.css" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('assets/app') }}/src/assets/css/dark/apps/contacts.css" rel="stylesheet" type="text/css" />
        <style rel="stylesheet" type="text/css">
            .searchable-container .searchable-items.grid .items .user-profile img {
                height: 90px !important;
            }

            .searchable-container .searchable-items.list .items .user-profile {
                width: 25%;
            }

            body.dark .searchable-container .searchable-items.list .items.items-header-section .user-profile-head {
                margin-left: 72px !important;
            }
        </style>
    @endpush
    @push('js')
        <script src="{{ asset('assets/app') }}/src/assets/js/custom.js"></script>
        <script src="{{ asset('assets/app') }}/src/plugins/src/jquery-ui/jquery-ui.min.js"></script>
        <script src="{{ asset('assets/app') }}/src/assets/js/apps/contact.js"></script>
    @endpush
</x-app-layout>
