<div class="main-container">
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
                        <ul class="menubar">
                            <li>
                                <div class="menu-search-wrapper clearfix">
                                    <input type="text" name="" placeholder="Enter SKU" class="pull-left">
                                    <div class="pull-left addon">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" title="">Travel add ons</a>
                            </li>
                            <li>
                                <a href="#" title="">Things to do</a>
                            </li>
                            <li>
                                <a href="#" title="">Hotel</a>
                            </li>
                            <li>
                                <a href="#" title="">Transportations</a>
                            </li>
                            <li>
                                <a href="#" title="">Tour Package</a>
                            </li>
                            <li>
                                <a href="/airticket" title="">Air Ticket</a>
                            </li>
                        </ul>
                    </div>
                    <div class="search-input-wrapper">
                        <div class="form-group clearfix">
                            <input type="text" name="search input" class="pull-left form-control">
                            <div class="pull-left search-button">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="search-wrapper" style="min-height: 60vh">
            <div class="clearfix inner-container">
                <div class="pull-left left-search">
                    <div class="filter-wrapper bordered-box">
                        {{-- <div class="bold fz20 mb1">Travel Agent</div> --}}
                        <h5 class="widget-title">Price <span class="text-info">IDR {{$min_price}} - IDR {{$max_price}}</h2>
                        <div id="slider" wire:ignore>

                        </div>
                    </div>
                </div>
                <div class="pull-left right-search">
                    <div class="search-title">Search Result</div>
                    <div class="layout-flex flex-wrap">
                        @foreach ( $products as $product )
                        <div class="flex-three card-wrapper c-pointer bordered-box">
                            <div class="image-portrait-wrapper">
                                <div class="image-portrait"
                                    style="background-image: url('assets/img/{{$product->thumbnail}}')"></div>
                            </div>
                            <div class="card-content-wrapper">
                                <div class="bold fz20 content-title mb1">{{$product->name}}</div>
                                <div class="content-description fz14 mb20px truncate-list" data-height="80">
                                    {{$product->summary}}</div>
                                <div class="content-starting fz12">Start from</div>
                                <div class="content-price mb1 bold fz18">IDR <span
                                        class="format-idr">{{$product->price}}</span></div>
                                <div class="text-center">
                                    <a href="#" class="btnAstindo btnAstindo-default">Search</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="clearfix pagination-wrapper">
                        <div class="pull-right pr1">
                            {{-- {{$airtickets->links()}} --}}
                            {{--

                    {{-- <div class="inline fz24 c-pointer">
                        <i class="blue fa fa-caret-left"></i>
                    </div>
                    <div class="inline fz12 text-center" style="width: 130px">Page 1 of 12</div>
                    <div class="inline fz24 c-pointer">
                        <i class="blue fa fa-caret-right"></i>
                    </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@push('scripts')
    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start : [1,1000000],
            connect : true,
            range : {
                'min' : 1,
                'max' : 1000000
            },
            pip : {
                mode : 'steps',
                stepped : true,
                density : 4
            }
        });

        slider.noUiSlider.on('update', function(value){
            @this.set('min_price',value[0]);
            @this.set('max_price',value[1]);
        })
    </script>
@endpush
