<div class="container-default container-search-detail">

    <!-- /header -->
    <header id="header" class="header">
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


    <section class="bg-wrapper-detail">
        <div class="hero-image-wrapper" style="background-image: url({{ asset('assets/img/bg-home09.jpg')}})">
            <div class="caption-wrapper-detail">
                <div class="inner-container">
                    <div class="layout-flex space-between align-center">
                        <div class="product-detail-caption">
                            <div class="white fz42 bold">{{$tourpackage->name}}</div>
                        </div>
                        <div>
                            <a href="{{route('agenttourpackage.pick',['productid'=>$tourpackage->id])}}"
                                class="btnAstindo btnAstindo-default">Book Now!</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="content-wrapper">
        <div class="inner-container">
            <div class="layout-flex space-between" style="margin-bottom: 50px;">
                <div class="card-wrapper card-three-column bordered-box">
                    <div class="text-center card-title">
                        <div class="bold fz24">Travel Summary</div>
                    </div>
                    <div class="mb1">{{$tourpackage->summary}}</div>

                </div>
                <div class="card-wrapper card-three-column bordered-box">
                    <div class="text-center card-title">
                        <div class="bold fz24">Travel Route</div>
                    </div>
                    @foreach ($routes as $route)
                    <div class="bold">Hari {{$route->sr}}</div>
                    <div class="mb1">{{$route->from}}</div>
                    @endforeach
                </div>
                <div class="card-wrapper card-three-column bordered-box">
                    <div class="text-center card-title">
                        <div class="bold fz24">Tour Price</div>
                    </div>
                    <div class="bold mb1">Adult</div>
                    <div class="layout-flex space-between mb1">
                        <div>Twin Sharing</div>
                        <div>IDR 12.588.000</div>
                    </div>
                    <div class="layout-flex space-between mb1">
                        <div>Single</div>
                        <div>IDR 12.588.000</div>
                    </div>
                    <div class="bold mb1">Adult</div>
                    <div class="layout-flex space-between mb1">
                        <div>Twin Sharing</div>
                        <div>IDR 12.588.000</div>
                    </div>
                    <div class="layout-flex space-between mb1">
                        <div>Single</div>
                        <div>IDR 12.588.000</div>
                    </div>
                </div>
            </div>
            <div class="bordered-box itinerary-box mb2">
                <div class="bold fz24 mb1">Itinerary</div>
                @foreach ($itineraries as $itinerary)
                <div class="clearfix itinerary-list">
                    <div class="pull-left w20">&nbsp;</div>
                    <div class="pull-left w80">
                        <div class="fz20 bold mb10px">{{$itinerary->from}}</div>
                        <div class="italic fz12 mb10px">{{$itinerary->date}}</div>
                        <p>{{$itinerary->desc}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{route('agenttourpackage.pick',['productid'=>$tourpackage->id])}}"
                    class="btnAstindo btnAstindo-default">Book Now!</a>
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