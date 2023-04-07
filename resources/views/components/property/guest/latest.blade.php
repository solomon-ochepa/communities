<div class="property-section section pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
    <div class="container">

        <!--Section Title start-->
        <div class="row">
            <div class="col-md-12 mb-60 mb-xs-30">
                <div class="section-title center">
                    <h1>Latest Property</h1>
                </div>
            </div>
        </div>
        <!--Section Title end-->

        <div class="row">
            @forelse ($properties ?? [] as $property)
                @if ($property->hasMedia(['image']))
                    <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                        <div class="property-inner">
                            <div class="image">
                                <a href="{{ route('property.show', ['property' => $property->id]) }}">
                                    {{-- height: 295 --}}
                                    <img src="{{ $property->media(['image'])->first()->getUrl() }}" alt="">
                                </a>

                                {{-- Attributes --}}
                                @if ($property->attributables)
                                    <ul class="property-feature">
                                        @php
                                            $limit = 3;
                                            $total_attributes = $property->attributables->count();
                                        @endphp
                                        @foreach ($property->attributables->take($limit) as $attributable)
                                            <li title="{{ $attributable->attribute->name }}" data-bs-toggle="tooltip">
                                                <span class="{{ $attributable->attribute->name }}">
                                                    @if ($attributable->attribute->icon)
                                                        <i class="{{ $attributable->attribute->icon }} me-1"></i>
                                                    @endif
                                                    {{ $attributable->option->value }}
                                                    @if (!$attributable->attribute->icon)
                                                        &middot; {{ $attributable->attribute->name }}
                                                    @endif
                                                </span>
                                            </li>
                                        @endforeach

                                        @if ($total_attributes > $limit)
                                            <li class="" title="more" data-bs-toggle="tooltip">
                                                <span class="d-block">
                                                    +{{ $total_attributes - $limit }}
                                                </span>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </div>

                            <div class="content_">
                                <h3 class="title fw-bold h5">
                                    <a
                                        href="{{ route('property.show', ['property' => $property->id]) }}">{{ $property->title }}</a>
                                </h3>

                                <h5 class="location d-block">
                                    <img src="/assets/guest/images/icons/marker.png" alt="">
                                    {{ $property->address->address }}
                                </h5>

                                <div class="content">
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price">N{{ number_format($property->price, 2) }}
                                                @if ($property->type == 'rent')
                                                    <span>M</span>
                                                @endif
                                            </span>
                                            <span class="type">
                                                @if ($property->type == 'rent')
                                                    For Rent
                                                @else
                                                    For Sale
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @php
                        continue;
                    @endphp
                @endif
            @empty
                <p class="text-center py-3">
                    No record found
                </p>
            @endforelse

            <!--Property start-->
            {{-- <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                <div class="property-inner">
                    <div class="image">
                        <span class="label">Feature</span>
                        <a href="#single-properties.html"><img src="/assets/guest/images/property/property-2.jpg"
                                alt=""></a>
                        <ul class="property-feature">
                            <li>
                                <span class="area"><img src="/assets/guest/images/icons/area.png" alt="">550
                                    SqFt</span>
                            </li>
                            <li>
                                <span class="bed"><img src="/assets/guest/images/icons/bed.png"
                                        alt="">6</span>
                            </li>
                            <li>
                                <span class="bath"><img src="/assets/guest/images/icons/bath.png"
                                        alt="">4</span>
                            </li>
                            <li>
                                <span class="parking"><img src="/assets/guest/images/icons/parking.png"
                                        alt="">3</span>
                            </li>
                        </ul>
                    </div>
                    <div class="content">
                        <div class="left">
                            <h3 class="title"><a href="#single-properties.html">Marvel de Villa</a></h3>
                            <span class="location"><img src="/assets/guest/images/icons/marker.png" alt="">450 E
                                1st Ave, New Jersey</span>
                        </div>
                        <div class="right">
                            <div class="type-wrap">
                                <span class="price">$2550</span>
                                <span class="type">For Sale</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--Property end-->

            <!--Property start-->
            {{-- <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                <div class="property-inner">
                    <div class="image">
                        <span class="label">popular</span>
                        <a href="#single-properties.html"><img src="/assets/guest/images/property/property-3.jpg"
                                alt=""></a>
                        <ul class="property-feature">
                            <li>
                                <span class="area"><img src="/assets/guest/images/icons/area.png" alt="">550
                                    SqFt</span>
                            </li>
                            <li>
                                <span class="bed"><img src="/assets/guest/images/icons/bed.png"
                                        alt="">6</span>
                            </li>
                            <li>
                                <span class="bath"><img src="/assets/guest/images/icons/bath.png"
                                        alt="">4</span>
                            </li>
                            <li>
                                <span class="parking"><img src="/assets/guest/images/icons/parking.png"
                                        alt="">3</span>
                            </li>
                        </ul>
                    </div>
                    <div class="content">
                        <div class="left">
                            <h3 class="title"><a href="#single-properties.html">Ruposi Bangla Cottage</a>
                            </h3>
                            <span class="location"><img src="/assets/guest/images/icons/marker.png" alt="">215 L
                                AH
                                Rod, California</span>
                        </div>
                        <div class="right">
                            <div class="type-wrap">
                                <span class="price">$550<span>M</span></span>
                                <span class="type">For Rent</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--Property end-->

            <!--Property start-->
            {{-- <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                <div class="property-inner">
                    <div class="image">
                        <a href="#single-properties.html"><img src="/assets/guest/images/property/property-4.jpg"
                                alt=""></a>
                        <ul class="property-feature">
                            <li>
                                <span class="area"><img src="/assets/guest/images/icons/area.png"
                                        alt="">550
                                    SqFt</span>
                            </li>
                            <li>
                                <span class="bed"><img src="/assets/guest/images/icons/bed.png"
                                        alt="">6</span>
                            </li>
                            <li>
                                <span class="bath"><img src="/assets/guest/images/icons/bath.png"
                                        alt="">4</span>
                            </li>
                            <li>
                                <span class="parking"><img src="/assets/guest/images/icons/parking.png"
                                        alt="">3</span>
                            </li>
                        </ul>
                    </div>
                    <div class="content">
                        <div class="left">
                            <h3 class="title"><a href="#single-properties.html">MayaKanon de Villa</a></h3>
                            <span class="location"><img src="/assets/guest/images/icons/marker.png" alt="">12
                                EA
                                1st Ave, Washington</span>
                        </div>
                        <div class="right">
                            <div class="type-wrap">
                                <span class="price">$550<span>M</span></span>
                                <span class="type">For Rent</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--Property end-->

            <!--Property start-->
            {{-- <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                <div class="property-inner">
                    <div class="image">
                        <a href="#single-properties.html"><img src="/assets/guest/images/property/property-5.jpg"
                                alt=""></a>
                        <ul class="property-feature">
                            <li>
                                <span class="area"><img src="/assets/guest/images/icons/area.png"
                                        alt="">550
                                    SqFt</span>
                            </li>
                            <li>
                                <span class="bed"><img src="/assets/guest/images/icons/bed.png"
                                        alt="">6</span>
                            </li>
                            <li>
                                <span class="bath"><img src="/assets/guest/images/icons/bath.png"
                                        alt="">4</span>
                            </li>
                            <li>
                                <span class="parking"><img src="/assets/guest/images/icons/parking.png"
                                        alt="">3</span>
                            </li>
                        </ul>
                    </div>
                    <div class="content">
                        <div class="left">
                            <h3 class="title"><a href="#single-properties.html">Azorex de South Villa</a>
                            </h3>
                            <span class="location"><img src="/assets/guest/images/icons/marker.png"
                                    alt="">668 L
                                2nd Ave, Boston</span>
                        </div>
                        <div class="right">
                            <div class="type-wrap">
                                <span class="price">$2550</span>
                                <span class="type">For Sale</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--Property end-->

            <!--Property start-->
            {{-- <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                <div class="property-inner">
                    <div class="image">
                        <span class="label">Feature</span>
                        <a href="#single-properties.html"><img src="/assets/guest/images/property/property-6.jpg"
                                alt=""></a>
                        <ul class="property-feature">
                            <li>
                                <span class="area"><img src="/assets/guest/images/icons/area.png"
                                        alt="">550
                                    SqFt</span>
                            </li>
                            <li>
                                <span class="bed"><img src="/assets/guest/images/icons/bed.png"
                                        alt="">6</span>
                            </li>
                            <li>
                                <span class="bath"><img src="/assets/guest/images/icons/bath.png"
                                        alt="">4</span>
                            </li>
                            <li>
                                <span class="parking"><img src="/assets/guest/images/icons/parking.png"
                                        alt="">3</span>
                            </li>
                        </ul>
                    </div>
                    <div class="content">
                        <div class="left">
                            <h3 class="title"><a href="#single-properties.html">Radison de Villa</a></h3>
                            <span class="location"><img src="/assets/guest/images/icons/marker.png" alt="">12
                                1st
                                Ave, New Yourk</span>
                        </div>
                        <div class="right">
                            <div class="type-wrap">
                                <span class="price">$550<span>M</span></span>
                                <span class="type">For Rent</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--Property end-->

        </div>

    </div>
</div>
