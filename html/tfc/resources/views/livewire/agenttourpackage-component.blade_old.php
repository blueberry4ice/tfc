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
        <div class="hero-image-wrapper" style="background-image: url({{ asset('assets/img/bg-home07.jpg')}})">
            <div class="caption-wrapper-detail">
                <div class="inner-container">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="white fz42 bold">{{$product->name}}</div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="fav-agent">


        <div class="inner-container">
            <div class="text-center">
                <div class="section-title">Book from your favorite Travel Agent</div>
            </div>
            <div class="fav-agent-wrapper">
                <div class="favagent-inner-container clearfix">
                    @foreach ( $agents as $agent )
                    <a href="{{$agent->url}}" target="_blank" title="">
                        <div class="fav-agent-list">
                            <div class="fav-list">
                                <img src="/assets/img/agent/{{$agent->thumbnail}}" alt="">
                            </div>
                        </div>
                    </a>
                    @endforeach


                </div>
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