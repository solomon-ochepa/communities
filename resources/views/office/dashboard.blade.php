<x-office-layout>
    <section class="section">
        {{-- <div class="section-header">
            <h1>{{ __('dashboard.dashboard') }}</h1>
            {{ Breadcrumbs::render('dashboard') }}
        </div> --}}

        {{-- Clock In --}}
        {{-- <div class="row">
            <div class="col-md-12">
                @if (!blank($attendance))
                    <div class="float-right  d-flex text-center" style="margin-left:auto">
                        <p class="mr-2">
                            <span class="clock-span"><i class="fas fa-4x fa-clock"></i> {{ date('g:i A') }}</span><br>
                            @if ($attendance->checkin_time)
                                <span class="text-success">
                                    {{ __('dashboard.clock_in_at') }} - {{ $attendance->checkin_time }}
                                    @if ($attendance->checkout_time)
                                        <span class="text-danger ml-2">
                                            {{ __('dashboard.clock_out_at') }} - {{ $attendance->checkout_time }}</span>
                                    @endif
                                </span>
                            @endif
                        </p>
                        @if (!$attendance->checkout_time)
                            <form action="{{ route('office.attendance.clockout') }}" method="post">
                                {{ csrf_field() }}
                                <button class="btn  d-flex inputbtnclockout align-items-center btn-dark"
                                    type="submit"><i
                                        class="fas fa-4x fa-sign-out-alt"></i>{{ __('dashboard.clock_out') }}</button>
                            </form>
                        @endif
                    </div>
                @else
                    <div class="float-right  d-flex text-center" style="margin-left:auto">
                        <p class="mt-2 mr-2">
                            <span class="clock-span"><i class="fas fa-4x fa-clock"></i> {{ date('g:i A') }}</span><br>
                        </p>
                        <button type="button" class="btn  d-flex inputbtnclockin align-items-center btn-success"
                            data-toggle="modal" data-target="#exampleModal"><i
                                class="fas fa-4x fa-sign-out-alt"></i>{{ __('dashboard.clock_in') }}</button>
                    </div>
                @endif
            </div>
        </div> --}}

        <livewire:dashboard.stats />

        <livewire:office.visit.recent />
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.clock_in') }} - <span
                            class="clock-span"><i class="fas fa-4x fa-clock"></i> {{ date('g:i A') }}</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('office.attendance.clockin') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ __('dashboard.working_from') }}</label>
                            <input type="text" name="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                placeholder="e.g. Office, Home, etc.">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('dashboard.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('dashboard.clock_in') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-office-layout>
