<div wire:ignore.self class="modal fade" id="gatepass-update-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" role="dialog" aria-labelledby="gatepass-update-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg _modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gatepass-update-modalLabel">
                    {{ __('Auto Update') }}
                </h5>
                <div class="d-flex">
                    <button type="button" class="btn-close me-3" wire:click="$refresh">
                        <i class="fas fa-rotate"></i>
                    </button>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <form x-data wire:submit.prevent="submit" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <x-alert />

                    <div class="row">
                        <section class="col-md-9">
                            <div class="row gy-3">
                                @foreach ($users ?? [] as $user)
                                    <div class="col-md-12">
                                        @if ($user->gatepass)
                                            <i class="fas fa-check-circle text-success"></i>
                                        @else
                                            <i class="fas fa-plus-circle text-primary"></i>
                                        @endif
                                        {{ $user->name }}
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        <section class="col-md-3 border-start">
                            <div class="row gy-3">
                                <div class="col-md-12">
                                    <i class="fas fa-plus-circle text-primary"></i>
                                    Create: {{ $create ?? 0 }}
                                </div>
                                <div class="col-md-12">
                                    <i class="fas fa-rotate text-warning"></i>
                                    Update: {{ $update ?? 0 }}
                                </div>
                                <div class="col-md-12">
                                    <i class="fas fa-trash text-danger"></i>
                                    Delete: {{ $delete ?? 0 }}
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-primary btn-no-effect _effect--ripple waves-effect waves-light">
                        {{ __('Update') }}
                    </button>

                    <button type="button"
                        class="btn btn-light-danger btn-no-effect _effect--ripple waves-effect waves-light"
                        data-bs-dismiss="modal">
                        {{ __('Cancel') }}
                    </button>
                </div>

                @csrf
            </form>
        </div>
    </div>
</div>
