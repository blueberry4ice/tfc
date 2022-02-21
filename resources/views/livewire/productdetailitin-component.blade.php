<div class="container-default container-search-detail">

    <div class="overlay-wrapper-home">

    </div>

    <div>
        @livewire('header3-component')
    </div>

    <section class="bg-wrapper-detail">
        <div class="hero-image-wrapper"
            style="background-image: url('{{asset('storage/product_image/'.$product->image)}}')">
            <div class="caption-wrapper-detail">
                <div class="inner-container">
                    <div class="layout-flex space-between align-center">
                        <div class="product-detail-caption">
                            <div class="white bold product-name">{{ $product->name }}</div>
                            <div class="white product-code">Product Code : {{ $product->sku }}</div>
                        </div>
                        
                        <div>
                            <a href="{{ route('agentproductitin.pick', ['productid' => $product->id, 'category' => $category]) }}"
                                class="btnAstindo btnAstindo-default">
                                @switch($category)
                    @case(2)
                    Book Now! 
                    @break
                    @case(3)
                    Book Now! 
                    @break
                    @case(4)
                    Book Now! 
                    @break
                    @case(5)
                    Book Now! 
                        @break
                    @case(6)
                    Book Now!
                    @break
                    @case(7)
                    Buy Now!
                    @break
                    @case(8)
                    Book Now!
                    @break
                    @case(10)
                    Book Now!
                    @break
                    @case(11)
                        Buy Now!
                    @break
                    @default
                    Book Now!
                    @endswitch
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- @if ($category == 111)
        <section class="content-wrapper">
            <div class="inner-container">
                <div class="layout-flex space-between" style="margin-bottom: 50px;">
                    <div class="card-wrapper card-three-column bordered-box">
                        <div class="text-center card-title">
                                <div class="bold fz24" >What to Expect</div>

                        </div>
                        <p style="white-space: pre-wrap">{{ $product->summary }}</p>
                    </div>
                    <div class="card-wrapper card-three-column bordered-box">
                        <div class="text-center card-title">
                            @if ($category == 7)
                                <div class="bold fz24">{{ $product->name }}</div>
                            @else
                                <div class="bold fz24" style="white-space: pre-wrap">About the Attraction</div>
                            @endif
                        </div>
                        <p style="white-space: pre-wrap">{{ $product->about }}</p>
                    </div>
                    <div class="card-wrapper card-three-column bordered-box">
                        <div class="text-center card-title">
                            @if ($category == 7)
                                <div class="bold fz24" style="white-space: pre-wrap">Premium and Coverage</div>
                            @else
                                <div class="bold fz24" style="white-space: pre-wrap">Details</div>
                            @endif

                        </div>
                        <p style="white-space: pre-wrap">{{ $product->detail }}</p>
                    </div>
                    <div class="card-wrapper card-three-column bordered-box">
                        <div class="text-center card-title">
                            <div class="bold fz24">Tour Price</div>
                        </div>

                        @foreach ($prices as $price)
                            <div class="layout-flex space-between mb1">
                                <div class="bold mb1">{{ $price->name }}</div>
                                <div>IDR
                                    <span class="format-idr">{{ $price->price }}</span>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('agentproductitin.pick', ['productid' => $product->id, 'category' => $category]) }}"
                        class="btnAstindo btnAstindo-default">
                        @if ($category == 7)
                            Buy Now!
                        @else
                            Book Now!
                        @endif
                    </a>
                </div>
            </div>
        </section>
    @else --}}
    <section class="content-wrapper">
        <div class="inner-container">
            <div class="layout-flex space-between" style="margin-bottom: 50px;">
                <div class="card-wrapper card-three-column bordered-box">
                    <div class="text-center card-title">
                        <div class="bold fz24">Summary</div>
                    </div>
                    <div class="mb1" style="white-space: pre-wrap">{{ $product->summary }}</div>

                </div>
                <div class="card-wrapper card-three-column bordered-box">
                    <div class="text-center card-title">
                        <div class="bold fz24">
                            @switch($category)
                                @case(2)
                                    Details 
                                @break
                                @case(3)
                                    Route 
                                @break
                                @case(4)
                                    Route 
                                @break
                                @case(5)
                                    Details 
                                    @break
                                @case(6)
                                    Route
                                @break
                                @case(7)
                                    Details
                                @break
                                @case(8)
                                    Details
                                @break
                                @case(10)
                                    Details
                                @break
                                @case(11)
                                    Details
                                @break
                                @default
                                    Route
                            @endswitch
                        </div>
                    </div>
                    <div class="mb1" style="white-space: pre-wrap">{{ $product->city }}</div>

                </div>
                <div class="card-wrapper card-three-column bordered-box">
                    <div class="text-center card-title">
                        <div class="bold fz24">Price</div>
                    </div>

                    @foreach ($prices as $price)
                        <div class="layout-flex space-between mb1">
                            <div class="bold mb1">{{ $price->name }}</div>
                            {{-- <div>IDR
                                    <span class="format-idr">{{ $price->price }}</span>

                                </div> --}}
                                @if ($price->price != 1)
                                <div> {{ 'IDR ' . number_format($price->price, 0) }}</div>
                                @else
                                    
                                @endif
                            
                        </div>

                    @endforeach
                </div>
            </div>
            @if (!empty($itineraries))
                <div class="bordered-box itinerary-box mb2">
                    <div class="bold fz24 mb1">Itinerary</div>
                    <?php $index = 1; ?>
                    @foreach ($itineraries as $itinerary)
                        <div class="clearfix itinerary-list">
                            <div class="pull-left w20">&nbsp;</div>
                            <div class="pull-left w80">
                                {{-- <div class="bold">Hari {{ $route->sr }}</div> --}}

                                <div class="fz20 bold mb10px">Hari {{ $index++ }}</div>
                                <div class="mb1">{{ $itinerary->desc }}</div>
                                
                                {{-- <div class="italic fz12 mb10px">{{ $itinerary->date }}</div> --}}
                                {{-- <p>{{ $itinerary->desc }}</p> --}}
                            </div>
                        </div>
                    @endforeach

                </div>
            @else
                @if (!empty($product->detail))
                    <div class="bordered-box itinerary-box mb2">
                        <div class="bold fz24 mb1">Special Remarks</div>
                        <div class="clearfix itinerary-list">
                            <div class="pull-left w20">&nbsp;</div>
                            <div class="pull-left w80">
                                {{-- <div class="fz20 bold mb10px"> {{ $product->detail }}</div> --}}
                                <div class="mb1" style="white-space: pre-wrap">{{ $product->detail }}</div>

                            </div>
                        </div>

                    </div>
                @else

                @endif
            @endif

            <div class="text-center">

                <a href="{{ route('agentproductitin.pick', ['productid' => $product->id, 'category' => $category]) }}"
                    class="btnAstindo btnAstindo-default">
                    @switch($category)
                    @case(2)
                    Book Now! 
                    @break
                    @case(3)
                    Book Now! 
                    @break
                    @case(4)
                    Book Now! 
                    @break
                    @case(5)
                    Book Now! 
                        @break
                    @case(6)
                    Book Now!
                    @break
                    @case(7)
                    Buy Now!
                    @break
                    @case(8)
                    Book Now!
                    @break
                    @case(10)
                    Book Now!
                    @break
                    @case(11)
                        Buy Now!
                    @break
                    @default
                    Book Now!
                @endswitch</a>
            </div>
            <br>
            @if ($product->flyer)
                <div class="text-center">
                    {{-- <a href="{{ route('downloadfile', ['productid' => $product->id, 'category' => $category]) }}"
                        class="btnAstindo btnAstindo-secondary">Download Catalog</a> --}}
                    <button wire:click="export" class="btnAstindo btnAstindo-secondary">
                        Download Catalog
                    </button>

                </div>
            @endif

        </div>
    </section>
    {{-- @endif --}}


    <div>
        @livewire('footer-component')
    </div>
    <!-- footer -->

    {{-- <footer class="footer-preevent">
    <div class="footer-inner inner-container">
        <div class="text-center">
            <div class="partner-wrapper">
                <div class="partner-list">
                    <div class="bold fz12 partner-name">Official Bank Sponsor</div>
                    <div class="partner-logo">
                        <img src="{{asset('assets/img/5-bank.png')}}" alt="">
                    </div>
                </div>
                <div class="partner-list">
                    <div class="bold fz12 partner-name">GDS Partner</div>
                    <div class="partner-logo">
                        <img src="{{asset('assets/img/galileo.png')}}" alt="">
                    </div>
                </div>
                <div class="partner-list">
                    <div class="bold fz12 partner-name">Telecommunication Partner</div>
                    <div class="partner-logo">
                        <img src="{{asset('assets/img/telkomsel.png')}}" alt="" style="max-height: 75%">
                    </div>
                </div>
                <div class="partner-list">
                    <div class="bold fz12 partner-name">Technology Partner</div>
                    <div class="partner-logo">
                        <img src="{{asset('assets/img/logo-ati.png')}}" alt="">
                    </div>
                </div>
                <div class="partner-list partner-group">
                    <div class="bold fz12 partner-name">Participating Airlines</div>
                    <div class="partner-logo" style="display: flex;">
                        <img src="{{asset('assets/img/ek.png')}}" alt="" style="padding: 0 20px;max-width: 25%;">
                        <img src="{{asset('assets/img/ey.png')}}" alt="" style="padding: 0 20px;max-width: 40%;">
                        <img src="{{asset('assets/img/garuda.png')}}" alt="" style="padding: 0 20px;max-width: 34%;">
                        <img src="{{asset('assets/img/ana.png')}}" alt="" style="padding: 0 20px;max-width: 26%;">
                        <img src="{{asset('assets/img/qr.png')}}" alt="" style="padding: 0 20px;max-width: 40%;">
                    </div>
                </div>
                <div class="partner-list partner-group">
                    <div class="bold fz12 partner-name">NTO Partners</div>
                    <div class="partner-logo" style="display: flex;">
                        <img th:src="@{/img/korea-nto.jpg}" src="{{asset('assets/img/korea-nto.jpg')}}" alt="" style="padding: 0 20px;max-width: 33.3334%;max-height: 70%">
                        <img th:src="@{/img/taiwan-nto.jpg}" src="{{asset('assets/img/taiwan-nto.jpg')}}" alt="" style="padding: 0 20px;max-width: 33.3334%;">
                        <img th:src="@{/img/thai-nto.png}" src="{{asset('assets/img/thai-nto.png')}}" alt="" style="padding: 0 20px;max-width: 33.3334%;max-height: 100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> --}}
</div>
