<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">{!! $title !!}</h1>

                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    @forelse ($breadcrumb ?? [] as $key => $item)
                        @if (Arr::last($breadcrumb, $key) or $item['active'])
                            <li class="active">{!! $title !!}</li>
                        @else
                            <li>
                                <a
                                    href="@isset($item['url']){{ $item['url'] }} @else javascript:// @endisset">
                                    {!! $item['title'] !!}
                                </a>
                            </li>
                        @endif
                    @empty
                        <li class="active">{{ $title }}</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
