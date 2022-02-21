<?php 
use App\Models\Product;
?>

<div class="container-default container-search">
    <!-- /header -->
    <header id="header" class="header header-black">
        <div class="clearfix inner-container">
            <div class="pull-left">
                <div class="logo-area">
                    <a href="/">
                        <img src="{{asset('assets/img/logo-astindo-white.png')}}" alt="logo-color">
                    </a>
                </div>
            </div>
            <div class="pull-right menubar-wrapper">
                <div class="clearfix">
                    <ul class="menubar">
                        <li>
                            <div class="menu-search-wrapper clearfix">
                                <form action="{{ route('product.search') }}" id="form-search-sku"
                                    name="form-search-sku">
                                    <input type="text" name="sku" placeholder="Enter Product Code" class="pull-left">
                                    <button type="submit" form="form-search-sku" class="addon fa fa-search pull-left">
                                </form>
                            </div>
                        </li>
                        <li class="has-sub">
                            <a href="#" title="">Travel add ons</a>
                            <ul class="menusub-wrapper">
                                <li>
                                    <a href="/travelinsurance" title="">Travel Insurance</a>
                                </li>
                                <li>
                                    <a href="/visa" title="">Visa Application</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#" title="">Things to do</a>
                            <ul class="menusub-wrapper">
                                <li>
                                    <a href="/cruise" title="">Cruise</a>
                                </li>
                                <li>
                                    <a href="/attraction" title="">Attractions</a>
                                </li>
                                <li>
                                    <a href="/sightseeing" title="">Sightseeing</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/hotel" title="">Hotel</a>
                        </li>
                        <li class="has-sub">
                            <a href="#" title="">Transportations</a>
                            <ul class="menusub-wrapper">
                                <li>
                                    <a href="/rail" title="">Rails</a>
                                </li>
                                <li>
                                    <a href="/car" title="">Car</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/tourpackage" title="">Tour Package</a>
                        </li>
                        <li>
                            <a href="https://astindo.ati-bv.dev" target=”_blank” title="">Air Ticket</a>
                        </li>
                    </ul>
                </div>
                <div class="search-input-wrapper">
                    <div class="form-group clearfix">
                        <form action="{{ route('product.search') }}" id="form-search-top" name="form-search-top">
                            <input type="text" name="place" placeholder="" class="pull-left form-control">
                            <button type="submit" form="form-search-top" class="pull-left search-button fa fa-search">
                        </form>
                    </div>
                </div>
            </div>
            <div class="pull-right burger js-burger">
                <div class="burgerpadding-wrapper">
                    <div class="burger-wrapper">
                        <div>
                            <div></div>
                        </div>
                        <div>
                            <div></div>
                        </div>
                        <div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-wrapper">
            <ul>
                <li>
                    <a href="https://astindo.ati-bv.dev" target=”_blank” title="">Air Ticket</a>
                </li>
                <li>
                    <a href="/tourpackage" title="">Tour Package</a>
                </li>
                <li class="has-sub">
                    <a href="#" title="">Transportations</a>
                    <div class="mobile-menu-sub">
                        <ul>
                            <li>
                                <a href="/rail" title="">Rails</a>
                            </li>
                            <li>
                                <a href="/car" title="">Car</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" title="">Hotel</a>
                </li>
                <li class="has-sub">
                    <a href="#" title="">Things to do</a>
                    <div class="mobile-menu-sub">
                        <ul>
                            <li>
                                <a href="/cruise" title="">Cruise</a>
                            </li>
                            <li>
                                <a href="/attraction" title="">Attractions</a>
                            </li>
                            <li>
                                <a href="/sightseeing" title="">Sightseeing</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="has-sub">
                    <a href="#" title="">Travel add ons</a>
                    <div class="mobile-menu-sub">
                        <ul>
                            <li>
                                <a href="/travelinsurance" title="">Travel Insurance</a>
                            </li>
                            <li>
                                <a href="/visa" title="">Visa Application</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="menu-search-wrapper clearfix">
                        <form action="{{ route('product.search') }}" id="form-search-sku-mobile"
                            name="form-search-sku-mobile">
                            <input type="text" name="sku" placeholder="Enter Product Code" class="pull-left">
                            <button type="submit" form="form-search-sku-mobile" class="addon fa fa-search pull-left">
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <section class="search-wrapper" style="min-height: 60vh">
        <div class="inner-container layout-flex space-between">
            <div class="show-filter js-show-filter bold">
                <svg class="inline" width="12" height="12" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg" data-id="IcSystemToolFilter">
                    <path d="M9 6H21M3 6H5M19 12H21M3 12H15M14 18H21M3 18H10" stroke="#687176" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7 8C8.10457 8 9 7.10457 9 6C9 4.89543 8.10457 4 7 4C5.89543 4 5 4.89543 5 6C5 7.10457 5.89543 8 7 8Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17 14C18.1046 14 19 13.1046 19 12C19 10.8954 18.1046 10 17 10C15.8954 10 15 10.8954 15 12C15 13.1046 15.8954 14 17 14Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 20C13.1046 20 14 19.1046 14 18C14 16.8954 13.1046 16 12 16C10.8954 16 10 16.8954 10 18C10 19.1046 10.8954 20 12 20Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span class="inline filter-text">Show Filter</span>
            </div>
            <div class="left-search">
                <div class="filter-wrapper bordered-box">


                    {{-- <div class="bold filter-title">Category</div>
                    <div class="filter-group">
                        @foreach ($dataCategories as $category)
                        <div class="custom-checkbox2">
                            <input type="checkbox" id="checkboxcategory{{$category->id}}" class="js-option-filter"
                                value={{$category->id}} wire:model="categories.{{$category->id}}">
                            <label for="checkboxcategory{{$category->id}}" class="semibold">
                                <span></span> {{$category->name}}
                            </label>
                        </div>
                        @endforeach
                    </div> --}}
                    {{-- <div class="bold filter-title">agent</div>
                    <div class="filter-group">
                        @foreach ($dataAgents as $agent)
                        <div class="custom-checkbox2">
                            <input type="checkbox" id="checkboxagent{{$agent->id}}" class="js-option-filter"
                                value={{$agent->id}} wire:model="agents.{{$agent->id}}">
                            <label for="checkboxagent{{$agent->id}}" class="semibold">
                                <span></span> {{$agent->name}}
                            </label>
                        </div>
                        @endforeach

                    </div> --}}
                    <div class="bold filter-title">Travel Agent</div>
                    <div class="filter-group filter-agent">
                        <div class="hidden-group">
                            {{-- <div> --}}
                                @foreach ($dataAgents as $agent)
                                <input type="checkbox" data-checkbox="{{$agent->name}}" value={{$agent->id}}
                                id="{{$agent->name}}" class="js-hidden-checkbox" wire:model="agents.{{$agent->id}}">
                                @endforeach
                            </div>
                            <div class="form-group">
                                <select name="" class="input-agent-mobile form-control">
                                    @foreach ($dataAgents as $agent)
                                    <option value="{{$agent->id}}" wire:model="agents.{{$agent->id}}">$agent</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-agent js-filter-agent">Choose your favorite travel agent</div>
                            <ul class="custom-list"></ul>
                            <div class="wrapper-filter-agent">
                                <ul class="grid">
                                    @foreach ($dataAgents as $agent)
                                    <li class="grid-item" data-agent="{{$agent->name}}">
                                        <a href="#" class="grid-link">
                                            <img src="/assets/img/agent/{{$agent->thumbnail}}" class="grid-img">
                                        </a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="bold filter-title">Departure</div>
                        <div class="filter-group filter-month">
                            @foreach ($dataMonths as $month)
                            <div class="custom-checkbox2">
                                <input type="checkbox" id="checkboxdept{{$month->id}}" class="js-option-filter"
                                    value={{$month->id}} wire:model="months.{{$month->id}}">
                                <label for="checkboxdept{{$month->id}}" class="semibold">
                                    <span></span> {{$month->name}}
                                </label>
                            </div>
                            @endforeach


                        </div>
                        <div class="bold filter-title">Destination</div>
                        <div class="filter-group filter-destination">
                            @foreach (Product::getContinent() as $continent)
                            <div class="region-wrapper">
                                <div class="region-name">{{$continent['continent']}}</div>
                                <div class="region-list">
                                    @foreach (Product::getCountry($continent['continent']) as $country)
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="checkboxcountry{{$country['country']}}"
                                            class="js-option-filter" value={{$country['country']}}
                                            wire:model="countries.{{$country['country']}}">
                                        <label for="checkboxcountry{{$country['country']}}" class="semibold">
                                            <span></span> {{$country['country']}}
                                        </label>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="bold filter-title">Price Range <span>(IN IDR)</span></div>
                        <div class="filter-group filter-price">
                            <div class="range-slider__slider">
                                <div id="sliderprice" wire:ignore>

                                </div>
                            </div>
                            <div class="price-range min-price">0</div>
                            <div class="price-range max-price">1.000.000</div>
                        </div>

                        {{-- <div class="filter-group filter-price">
                            <div class="range-slider__slider">
                                <div class="range">
                                    <form oninput="output.value = Math.round(range.valueAsNumber)">
                                        <input name="range" type="range" min="0" max="1000000"
                                            class="range-input hidden-group" id="range-input">
                                        <div class="range-output">
                                            <output class="output" name="output" for="range">{{$range}}
                                            </output>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div> --}}






                        <div class="wrapper-button-filter layout-flex space-between align-center">
                            <div class="blue js-showall">Show All</div>
                            {{-- <a href="#" class="btnAstindo btnAstindo-default">Filter</a> --}}
                        </div>
                    </div>
                </div>
                <div class="right-search">
                    <div class="search-title">Search Result</div>
                    <div class="layout-flex flex-wrap">
                        @foreach ($products as $product)
                        {{-- <div class="flex-three card-wrapper c-pointer bordered-box" onclick="location.href='{{ route('tourpackage.detail', ['productid' => $product->id]) }}'"> --}}
                            <div class="flex-three card-wrapper c-pointer bordered-box" onclick="location.href='{{ route('productitin.detail', ['productid' => $product->id,'category' => $product->category]) }}'">

                            <div class="image-portrait-wrapper">
                                <div class="image-portrait"
                                    style="background-image: url('assets/img/{{$product->thumbnail}}')"></div>
                            </div>
                            <div class="card-content-wrapper">
                                <div class="bold fz20 content-title mb1">{{$product->name}}</div>
                                <div class="content-description fz14 mb20px truncate-list " data-height="80">
                                    {{$product->summary}}</div>
                                <div class="content-starting fz12">Start from</div>
                                <div class="content-price mb1 bold fz18">IDR <span
                                        class="format-idr">{{$product->price}}</span></div>
                                <div class="text-center">
                                    <a href="{{ route('productitin.detail', ['productid' => $product->id,'category' => $product->category]) }}"
                                        class="btnAstindo btnAstindo-default">Read more</a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                    <div class="clearfix pagination-wrapper">
                        <div class="pull-right pr1">
                            {{
                            $products->appends(Request::except('page'))->withQueryString()->links('livewire.pagination-component')
                            }}
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- footer -->
    <footer class="footer-preevent">
        <div class="footer-inner inner-container">
            <div class="text-center">
                <div class="partner-wrapper">
                    <div class="partner-list">
                        <div class="bold fz12 partner-name">The Official Bank Sponsor</div>
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
                        <div class="bold fz12 partner-name">Supported By</div>
                        <div class="partner-logo">
                            <img src="{{asset('assets/img/logo-ati.png')}}" alt="">
                        </div>
                    </div>
                    <div class="partner-list partner-group">
                        <div class="bold fz12 partner-name">Supporting Airlines</div>
                        <div class="partner-logo" style="display: flex;">
                            <img th:src="@{/assets/img/ek.png}" src="{{asset('assets/img/ek.png')}}" alt=""
                                style="padding: 0 20px;max-width: 25%;">
                            <img th:src="@{/assets/img/ey.png}" src="{{asset('assets/img/ey.png')}}" alt=""
                                style="padding: 0 20px;max-width: 40%;">
                            <img th:src="@{/assets/img/garuda.png}" src="{{asset('assets/img/garuda.png')}}" alt=""
                                style="padding: 0 20px;max-width: 34%;">
                            <img th:src="@{/assets/img/ana.png}" src="{{asset('assets/img/ana.png')}}" alt=""
                                style="padding: 0 20px;max-width: 26%;">
                            <img th:src="@{/assets/img/qr.png}" src="{{asset('assets/img/qr.png')}}" alt=""
                                style="padding: 0 20px;max-width: 40%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

@push('scripts')
<script>
    // new RangeInput(document.querySelector('.range'));

    var sliderprice = document.getElementById('sliderprice');

noUiSlider.create(sliderprice, {
    start: [{{$range}}],
    connect: 'lower',
tooltips: [
    wNumb({
        decimals: 0,
        thousand: '.',
        // suffix: ' IDR'
    })
    ],
    range: {
        'min': [0],
        'max': [1000000]
    },
      
});

// sliderRange.noUiSlider.set('range');

sliderprice.noUiSlider.on('change', function(value) {
    console.log(sliderprice.noUiSlider.get());
    @this.set('rangeslider', sliderprice.noUiSlider.get());

        });


        window.addEventListener('contentChanged', event => {
            console.log("di sini");
});

         

</script>



@endpush