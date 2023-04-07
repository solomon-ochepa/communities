@if ($errors->any() or session('status') or session('error'))
    <div class="">
        <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
        @if ($errors->any())
            <div {{ $attributes->merge(['class' => '']) }}>
                <div class="text-danger">{{ __('Whoops! Something went wrong.') }}</div>

                <ul class="mt-3 list-disc list-inside text-sm text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div {{ $attributes->merge(['class' => 'alert alert-success']) }}>
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div {{ $attributes->merge(['class' => 'alert alert-danger']) }}>
                {{ session('error') }}
            </div>
        @endif
    </div>
@endif
