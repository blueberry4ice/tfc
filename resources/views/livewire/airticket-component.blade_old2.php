    <div class="container-default container-search">
        @livewire('header2-component')

        <section class="search-wrapper" style="min-height: 60vh">
            <div class="clearfix inner-container">
                <div class="pull-left left-search">

                    <div class="filter-wrapper bordered-box">
                        <div class="bold fz20 mb1">Travel Agent</div>
                        <div class="bold fz20 mb1">
                            <select wire:model="byAgent" class="form-control">
                                <option value="">No Selected</option>
                                {{-- <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option> --}}
                                @foreach ($agents as $agent)
                                    <option value="{{$agent->id}}">{{$agent->name}}</option>
                                @endforeach
                            </select>
                        </div>




                        <h5 class="widget-title">Price <span class="text-info">IDR {{$min_price}} - IDR {{$max_price}}
                                </h2>
                                <div id="slider" wire:ignore>

                                </div>
                    </div>
                </div>
                <div class="pull-left right-search">
                    <div class="search-title">Search Result</div>
                    <div class="flex-wrap layout-flex">
                        @foreach ( $airtickets as $airticket )
                        <div class="flex-three card-wrapper c-pointer bordered-box"
                            onclick="location.href='{{route('airticket.detail',['airticketid'=>$airticket->id])}}'">
                            <div class="image-portrait-wrapper">
                                <div class="image-portrait"
                                    style="background-image: url('assets/img/{{$airticket->thumbnail}}')"></div>
                            </div>
                            <div class="card-content-wrapper">
                                <div class="bold fz20 content-title mb1">{{$airticket->name}}</div>
                                <div class="content-description fz14 mb20px truncate-list" data-height="80">
                                    {{$airticket->summary}}</div>
                                <div class="content-starting fz12">Start from</div>
                                <div class="content-price mb1 bold fz18">IDR <span
                                        class="format-idr">{{$airticket->price}}</span></div>
                                <div class="text-center">
                                    <a href="{{route('airticket.detail',['airticketid'=>$airticket->id])}}"
                                        class="btnAstindo btnAstindo-default">Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="clearfix pagination-wrapper">
                        <div class="pull-right pr1">
                            {{$airtickets->links('livewire.pagination-component')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @livewire('footer-component')

    </div>


@push('scripts')
<script>
    var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start : [1,1000000],
            connect : true,
            range : {
                'min' : 1,
                'max' : 1000000
            },
            pip : {
                mode : 'steps',
                stepped : true,
                density : 4
            }
        });

        slider.noUiSlider.on('update', function(value){
            @this.set('min_price',value[0]);
            @this.set('max_price',value[1]);
        })
</script>
@endpush
