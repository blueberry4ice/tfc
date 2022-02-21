<div class="container-default container-search">

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
                    <div class="bold filter-title">Category</div>
                    <div class="filter-group">
                        @foreach ($categories as $category)
                        <div class="custom-checkbox2">
                            {{-- <input type="checkbox" id="checkbox1" class="js-option-filter"> --}}
                            <input type="checkbox" id="checkbox{{$category->id}}" class="js-option-filter"
                                name="agent[]" value={{$category->id}} wire:model="listcategory.{{$category->id}}">
                            <label for="checkbox{{$category->id}}" class="semibold">
                                <span></span> {{$category->name}}
                            </label>
                        </div>
                        @endforeach

                    </div>
                    <div class="bold filter-title">Travel Agent</div>
                    <div class="filter-group filter-agent">
                        <div class="hidden-group">
                            @foreach ($agents as $agent)
                            <input type="checkbox" data-checkbox="{{$agent->name}}" class="js-hidden-checkbox">
                            @endforeach
                        </div>
                        <div class="form-group">
                            <select name="" class="input-agent-mobile form-control">
                                @foreach ($agents as $agent)
                                <option value="{{$agent->id}}">$agent</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-agent js-filter-agent">Choose your favorite travel agent</div>
                        <ul class="custom-list"></ul>
                        <div class="wrapper-filter-agent">
                            <ul class="grid">
                                @foreach ($agents as $agent)
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
                        @foreach ($months as $month)
                        <div class="custom-checkbox2">
                            <input type="checkbox" id="checkbox{{$month->id}}{{$month->name}}" class="js-option-filter">
                            <label for="checkbox{{$month->id}}{{$month->name}}" class="semibold">
                                <span></span> {{$month->name}}
                            </label>
                        </div>
                        @endforeach


                    </div>
                    <div class="bold filter-title">Destination</div>
                    <div class="filter-group filter-destination">
                        <div class="region-wrapper">
                            <div class="region-name">Asia</div>
                            <div class="region-list">
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox20" class="js-option-filter">
                                    <label for="checkbox20" class="semibold">
                                        <span></span> Singapore
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox21" class="js-option-filter">
                                    <label for="checkbox21" class="semibold">
                                        <span></span> Hongkong
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox22" class="js-option-filter">
                                    <label for="checkbox22" class="semibold">
                                        <span></span> Japan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="region-wrapper">
                            <div class="region-name">Australia</div>
                            <div class="region-list">
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox23" class="js-option-filter">
                                    <label for="checkbox23" class="semibold">
                                        <span></span> Australia
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox24" class="js-option-filter">
                                    <label for="checkbox24" class="semibold">
                                        <span></span> New Zealand
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="region-wrapper">
                            <div class="region-name">Europe</div>
                            <div class="region-list">
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox25" class="js-option-filter">
                                    <label for="checkbox25" class="semibold">
                                        <span></span> Europe 1
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox26" class="js-option-filter">
                                    <label for="checkbox26" class="semibold">
                                        <span></span> Europe 2
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox27" class="js-option-filter">
                                    <label for="checkbox27" class="semibold">
                                        <span></span> Europe 3
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox28" class="js-option-filter">
                                    <label for="checkbox28" class="semibold">
                                        <span></span> Europe 4
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox29" class="js-option-filter">
                                    <label for="checkbox29" class="semibold">
                                        <span></span> Europe 5
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox30" class="js-option-filter">
                                    <label for="checkbox30" class="semibold">
                                        <span></span> Europe 6
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="region-wrapper">
                            <div class="region-name">Africa</div>
                            <div class="region-list">
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox31" class="js-option-filter">
                                    <label for="checkbox31" class="semibold">
                                        <span></span> Africa 1
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox32" class="js-option-filter">
                                    <label for="checkbox32" class="semibold">
                                        <span></span> Africa 2
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="region-wrapper">
                            <div class="region-name">North America</div>
                            <div class="region-list">
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox33" class="js-option-filter">
                                    <label for="checkbox33" class="semibold">
                                        <span></span> North America 1
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox34" class="js-option-filter">
                                    <label for="checkbox34" class="semibold">
                                        <span></span> North America 2
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="region-wrapper">
                            <div class="region-name">South America</div>
                            <div class="region-list">
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox35" class="js-option-filter">
                                    <label for="checkbox35" class="semibold">
                                        <span></span> South America 1
                                    </label>
                                </div>
                                <div class="custom-checkbox2">
                                    <input type="checkbox" id="checkbox36" class="js-option-filter">
                                    <label for="checkbox36" class="semibold">
                                        <span></span> South America 2
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bold filter-title">Price Range <span>(IN IDR)</span></div>
                    <div class="filter-group filter-price">
                        <div class="range-slider__slider">
                            <div class="range">
                                <form oninput="output.value = Math.round(range.valueAsNumber)">
                                    <input name="range" type="range" min="0" max="100000000" class="range-input">
                                    <div class="range-output">
                                        <output class="output" name="output" for="range">
                                            50.000.000
                                        </output>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="price-range min-price">0</div>
                        <div class="price-range max-price">100.000.000</div>
                    </div>
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
                    <div class="flex-three card-wrapper c-pointer bordered-box"
                        onclick="location.href='{{ route('airticket.detail', ['airticketid' => $product->id]) }}'">

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
                                <a href="{{ route('airticket.detail', ['airticketid' => $product->id]) }}"
                                    class="btnAstindo btnAstindo-default">Read more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="clearfix pagination-wrapper">
                    <div class="pull-right pr1">
                        <div class="inline fz24 c-pointer">
                            <i class="blue fa fa-caret-left"></i>
                        </div>
                        <div class="inline fz12 text-center" style="width: 130px">Page 1 of 12</div>
                        <div class="inline fz24 c-pointer">
                            <i class="blue fa fa-caret-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @livewire('footer-component')

</div>

@push('scripts')
<script>
    new RangeInput(document.querySelector('.range'));
</script>
@endpush