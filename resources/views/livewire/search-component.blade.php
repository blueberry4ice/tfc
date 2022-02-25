<?php
use App\Models\Product;
?>

<div class="container-default container-search">
    {{-- <div class="overlay-wrapper">
        <div wire:loading style="color: #9988cd" class="la-ball-spin-clockwise-fade-rotating la-3x">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}

    {{-- <div wire:loading class="static fixed top-0 bottom-0 left-0 z-50 flex w-full bg-gray-400 bg-opacity-50">
        <img src="https://paladins-draft.com/img/circle_loading.gif" width="64" height="64" class="m-auto mt-1/4">
      </div> --}}
    @livewire('header2-component')
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

                    @if ($this->menu == 0)
                        <div class="bold filter-title">Category</div>
                        <div class="filter-group">
                            @foreach ($dataCategories as $category)
                                <div class="custom-checkbox2">
                                    {{-- <input type="checkbox" id="checkbox1" class="js-option-filter"> --}}
                                    <input type="checkbox" id="checkboxcategory{{ $category->id }}"
                                        class="js-option-filter" value={{ $category->id }}
                                        wire:model="categories.{{ $category->id }}">
                                    <label for="checkboxcategory{{ $category->id }}" class="semibold">
                                        <span></span> {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    @endif

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
                                <input type="checkbox" data-checkbox="{{ $agent->name }}" value={{ $agent->id }}
                                    id="{{ $agent->name }}" class="js-hidden-checkbox"
                                    wire:model="agents.{{ $agent->id }}">
                            @endforeach
                        </div>
                        <div class="form-group">
                            <select name="" class="input-agent-mobile form-control">
                                @foreach ($dataAgents as $agent)
                                    <option value="{{ $agent->id }}" data-agent="{{ $agent->name }}"
                                        wire:model="agents.{{ $agent->id }}">{{ $agent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-agent js-filter-agent">Choose your favorite travel agent</div>
                        <ul class="custom-list" style="display: block"></ul>
                        <div class="wrapper-filter-agent">
                            <ul class="grid">
                                @foreach ($dataAgents as $agent1)
                                    <li class="grid-item" data-agent="{{ $agent1->name }}">
                                        <a href="#" class="grid-link">
                                            <img src="{{ asset('storage/agent/' . $agent1->thumbnail) }}"
                                                class="grid-img">
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
                                <input type="checkbox" id="checkboxdept{{ $month->id }}" class="js-option-filter"
                                    value={{ $month->id }} wire:model="months.{{ $month->id }}">
                                <label for="checkboxdept{{ $month->id }}" class="semibold">
                                    <span></span> {{ $month->name }}
                                </label>
                            </div>
                        @endforeach


                    </div>
                    <div class="bold filter-title">Destination</div>
                    <div class="filter-group filter-destination">

                        @foreach ($continents as $continent)
                            {{ Product::createCountry($continent->continent, $continent->tablename) }}
                            <div class="region-wrapper">
                                <div class="region-name">{{ ucwords(strtolower($continent->continent)) }}</div>
                                <div class="region-list">
                                    @foreach (Product::getCountry($continent->continent, $continent->tablename) as $country)
                                        <div class="custom-checkbox2">
                                            <input type="checkbox" id="checkboxcountry{{ $country['country'] }}"
                                                class="js-option-filter" value={{ $country['country'] }}
                                                wire:model="countries.{{ $country['country'] }}">
                                            <label for="checkboxcountry{{ $country['country'] }}"
                                                class="semibold">
                                                <span></span> {{ ucwords(strtolower($country['country'])) }}
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
                        <div class="price-range max-price">100.000.000</div>
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






                    {{-- <div class="wrapper-button-filter layout-flex space-between align-center">
                            <div class="blue js-showall">Show All</div>
                            <a href="#" class="btnAstindo btnAstindo-default">Filter</a>
                        </div> --}}
                </div>
            </div>
            <div class="right-search">
                <div class="search-title">Search Result
                    <div></div>
                    <div wire:loading class="la-line-scale la-dark la-2x">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>


                <div class="flex-wrap layout-flex">

                    @foreach ($products as $product)
                        @switch($product->category)
                            @case(1)
                                <div class="flex-three card-wrapper c-pointer bordered-box"
                                    onclick="location.href='{{ route('airticket.detail', ['airticketid' => $product->id]) }}'">
                                @break

                                @case(2)
                                    <div class="flex-three card-wrapper c-pointer bordered-box"
                                        onclick="location.href='{{ route('productitin.detail', ['productid' => $product->id, 'category' => $product->category]) }}'">
                                    @break

                                    @case(3)
                                        <div class="flex-three card-wrapper c-pointer bordered-box"
                                            onclick="location.href='{{ route('productitin.detail', ['productid' => $product->id, 'category' => $product->category]) }}'">
                                        @break

                                        @case(4)
                                            <div class="flex-three card-wrapper c-pointer bordered-box"
                                                onclick="location.href='{{ route('productitin.detail', ['productid' => $product->id, 'category' => $product->category]) }}'">
                                            @break

                                            @case(5)
                                                <div class="flex-three card-wrapper c-pointer bordered-box"
                                                    onclick="location.href='{{ route('productitin.detail', ['productid' => $product->id, 'category' => $product->category]) }}'">
                                                @break

                                                @case(6)
                                                    <div class="flex-three card-wrapper c-pointer bordered-box"
                                                        onclick="location.href='{{ route('productitin.detail', ['productid' => $product->id, 'category' => $product->category]) }}'">
                                                    @break

                                                    @case(7)
                                                        <div class="flex-three card-wrapper c-pointer bordered-box"
                                                            onclick="location.href='{{ route('productitin.detail', ['productid' => $product->id, 'category' => $product->category]) }}'">
                                                        @break

                                                        @case(8)
                                                            <div class="flex-three card-wrapper c-pointer bordered-box"
                                                                onclick="location.href='{{ route('productitin.detail', ['productid' => $product->id, 'category' => $product->category]) }}'">
                                                            @break

                                                            @case(10)
                                                                <div class="flex-three card-wrapper c-pointer bordered-box"
                                                                    onclick="location.href='{{ route('productitin.detail', ['productid' => $product->id, 'category' => $product->category]) }}'">
                                                                @break

                                                                @default
                                                                    <div class="flex-three card-wrapper c-pointer bordered-box"
                                                                        onclick="location.href='{{ route('productitin.detail', ['productid' => $product->id, 'category' => $product->category]) }}'">
                                                                @endswitch

                                                                <div class="image-portrait-wrapper">
                                                                    <div class="image-portrait"
                                                                        style="background-image: url('{{ asset('storage/product_thumbnail/' . $product->thumbnail) }}')">
                                                                    </div>
                                                                </div>
                                                                <div class="card-content-wrapper">
                                                                    <div class="bold fz20 content-title mb1">
                                                                        {{ $product->name }}</div>

                                                                    <div class="content-description fz14 mb20px">
                                                                        {{ $product->summary }}</div>
                                                                    <div class="content-starting fz12 mb1">Product Code
                                                                        : {{ $product->sku }}</div>
                                                                    @if ($product->price != 1)
                                                                        <div class="content-starting fz12">Start from
                                                                        </div>
                                                                        {{-- <div class="content-price mb1 bold fz18">IDR <span
                                                                            class="format-idr">{{$product->price}}</span>
                                                                    </div> --}}
                                                                        <div class="mb1 bold fz18">
                                                                            {{ 'IDR ' . number_format($product->price, 0) }}
                                                                        </div>
                                                                    @else
                                                                    @endif

                                                                    <div class="text-center">
                                                                        <a href="{{ route('productitin.detail', ['productid' => $product->id, 'category' => $product->category]) }}"
                                                                            class="btnAstindo btnAstindo-default">Read
                                                                            more</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                    @endforeach


                </div>
                @if (!$products->isEmpty())
                    <div class="clearfix pagination-wrapper">
                        <div class="pull-right pr1">
                            {{ $products->appends(Request::except('page'))->withQueryString()->links('livewire.pagination-component') }}
                        </div>
                    </div>
                @else
                    No Result Found
                @endif

            </div>
        </div>
    </section>

    @livewire('footer-component')



</div>

@push('scripts')
    <script>
        // new RangeInput(document.querySelector('.range'));

        var sliderprice = document.getElementById('sliderprice');

        noUiSlider.create(sliderprice, {
            start: [{{ $range }}],
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
                'max': [100000000]
            },

        });

        // sliderRange.noUiSlider.set('range');

        sliderprice.noUiSlider.on('change', function(value) {
            console.log(sliderprice.noUiSlider.get());
            @this.set('rangeslider', sliderprice.noUiSlider.get());

        });

        //         window.onload = function() {
        //             console.log("di sini");
        //             window.addEventListener('contentChanged', event => {
        //             console.log("di listener");
        // });
        //         }




        window.addEventListener('say-goodbye', event => {

            $('.js-hidden-checkbox').each(function() {
                _this = $(this);
                _parent = _this.closest('.filter-agent');
                _dropdown = _parent.find('.wrapper-filter-agent');
                _text = _this.attr('data-checkbox');
                _list = _parent.find('.custom-list');
                if (_this.is(':checked')) {
                    _text2 = _this.attr('data-checkbox');
                    _list.append('<li class="custom-agent-choice" data-choice="' + _text + '">' + '<span>' +
                        _text + '</span>' + '<img src="/assets/img/cancel.png" class="delete-agent">' +
                        '</li>');
                    // $('.js-hidden-checkbox[data-checkbox="'+_text+'"]').trigger("click");
                    $('.wrapper-filter-agent .grid-item[data-agent="' + _text2 + '"]').addClass('active');
                }
                if (!_this.is(':checked')) {
                    _text2 = _this.attr('data-checkbox');
                    $('.custom-agent-choice[data-choice="' + _text2 + '"]').remove();
                    $('.wrapper-filter-agent .grid-item[data-agent="' + _text2 + '"]').removeClass(
                        'active');
                }


            });
        });


        window.addEventListener('load', () => {
            Livewire.emit('getassets');
        })

        window.addEventListener('changeassets', e => {
            //   alert('loaded');
            // console.log( event.detail.agent);
            $('.js-hidden-checkbox').each(function() {
                _this = $(this);
                _parent = _this.closest('.filter-agent');
                _dropdown = _parent.find('.wrapper-filter-agent');
                _text = _this.attr('data-checkbox');
                _list = _parent.find('.custom-list');

                console.log("checked");
                _text2 = _this.attr('data-checkbox');
                _list.append('<li class="custom-agent-choice" data-choice="' + event.detail.agent + '">' +
                    '<span>' +
                    _text + '</span>' + '<img src="/assets/img/cancel.png" class="delete-agent">' +
                    '</li>');
                // $('.js-hidden-checkbox[data-checkbox="'+_text+'"]').trigger("click");
                $('.wrapper-filter-agent .grid-item[data-agent="' + event.detail.agent + '"]').addClass(
                    'active');



            });
        });
    </script>
@endpush
