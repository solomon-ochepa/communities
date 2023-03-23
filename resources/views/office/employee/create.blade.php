<x-office-layout>
    {{-- <div class="section-header">
        <h1>{{ __('employee.employees') }}</h1>
        {{ Breadcrumbs::render('employees/add') }}
    </div> --}}

    <div class="card my-4">
        <form action="{{ route('office.employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row gy-3">
                            {{-- User --}}
                            <div class="form-group col-md-4">
                                <label for="user_id">{{ __('label.user') }}</label>
                                <span class="text-danger">*</span>
                                <select id="user_id" name="employee[user_id]"
                                    class="form-control @error('employee.user_id') border-danger @enderror" required>
                                    <option value="">Select</option>
                                    @foreach ($users as $key => $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('employee.user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('employee.user_id')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- employed_at --}}
                            <div class="form-group col-md-4">
                                <label>{{ __('employee.employed_at') }}</label> <span class="text-danger">*</span>
                                <input type="date" autocomplete="off" id="date-picker" name="employee[employed_at]"
                                    class="form-control @error('employee.employed_at') border-danger @enderror"
                                    value="{{ old('employee.employed_at') }}" required />
                                @error('employee.employed_at')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label>{{ __('levels.status') }}</label> <span class="text-danger">*</span>
                                <select name="employee[status_code]"
                                    class="form-control @error('employee.status_code') border-danger @enderror"
                                    required>
                                    <option value="">Select</option>
                                    @foreach ($statuses ?? [] as $status)
                                        <option value="{{ $status->code }}"
                                            {{ old('employee.status_code') == $status->code ? 'selected' : '' }}>
                                            {{ $status->name }} ({{ $status->code }})</option>
                                    @endforeach
                                </select>
                                @error('employee.status_code')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="employee-department_id">{{ __('employee.department') }}</label> <span
                                    class="text-danger">*</span>
                                <select id="employee-department_id" name="employee[department_id]"
                                    class="form-control @error('employee.department_id') border-danger @enderror"
                                    required>
                                    <option value="">Select</option>
                                    @foreach ($departments as $key => $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('employee.department_id') == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('employee.department_id')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="employee-designation_id">{{ __('employee.designation') }}</label> <span
                                    class="text-danger">*</span>
                                <select id="employee-designation_id" name="employee[designation_id]"
                                    class="form-control @error('employee.designation_id') border-danger @enderror"
                                    required>
                                    <option value="">Select</option>
                                    @foreach ($designations as $key => $designation)
                                        <option value="{{ $designation->id }}"
                                            {{ old('employee.designation_id') == $designation->id ? 'selected' : '' }}>
                                            {{ $designation->name }}</option>
                                    @endforeach
                                </select>
                                @error('employee.designation_id')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="about">{{ __('employee.about') }}</label>
                                <textarea name="employee[about]"
                                    class="summernote-simple form-control height-textarea @error('employee.about')
                                                  border-danger @enderror"
                                    id="about">
                                    {{ old('employee.about') }}
                                    </textarea>
                                @error('employee.about')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <img class="img-thumbnail image-width mt-4 mb-3 w-100" id="previewImage"
                                src="{{ asset('assets/img/default/user.png') }}" alt="your image" />

                            <div class="custom-file">
                                <input name="image" type="file"
                                    class="custom-file-input @error('image') border-danger @enderror" id="customFile"
                                    onchange="readURL(this);" />

                                {{-- <label class="custom-file-label"
                                    for="customFile">{{ __('employee.choose_file') }}</label> --}}
                            </div>
                            @error('image')
                                <div class="form-text help-block text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer ">
                <button class="btn btn-primary mr-1" type="submit">{{ __('employee.submit') }}</button>
                <a href="{{ route('office.employee.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    @endpush

    @push('js')
        <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ asset('assets/modules/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('js/employee/create.js') }}"></script>
    @endpush
</x-office-layout>
