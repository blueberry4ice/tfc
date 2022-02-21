<div class="container-default container-search">
    <!-- /header -->
    <header id="header" class="header header-black">
        <div class="clearfix inner-container">
            <div class="pull-left">
                <div class="logo-area">
                    <a href="/">
                        <img src="{{ asset('assets/img/logo-astindo-white.png') }}" alt="logo-color">
                    </a>
                </div>
            </div>
            <div class="pull-right menubar-wrapper">
                <div class="clearfix">
                    @livewire('menu-component')
                </div>

            </div>
        </div>
    </header>
    <!-- overlay -->
    <div class="overlay-wrapper-home">

    </div>


    <section class="search-wrapper" style="min-height: 60vh">
        <div class="clearfix inner-container">
            <div class="clearfix pagination-wrapper">
                <div class="pull-right pr1">
                    {{ $products->appends(Request::except('page'))->withQueryString()->links('livewire.pagination-component') }}
                </div>
            </div>
            <div class="pull-left left-search">
                
                <div class="filter-wrapper bordered-box">
                    <div class="bold fz20 mb1">Category</div>
                        <div class="bold fz20 mb1">
                            {{-- <form action="" method="GET" id="form-filter-product" name="form-filter-product"> --}}
                            @foreach ($categories as $category )
                            <input type="checkbox" name="agent[]" value={{$category->id}} wire:model="listcategory.{{$category->id}}">{{$category->name}}
                        <br>
                            @endforeach
                            {{-- </form> --}}

                        </div>
                        <br>
                    <div class="bold fz20 mb1">Travel Agent</div>
                        <div class="bold fz20 mb1">
                            @foreach ($agents as $agent )
                            <input type="checkbox" name="agent[]" value={{$agent->id}} wire:model="listAgent.{{$agent->id}}">{{$agent->name}}

                            @endforeach

                        </div>
                    
                    {{-- <div class="bold fz20 mb1">Travel Agent</div> --}}
                    <h5 class="widget-title">Price <span class="text-info">IDR {{ $min_price }} - IDR
                            {{ $max_price }}</h5>
                    <div id="slider" wire:ignore>

                    </div>
                </div>
            </div>
            <div class="pull-left right-search">
                <div class="search-title">Search Result</div>
                <div class="flex-wrap layout-flex">
                    @foreach ($products as $product)
                        @if ($product->category == 'airticket')
                            <div class="flex-three card-wrapper c-pointer bordered-box"
                                onclick="location.href='{{ route('airticket.detail', ['airticketid' => $product->id]) }}'">
                            @else
                                <div class="flex-three card-wrapper c-pointer bordered-box"
                                    onclick="location.href='{{ route('tourpackage.detail', ['packageid' => $product->id]) }}'">
                        @endif

                        <div class="image-portrait-wrapper">
                            <div class="image-portrait"
                                style="background-image: url('assets/img/{{ $product->thumbnail }}')"></div>
                        </div>
                        <div class="card-content-wrapper">
                            <div class="bold fz20 content-title mb1">{{ $product->name }}</div>
                            <div class="content-description fz14 mb20px truncate-list" data-height="80">
                                {{ $product->summary }}</div>
                            <div class="content-starting fz12">Start from</div>
                            <div class="content-price mb1 bold fz18">IDR <span
                                    class="format-idr">{{ $product->price }}</span>
                            </div>
                            <div class="text-center">
                                @if ($product->category == 'airtickets')
                                    <a href="{{ route('airticket.detail', ['airticketid' => $product->id]) }}"
                                        class="btnAstindo btnAstindo-default">Details</a>
                                @elseif ($product->category == 'tourpackages')
                                    <a href="{{ route('tourpackage.detail', ['packageid' => $product->id]) }}"
                                        class="btnAstindo btnAstindo-default">Details</a>
                                @endif

                            </div>
                        </div>
                </div>
                @endforeach

            </div>
            
        </div>
</div>
</section>

<!-- footer -->
<footer class="footer">
    <div class="footer-inner inner-container">
        <div class="text-center">
            <div class="clearfix partner-wrapper">
                <div class="pull-left partner-list">
                    <div class="bold fz12 partner-name">Bank Partner</div>
                </div>
                <div class="pull-left partner-list">
                    <div class="bold fz12 partner-name">Insurance Partner</div>
                </div>
                <div class="pull-left partner-list">
                    <div class="bold fz12 partner-name">GDS Partner</div>
                </div>
                <div class="pull-left partner-list">
                    <div class="bold fz12 partner-name">Supporting Airline</div>
                </div>
                <div class="pull-left partner-list">
                    <div class="bold fz12 partner-name">Organized by</div>
                </div>
            </div>
            <div class="clearfix partner-wrapper">
                <div class="pull-left partner-list">
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/5-bank.png') }}" alt="">
                    </div>
                </div>
                <div class="pull-left partner-list">
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/amanyaman.svg') }}" alt="">
                    </div>
                </div>
                <div class="pull-left partner-list">
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/galileo.png') }}" alt="">
                    </div>
                </div>
                <div class="pull-left partner-list">
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/garuda.jpg') }}" alt="">
                    </div>
                </div>
                <div class="pull-left partner-list">
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/logo-ati.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


</div>


@push('scripts')
    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start: [1, 1000000],
            connect: true,
            range: {
                'min': 1,
                'max': 1000000
            },

            pip: {
                mode: 'steps',
                stepped: true,
                density: 4
            },

        });

        slider.noUiSlider.on('update', function(value) {
            @this.set('min_price', value[0]);
            @this.set('max_price', value[1]);
        })

    </script>
@endpush
