<div class="container-default container-search-detail">

    <!-- overlay -->
    <div class="overlay-wrapper-home">

    </div>

    @livewire('header-component')

    <section class="bg-wrapper-detail">
        <div class="hero-image-wrapper" style="background-image: url({{ asset('assets/img/bg-home09.jpg')}} )">
            <div class="caption-wrapper-detail">
                <div class="inner-container">
                    <div class="layout-flex space-between align-center">
                        <div class="product-detail-caption">
                            <div class="white bold">{{$tourpackage->name}}</div>
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

    @livewire('footer-component')

</div>