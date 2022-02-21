

<div class="container-default container-home">
    @livewire('header-component')

    <section class="bg-wrapper-home">

        <div class="hero-slider-wrapper">
            <div class="hero-slider-list" style="background-image: url('assets/img/bg-home01.jpg')"></div>
            <div class="hero-slider-list" style="background-image: url('assets/img/bg-home02.jpg')"></div>
            <div class="hero-slider-list" style="background-image: url('assets/img/bg-home03.jpg')"></div>
        </div>

        <div class="inner-container">
            <div class="caption-home">
                <h1>Where are you travelling next?</h1>
            </div>
        </div>

        <div class="search-form bg-white">
            <form action="{{ route('product.search') }}" method="GET" id="form-search-product" name="form-search-product">
                <div class="clearfix">
                    <div class="pull-left w70">
                        <div>

                            <div class="form-group input-wrapper-autocomplete inline">
                                <input type="text" name="destination"
                                    class="form-control js-autocomplete ui-autocomplete-input"
                                    placeholder="Destination">
                                <div class="flight-popular-box">
                                    <h6 class="bold mb0">Destinasi Populer</h6>
                                    <ul>
                                        <li>
                                            <div class="popular-list js-pick-popular" data-type="departure"
                                                data-value="Bali / Denpasar">Bali / Denpasar</div>
                                            <div class="popular-list js-pick-popular" data-type="departure"
                                                data-value="Jakarta">Jakarta</div>
                                            <div class="popular-list js-pick-popular" data-type="departure"
                                                data-value="Makassar">Makassar</div>
                                            <div class="popular-list js-pick-popular" data-type="departure"
                                                data-value="Medan">Medan</div>
                                            <div class="popular-list js-pick-popular" data-type="departure"
                                                data-value="Surabaya">Surabaya</div>
                                            <div class="popular-list js-pick-popular" data-type="departure"
                                                data-value="Yogyakarta">Yogyakarta</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="inline">

                                <div class="custom-dropdown js-custom-dropdown">
                                    <input type="text" name="agent" class="hidden-input-agent">
                                    <div class="result-dropdown">Travel Agent</div>
                                    <div class="logo-agent">
                                        <img src="">
                                    </div>
                                    <div class="dropdown-list-wrapper">
                                        <div class="search-agent-wrapper">
                                            <input class="search-agent-input" type=""
                                                placeholder="search agent">
                                            <svg id="Capa_1" enable-background="new 0 0 515.558 515.558"
                                                viewBox="0 0 515.558 515.558" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m378.344 332.78c25.37-34.645 40.545-77.2 40.545-123.333 0-115.484-93.961-209.445-209.445-209.445s-209.444 93.961-209.444 209.445 93.961 209.445 209.445 209.445c46.133 0 88.692-15.177 123.337-40.547l137.212 137.212 45.564-45.564c0-.001-137.214-137.213-137.214-137.213zm-168.899 21.667c-79.958 0-145-65.042-145-145s65.042-145 145-145 145 65.042 145 145-65.043 145-145 145z" />
                                            </svg>
                                        </div>

                                        <ul class="grid">


                                            @foreach ($agents as $agent)
                                            <li class="grid-item" data-agent={{$agent->name}}
                                                >
                                                <a href="#" class="grid-link">
                                                    <img src="assets/img/agent/{{$agent->thumbnail}}" class="grid-img">
                                                    <h3>{{$agent->name}}</h3>
                                                </a>
                                            </li>
                                            @endforeach


                                        </ul>
                                        <div class="vertical-absolute no-agent">No Travel Agent found.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="range-slider__slider">
                            <div class="inline gray fz20">0</div>
                            <div class="range inline">
                                <form oninput="output.value = Math.round(range.valueAsNumber)">
                                    <input name="range" type="range" min="0" max="1000000" class="range-input">
                                    <div class="range-output">
                                        <output class="output" name="output" for="range">
                                            500.000
                                        </output>
                                    </div>
                                </form>
                            </div>
                            <div class="inline gray fz20">1.000.000</div>
                            <div class="text-center" style="margin-top: 10px;">
                                <div class="fz12">Price Range (In IDR)</div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-left w30">
                        <div class="box-searchform-btn">
                            <button form="form-search-product" type="submit"
                                class="btnAstindo btnAstindo-default">Search
                                {{-- <a href="search-tour.html" class="btnAstindo btnAstindo-default" type="submit">Search</a> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>

    <!-- favorite destination -->
    <section class="fav-destination">
        <div class="inner-container">
            <div class="text-center">
                <div class="section-title">Favorite Destination</div>
            </div>
            <div class="fav-slider-wrapper">
                <div class="fav-inner-container">
                    @foreach ($favdests as $favdest)
                    <div class="fav-des-list" onclick="location.href='/search?destination={{$favdest['name']}}';">
                        <div class="fav-list bordered-box"  >
                            <div class="image-portrait-wrapper" >
                                <div class="image-portrait" style="background-image: url('assets/img/{{$favdest['thumbnail']}}')">
                                </div>
                            </div>
                            <div class="fav-text fz20">{{$favdest['name']}}</div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="arrow-fav-wrapper">
                    <i class="fa fa-caret-left arrow-fav left-arrow"></i>
                    <i class="fa fa-caret-left arrow-fav right-arrow"></i>
                </div>
            </div>
        </div>
    </section>



    <!-- favorite agent -->
    <section class="fav-agent">
        <div class="inner-container">
            <div class="text-center">
                <div class="section-title">Find your favorite Travel Agent</div>
            </div>
            <div class="fav-agent-wrapper">
                <div class="favagent-inner-container clearfix">
                    @foreach ( $agents as $agent )
                    <a href="{{$agent->url}}" target="_blank" title="">
                        <div class="fav-agent-list">
                            <div class="fav-list">
                                <img src="assets/img/agent/{{$agent->thumbnail}}" alt="">
                            </div>
                        </div>
                    </a>
                    @endforeach


                </div>
            </div>
        </div>
    </section>

    <!-- travelling tips -->
    <section class="travelling-tips">
        <div class="inner-container">
            <div class="text-center">
                <div class="section-title">Travelling Tips</div>
            </div>
            <div class="layout-flex space-between flex-wrap">
                <div class="flex-two tips-list bordered-box">
                    <div class="clearfix">
                        <div class="pull-left w40 tips-left">
                            <div class="tips-left-image" style="background-image: url('assets/img/bg-home01.jpg')">
                            </div>
                        </div>
                        <div class="pull-left w60 tips-right">
                            <div class="tips-title">Lorem Ipsum Dolor sit amet</div>
                            <div class="tip-desc truncate-list" data-height="80">is simply dummy text of the printing
                                and
                                typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since
                                the
                                1500s, when an unknown printer took a galley. when an unknown printer took a galley.
                                when an
                                unknown printer took a galley</div>
                        </div>
                    </div>
                </div>
                <div class="flex-two tips-list bordered-box">
                    <div class="clearfix">
                        <div class="pull-left w40 tips-left">
                            <div class="tips-left-image" style="background-image: url('assets/img/bg-home02.jpg')">
                            </div>
                        </div>
                        <div class="pull-left w60 tips-right">
                            <div class="tips-title">Lorem Ipsum Dolor sit amet</div>
                            <div class="tip-desc truncate-list" data-height="80">is simply dummy text of the printing
                                and
                                typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since
                                the
                                1500s, when an unknown printer took a galley. when an unknown printer took a galley.
                                when an
                                unknown printer took a galley</div>
                        </div>
                    </div>
                </div>
                <div class="flex-two tips-list bordered-box">
                    <div class="clearfix">
                        <div class="pull-left w40 tips-left">
                            <div class="tips-left-image" style="background-image: url('assets/img/bg-home03.jpg')">
                            </div>
                        </div>
                        <div class="pull-left w60 tips-right">
                            <div class="tips-title">Lorem Ipsum Dolor sit amet</div>
                            <div class="tip-desc truncate-list" data-height="80">is simply dummy text of the printing
                                and
                                typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since
                                the
                                1500s, when an unknown printer took a galley. when an unknown printer took a galley.
                                when an
                                unknown printer took a galley</div>
                        </div>
                    </div>
                </div>
                <div class="flex-two tips-list bordered-box">
                    <div class="clearfix">
                        <div class="pull-left w40 tips-left">
                            <div class="tips-left-image" style="background-image: url('assets/img/bg-home04.jpg')">
                            </div>
                        </div>
                        <div class="pull-left w60 tips-right">
                            <div class="tips-title">Lorem Ipsum Dolor sit amet</div>
                            <div class="tip-desc truncate-list" data-height="80">is simply dummy text of the printing
                                and
                                typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since
                                the
                                1500s, when an unknown printer took a galley. when an unknown printer took a galley.
                                when an
                                unknown printer took a galley</div>
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
