<div class="container-default container-home">
    

    <div class="overlay-wrapper-home"></div>

    @livewire('header-component')

    <section class="bg-wrapper-home">

        <div class="hero-slider-wrapper">
            <div class="hero-slider-list" style="background-image: url('assets/img/0.jpg')"></div>
            {{-- <div class="hero-slider-list" style="background-image: url('assets/img/1.png')"></div>
            <div class="hero-slider-list" style="background-image: url('assets/img/2.png')"></div>
            <div class="hero-slider-list" style="background-image: url('assets/img/3.png')"></div>
            <div class="hero-slider-list" style="background-image: url('assets/img/4.png')"></div> --}}
        </div>

        <div class="inner-cd-container">
            <div class="main-caption">ASTINDO VIRTUAL <br> TRAVEL FAIR 2022</div>
            <div class="layout-flex layout-timer">
                <div class="timer-wrapper">
                    <div>DAYS</div>
                    <div class="timer-box">
                        <div id="days"></div>
                    </div>
                </div>
                <div class="timer-wrapper">
                    <div>HOURS</div>
                    <div class="timer-box">
                        <div id="hours"></div>
                    </div>
                </div>
                <div class="timer-wrapper">
                    <div>MINUTES</div>
                    <div class="timer-box">
                        <div id="minutes"></div>
                    </div>
                </div>
                <div class="timer-wrapper">
                    <div>SECONDS</div>
                    <div class="timer-box">
                        <div id="seconds"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="inner-container">
            <div class="caption-home">
                <h1>Where are you travelling next?</h1>
            </div>
        </div>

        <div class="bg-white search-form">
            <form action="{{ route('product.search', ['menu' => 0]) }}" method="GET" id="form-search-product"
                name="form-search-product">

                <div class="layout-flex space-between">
                    <div class="input-search">
                        <div class="bold label-input">destination</div>
                        <div class="form-group input-wrapper-autocomplete">
                            <input type="text" name="destination"
                                class="form-control js-autocomplete ui-autocomplete-input"
                                placeholder="Type your destination here">
                            <div class="flight-popular-box" wire:init="loadFavdests">
                                <h6 class="bold mb0">Destinasi Populer</h6>
                                <ul>
                                    <li>
                                        @foreach ($favdests as $favdest)
                                            <div class="popular-list js-pick-popular" data-type="departure"
                                                data-value="{{ $favdest['name'] }}">{{ $favdest['name'] }}</div>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="form-group form-group-select custom-select-destination">
                            <i class="fa fa-angle-down icon-select"></i>
                            <select class="custom-select form-control" name="mdestination">
                                <option disabled selected hidden></option>
                                {{-- @foreach ($favdests as $favdest) --}}
                                {{-- <option>{{ $favdest['name'] }}</option> --}}
                                {{-- @endforeach --}}

                            </select>
                        </div> -->
                    </div>
                    <div class="input-search">
                        <div class="bold label-input">travel agent</div>
                        <div class="custom-dropdown js-custom-dropdown">
                            <input type="text" name="agent" class="hidden-input-agent">
                            <div class="result-dropdown">Select your Agent</div>
                            <div class="logo-agent">
                                <img src="">
                            </div>
                            <div class="dropdown-list-wrapper" wire:init="loadAgents">
                                <div class="search-agent-wrapper">
                                    <input class="search-agent-input" type="" name="" placeholder="search agent">
                                    <svg id="Capa_1" enable-background="new 0 0 515.558 515.558"
                                        viewBox="0 0 515.558 515.558" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m378.344 332.78c25.37-34.645 40.545-77.2 40.545-123.333 0-115.484-93.961-209.445-209.445-209.445s-209.444 93.961-209.444 209.445 93.961 209.445 209.445 209.445c46.133 0 88.692-15.177 123.337-40.547l137.212 137.212 45.564-45.564c0-.001-137.214-137.213-137.214-137.213zm-168.899 21.667c-79.958 0-145-65.042-145-145s65.042-145 145-145 145 65.042 145 145-65.043 145-145 145z" />
                                    </svg>
                                </div>
                                <ul class="grid">
                                    @foreach ($agents as $agent)
                                        <li class="grid-item" data-agent={{ $agent->name }}>
                                            <a href="#" class="grid-link">
                                                <img src="{{ asset('storage/agent/'.$agent->thumbnail) }}"
                                                    class="grid-img">
                                                <h3>{{ $agent->name }}</h3>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="vertical-absolute no-agent">No Travel Agent found.</div>
                            </div>
                        </div>
                        <div class="form-group form-group-select custom-select-agent" wire:init="loadAgents">
                            <i class="fa fa-angle-down icon-select"></i>
                            <select class="custom-select form-control" name="magent">
                                <option disabled selected hidden></option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->name }}">{{ $agent->name }}</option>
                                @endforeach
                                {{-- <option>Antavaya</option>
                                <option>Avia Tour</option>
                                <option>Dwidaya</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="input-search">
                        <div class="bold label-input">departure</div>
                        <div class="form-group form-group-select">
                            <i class="fa fa-angle-down icon-select"></i>
                            <select class="custom-select form-control" name="month">
                                <option disabled selected hidden></option>
                                <option value=0>All Month</option>

                                @foreach ($months as $month)
                                    <option value='{{ $month->id }}'>{{ $month->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="pull-left w75">
                        <div class="range-slider__slider">
                            <div class="inline gray fz20">0</div>
                            <div class="inline range">
                                <form oninput="output.value = Math.round(range.valueAsNumber)">
                                    <input name="range" type="range" min="0" max="100000000" value="100000000"  class="range-input">
                                    <div class="range-output">
                                        <output class="output" name="output" for="range">
                                            100.000.000
                                        </output>
                                    </div>
                                </form>
                            </div>
                            <div class="inline gray fz20">100.000.000</div>
                            <div class="text-center" style="margin-top: 10px;">
                                <div class="fz12">PRICE RANGE (IN IDR)</div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-left w25">
                        <div class="box-searchform-btn">
                            <button form="form-search-product" type="submit"
                                class="btnAstindo btnAstindo-default">Search
                                {{-- <a href="search-tour.html" class="btnAstindo btnAstindo-default">Search</a> --}}
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
                <div class="section-title">Preferred destinations</div>
            </div>
            <div class="fav-slider-wrapper">
                <div class="fav-inner-container" wire:init="loadFavdests">
                     @foreach ($favdests as $favdest)
                        
                        <div class="fav-des-list"
                            onclick="location.href='/search/0?destination={{ $favdest['name'] }}';">
                            <div class="fav-list bordered-box">
                                <div class="image-portrait-wrapper">
                                    <div class="image-portrait"
                                        style="background-image: url('assets/img/{{ $favdest['thumbnail'] }}')">
                                    </div>
                                </div>
                                <div class="fav-text fz20">{{ $favdest['name'] }}</div>
                            </div>
                        </div>
                    @endforeach 
                    {{-- <div class="fav-des-list" onclick="location.href='/search/0?destination=Dubai';">
                        <div class="fav-list bordered-box">
                            <div class="image-portrait-wrapper">
                                <div class="image-portrait" style="background-image: url('assets/img/Dubai.png')"></div>
                            </div>
                            <div class="fav-text fz20">Dubai</div>
                        </div>
                    </div>
                    <div class="fav-des-list" onclick="location.href='/search/0?destination=Thailand';">
                        <div class="fav-list bordered-box">
                            <div class="image-portrait-wrapper">
                                <div class="image-portrait" style="background-image: url('assets/img/Phuket.png')"></div>
                            </div>
                            <div class="fav-text fz20">Thailand</div>
                        </div>
                    </div> --}}
                {{-- </div> --}}
                {{-- <div class="arrow-fav-wrapper">
                    <i class="fa fa-caret-left arrow-fav left-arrow"></i>
                    <i class="fa fa-caret-left arrow-fav right-arrow"></i>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- favorite agent -->
    <section class="fav-agent">
        <div class="inner-container">
            <div class="text-center">
                <div class="section-title">Chat to your favorite Travel Agent</div>
            </div>
            <div class="fav-agent-wrapper" wire:init="loadAgents">
                <div  class="clearfix favagent-inner-container">
                    @foreach ($agents as $agent)
                    @if ($agent->url)
                    <a href="{{ $agent->url }}" target="_blank" title="">
                        <div class="fav-agent-list">
                            <div class="fav-list">
                                <img src="{{ asset('storage/agent/'.$agent->thumbnail) }}" alt="">
                            </div>
                        </div>
                    </a>
                    @else
                    <a title="">
                        <div class="fav-agent-list">
                            <div class="fav-list">
                                <img src="{{ asset('storage/agent/'.$agent->thumbnail) }}" alt="">
                            </div>
                        </div>
                    </a>
                    @endif
                        
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- travelling tips -->
    <section class="travelling-tips">
        <div class="inner-container">
            <div class="text-center">
                <div class="section-title">Explore More</div>
            </div>
            <div class="flex-wrap layout-flex space-between">
                <a target="_blank" href="https://www.iatatravelcentre.com/world.php" title="" class="flex-two">
                    <div class="tips-list bordered-box">
                        <div class="clearfix">
                            <div class="pull-left w40 tips-left">
                                <div class="tips-left-image" style="background-image: url('assets/img/iata.png')">
                                </div>
                            </div>
                            <div class="pull-left w60 tips-right">
                                <div class="tips-title">COVID-19 Travel Regulations Map </div>
                                <div class="tip-desc truncate-list" data-height="80">The Timatic interactive world map
                                    is designed to guide you through the process of identifying requirements and is made
                                    available to you for information purposes ...
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a target="_blank" href="https://www.indonesia.travel/gb/en/home" title="" class="flex-two">
                    <div class="tips-list bordered-box">
                        <div class="clearfix">
                            <div class="pull-left w40 tips-left">
                                <div class="tips-left-image" style="background-image: url('assets/img/wi.png')">
                                </div>
                            </div>
                            <div class="pull-left w60 tips-right">
                                <div class="tips-title">Wonderful Indonesia</div>
                                <div class="tip-desc truncate-list" data-height="80">Catch a glimpse of Indonesia's
                                    bewitching attractions without having to put on your shoes and discover the ultimate
                                    destination that matches your soul.
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a target="_blank" href="http://www.visitdubai.com/" title="" class="flex-two">
                    <div class="tips-list bordered-box">
                        <div class="clearfix">
                            <div class="pull-left w40 tips-left">
                                <div class="tips-left-image" style="background-image: url('assets/img/dubai.jpeg')">
                                </div>
                            </div>
                            <div class="pull-left w60 tips-right">
                                <div class="tips-title">Dubai Tourism</div>
                                <div class="tip-desc truncate-list" data-height="80">Welcome to Dubai - where anything is possible
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a target="_blank" href="https://www.visitkorea.or.id/" title="" class="flex-two">
                    <div class="tips-list bordered-box">
                        <div class="clearfix">
                            <div class="pull-left w40 tips-left">
                                <div class="tips-left-image" style="background-image: url('assets/img/korea.jpg')">
                                </div>
                            </div>
                            <div class="pull-left w60 tips-right">
                                <div class="tips-title">Korea Tourism Organization</div>
                                <div class="tip-desc truncate-list" data-height="80">#SaatnyaKeKoreaLagi #TraveltoKoreaBeginsAgain
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a target="_blank" href="https://taiwantourism.id/" title="" class="flex-two">
                    <div class="tips-list bordered-box">
                        <div class="clearfix">
                            <div class="pull-left w40 tips-left">
                                <div class="tips-left-image" style="background-image: url('assets/img/taiwan.jpeg')">
                                </div>
                            </div>
                            <div class="pull-left w60 tips-right">
                                <div class="tips-title">Taiwan Tourism</div>
                                <div class="tip-desc truncate-list" data-height="80">Time for Taiwan. Taiwan The Heart of Asia
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a target="_blank" href="https://www.wisatathailand.id" title="" class="flex-two">
                    <div class="tips-list bordered-box">
                        <div class="clearfix">
                            <div class="pull-left w40 tips-left">
                                <div class="tips-left-image" style="background-image: url('assets/img/thai.jpeg')">
                                </div>
                            </div>
                            <div class="pull-left w60 tips-right">
                                <div class="tips-title">Tourism Authority of Thailand</div>
                                <div class="tip-desc truncate-list" data-height="80">#keThailandAja
                                    #ThailandEdisiBaru
                                    #AmazingThailandAmazingNewChapter
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a target="_blank" href="http://www.wisatafilipina.com" title="" class="flex-two">
                    <div class="tips-list bordered-box">
                        <div class="clearfix">
                            <div class="pull-left w40 tips-left">
                                <div class="tips-left-image" style="background-image: url('assets/img/philipines.png')">
                                </div>
                            </div>
                            <div class="pull-left w60 tips-right">
                                <div class="tips-title">Philipines Department of Tourism</div>
                                <div class="tip-desc truncate-list" data-height="80">Mabuhay! From scenic beaches and landscapes to gastronomics feasts, the 7,641 islands of the Philippines welcome you to be experience the many wonders of the country.
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a target="_blank" href="https://www.japan.travel/id/id/" title="" class="flex-two">
                    <div class="tips-list bordered-box">
                        <div class="clearfix">
                            <div class="pull-left w40 tips-left">
                                <div class="tips-left-image" style="background-image: url('assets/img/japan.png')">
                                </div>
                            </div>
                            <div class="pull-left w60 tips-right">
                                <div class="tips-title">Japan National Tourism Organization</div>
                                <div class="tip-desc truncate-list" data-height="80">Temukan Passionmu, Nikmati Pengalaman Tak Terlupakan di Jepang. Dapatkan ragam informasi destinasi wisata menarik di Jepang
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    @livewire('footer-component')

</div>

@push('scripts')
    <script>
        const myTimeout = setTimeout(rangeSlider, 1000);

        function rangeSlider() {
          new RangeInput(document.querySelector('.range'));
        }
    </script>
    <script>
        // countdown
        function makeTimer() {

            //      var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");  
            var endTime = new Date("1 September 2022 00:00:00");         
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400); 
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") { hours = "0" + hours; }
            if (minutes < "10") { minutes = "0" + minutes; }
            if (seconds < "10") { seconds = "0" + seconds; }

            $("#days").html(days);
            $("#hours").html(hours);
            $("#minutes").html(minutes);
            $("#seconds").html(seconds);

            if($('.layout-book').length <= 0){
                if((days == 0 && hours == 0 && minutes == 0 && seconds == 0) || (days < 0)) {
                    $('.bg-wrapper-home').removeClass('countdown');
                    $('.inner-cd-container').remove();
                }
                else{
                    $('.bg-wrapper-home').addClass('countdown');
                    $('.inner-cd-container').show();
                }
            }
        }

        setInterval(function() { makeTimer(); }, 10);
    </script>
@endpush
