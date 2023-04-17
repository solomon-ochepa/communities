@if ($errors->any() or session('status') or session('error'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
        @if ($errors->any())
            <div {{ $attributes->merge(['class' => 'toast show border-0']) }} role="alert" aria-live="assertive"
                aria-atomic="true" data-bs-delay="10000">
                <div class="toast-header text-bg-danger">
                    <i class="fas fa-message rounded me-2"></i>
                    <strong class="me-auto">{{ __('Whoops! Something went wrong.') }}</strong>
                    <i class="col-auto small">{{ now()->format('h:i A') }}</i>
                    <button type="button" class="btn-close text-bg-danger" data-bs-dismiss="toast" aria-label="Close">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>

                <div class="toast-body text-black">
                    <ul class="my-0 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if (session('status'))
            <div {{ $attributes->merge(['class' => 'toast show border-0']) }} role="status" aria-live="polite"
                aria-atomic="true" data-bs-delay="10000">
                <div class="toast-header text-bg-success">
                    <i class="fas fa-message rounded me-2"></i>
                    <strong class="me-auto">Status</strong>
                    <i class="col-auto small">{{ now()->format('h:i A') }}</i>
                    <button type="button" class="btn-close text-bg-success" data-bs-dismiss="toast" aria-label="Close">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>

                <div class="toast-body text-black">
                    {!! session('status') !!}
                </div>
            </div>
        @endif

        @if (session('error'))
            <div {{ $attributes->merge(['class' => 'toast show border-0']) }} role="alert" aria-live="assertive"
                aria-atomic="true" data-bs-delay="10000">
                <div class="toast-header text-bg-danger">
                    {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                    <i class="fas fa-message rounded me-2"></i>
                    <strong class="me-auto">Error!</strong>
                    <i class="col-auto small">{{ now()->format('h:i A') }}</i>
                    <button type="button" class="btn-close text-bg-danger" data-bs-dismiss="toast" aria-label="Close">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>

                <div class="toast-body text-black">
                    {!! session('error') !!}
                </div>
            </div>
        @endif
    </div>
@endif
