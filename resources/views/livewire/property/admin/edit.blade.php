<form method="POST" action="{{ route('admin.property.update', ['property' => $property->id]) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <x-alert />

                <div class="row mb-4 gy-3">
                    {{-- Name --}}
                    <div class="col-col-12">
                        <input type="text" class="form-control" name="property[title]" placeholder="Title"
                            value="{{ old('property.title', $property->title) }}" required />
                        @error('property.title')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-col-12">
                        <textarea rows="4" class="form-control" name="property[description]" placeholder="Description" required>{{ old('property.description', $property->description) }}</textarea>
                        @error('property.description')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Price --}}
                    <div class="col-md-6">
                        <input type="number" min="1" step="1" class="form-control" name="property[price]"
                            placeholder="Price" value="{{ old('property.price', $property->price) }}" />
                        @error('property.price')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="category" placeholder="Category"
                            value="{{ old('category', $property->categories->first->name) }}" />
                        @error('category')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="container">
                        <div class="row mt-0 gy-3">
                            <div class="col-sm-12">
                                <h5 class="m-0 border-bottom">Address</h5>
                            </div>
                            {{-- Address --}}
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address[description]"
                                    placeholder="Address"
                                    value="{{ old('address.description', $property->address->description) }}" />
                                @error('address.description')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Area --}}
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="address[area]" placeholder="Area"
                                    value="{{ old('address.area', $property->address->area) }}" />
                                @error('address.area')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- City --}}
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="address[city]" placeholder="City"
                                    value="{{ old('address.city', $property->address->city) }}" />
                                @error('address.city')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- State --}}
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="address[state]" placeholder="State"
                                    value="{{ old('address.state', $property->address->state) }}" />
                                @error('address.state')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Country --}}
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="address[country]" placeholder="Country"
                                    value="{{ old('address.country', $property->address->country) }}" />
                                @error('address.country')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <livewire:property.admin.edit.attributes :property="$property" />
            </div>
        </div>

    </div>

    <div class="card-footer">
        <input type="submit" class="btn btn-primary" />
    </div>
</form>
