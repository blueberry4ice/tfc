<div class="container-default container-search-detail">

    @livewire('header3-component')

    <section class="bg-wrapper-detail">
        <div class="hero-image-wrapper" style="background-image: url('{{asset('storage/product_image/'.$product->image)}}')">
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
                <div class="section-title">
                    @if ($category==7)
                    Buy from your favorite Travel Agent
                    @else
                    Book from your favorite Travel Agent
                    @endif</div>
            </div>
            <div class="fav-agent-wrapper">
                <div class="clearfix favagent-inner-container">
                    @foreach ( $agents as $agent )
                    <a href="{{$agent->url}}" target="_blank" title="{{$agent->name}}">
                        <div class="fav-agent-list bordered-box">
                            <div class="fav-list">
                                <img src="{{asset('storage/agent/'.$agent->thumbnail)}}" alt="{{$agent->name}}">
                            </div>
                        </div>
                    </a>
                    @endforeach
                    @if ($category==7)
                    <a href="https://go.daisi.id/1o9Ev0MDEA" target="_blank" title="Sompo">
                        <div class="fav-agent-list bordered-box">
                            <div class="fav-list">
                                <img src="{{asset('storage/agent/19. SOMPO.png')}}" alt="SOMPO">
                            </div>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @livewire('footer-component')

</div>