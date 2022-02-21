<div class="container-default container-search-detail">

    @livewire('header-component')

    <section class="bg-wrapper-detail">
        <div class="hero-image-wrapper" style="background-image: url({{asset('assets/img/bg-home07.jpg')}})">
            <div class="caption-wrapper-detail">
                <div class="inner-container">
                    <div class="layout-flex space-between align-center">
                        <div class="product-detail-caption">
                            <div class="white bold">{{$product->name}}</div>
                        </div>
                        {{-- <div>
                            <a href="#" class="btnAstindo btnAstindo-default">Book Now!</a>
                        </div> --}}
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrapper">
        <div class="inner-container">
            <div class="text-center">
                <div class="section-title">Book from your favorite Travel Agent</div>
            </div>
            <div class="fav-agent-wrapper">
                <div class="favagent-inner-container clearfix">
                    @foreach ( $agents as $agent )
                    <a href="{{$agent->url}}" target="_blank" title="{{$agent->name}}">
                        <div class="fav-agent-list bordered-box">
                            <div class="fav-list">
                                <img src="/assets/img/agent/{{$agent->thumbnail}}" alt="{{$agent->name}}">
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