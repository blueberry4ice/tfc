<div class="container-default container-search-detail">

    @livewire('header-component')

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

    @livewire('footer-component')
</div>
