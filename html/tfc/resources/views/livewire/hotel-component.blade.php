<div class="container-default container-search-detail">

   @livewire('header2-component')

    {{-- <section class="bg-wrapper-detail">
        <div class="hero-image-wrapper" style="background-image: url('img/bg-home07.jpg')">
            <div class="caption-wrapper-detail">
                <div class="inner-container">
                    <div class="layout-flex space-between align-center">

                    </div>

                </div>
            </div>
        </div>
    </section> --}}
    <br>
    <br>
    <br>
    <br>


    <section class="content-wrapper">
        <div class="inner-container">
            <div class="fav-agent-wrapper">
                <div class="clearfix favagent-inner-container">
                    {{-- <iframe src="http://202.129.224.203:10020/home/ati"
                        width="100%" height="500"
                        referrerpolicy="no-referrer|no-referrer-when-downgrade|origin|origin-when-cross-origin|same-origin|strict-origin-when-cross-origin|unsafe-url"></iframe> --}}
                        <iframe src="https://travos.astindovirtualtravelfair.com/home/ati"
                        width="100%" height="500"
                        referrerpolicy="no-referrer|no-referrer-when-downgrade|origin|origin-when-cross-origin|same-origin|strict-origin-when-cross-origin|unsafe-url"></iframe>
                    {{-- <iframe src="https://www.bedsonline.com/home/id-df" width="100%" height="500"
                        referrerpolicy="no-referrer|no-referrer-when-downgrade|origin|origin-when-cross-origin|same-origin|strict-origin-when-cross-origin|unsafe-url"></iframe> --}}

                </div>
            </div>
        </div>
    </section>
    <section class="content-wrapper">
        <div class="inner-container">
            <div class="text-center">
                <div class="section-title">
        
                    Book from your favorite Travel Agent
                </div>
            </div>
            <div class="fav-agent-wrapper">
                <div class="clearfix favagent-inner-container">
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
