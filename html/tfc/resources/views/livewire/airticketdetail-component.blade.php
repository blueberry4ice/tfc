<div class="container-default container-search-detail">

    @livewire('header-component')

    <section class="bg-wrapper-detail">
        <div class="hero-image-wrapper" style="background-image: url({{ asset('assets/img/bg-home07.jpg')}})">
            <div class="caption-wrapper-detail">
                <div class="inner-container">
                    <div class="layout-flex space-between align-center">
                        <div class="product-detail-caption">
                            <div class="white fz42 bold">{{$airticket->name}}</div>
                        </div>
                        <div>
                            <a href="{{route('agentairticket.pick',['productid'=>$airticket->id])}}"
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
                        <div class="bold fz24">What to Expect</div>
                    </div>
                    <p>{{$airticket->summary}}</p>
                </div>
                <div class="card-wrapper card-three-column bordered-box">
                    <div class="text-center card-title">
                        <div class="bold fz24">About the Attraction</div>
                    </div>
                    <p>{{$airticket->about}}</p>
                </div>
                <div class="card-wrapper card-three-column bordered-box">
                    <div class="text-center card-title">
                        <div class="bold fz24">Details</div>
                    </div>
                    <p>{{$airticket->detail}}</p>
                </div>
            </div>
            <div class="text-center">
                <a href="{{route('agentairticket.pick',['productid'=>$airticket->id])}}"
                    class="btnAstindo btnAstindo-default">Book Now!</a>
            </div>
        </div>
    </section>

    @livewire('footer-component')
</div>
