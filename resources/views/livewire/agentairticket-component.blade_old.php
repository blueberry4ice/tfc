<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Tour Package</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                {{-- <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{ asset ('assets/images/shop-banner.jpg') }}" alt=""></figure>
                    </a>
                </div> --}}

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Tour Package</h1>



                </div><!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach ( $agents as $agent )
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{$agent->url}}" title="{{$agent->name}}">
                                        <figure><img src="{{ asset ('assets/images/products/digital_20.jpg') }}" alt="{{$agent->name}}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{$agent->url}}" class="product-name"><span>{{$agent->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    <a href="{{$agent->url}}" class="btn add-to-cart">Book Now</a>
                                </div>
                            </div>
                        </li>

                        @endforeach



                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{$agents->links()}}
                    {{-- <ul class="page-numbers">
                        <li><span class="page-number-item current" >1</span></li>
                        <li><a class="page-number-item" href="#" >2</a></li>
                        <li><a class="page-number-item" href="#" >3</a></li>
                        <li><a class="page-number-item next-link" href="#" >Next</a></li>
                    </ul>
                    <p class="result-count">Showing 1-8 of 12 result</p> --}}
                </div>
            </div><!--end main products area-->



        </div><!--end row-->

    </div><!--end container-->

</main>
