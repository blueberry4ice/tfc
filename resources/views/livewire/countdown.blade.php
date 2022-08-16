<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name');}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo-astindo.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ball-spin-clockwise-fade-rotating.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/line-scale.css') }}">



    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}"
        integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css"
        integrity="sha512-KRrxEp/6rgIme11XXeYvYRYY/x6XPGwk0RsIC6PyMRc072vj2tcjBzFmn939xzjeDhj0aDO7TDMd7Rbz3OEuBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-J9PJN6Q50R"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-J9PJN6Q50R');
    </script>

    @livewireStyles
</head>

<body>

    <div class="main-container">

        <div class="container-default container-home">

            <!-- /header -->
            <header id="header" class="header">
                <div class="clearfix inner-container">
                    <div class="pull-left header-logo-wrapper" style="padding: 20px 0">
                        <a href="/">
                            <img src="{{ asset('assets/img/logo-astindo-white.png') }}" alt="logo-color" style="max-width: 50px">
                        </a>
                        <a href="http://dephub.go.id/" target="_blank">
                            <img src="{{ asset('assets/img/kemenhub.png') }}" alt="" style="max-width: 50px;">
                        </a>
                        <a href="https://www.indonesia.travel/id/id/home" target="_blank">
                            <img src="{{ asset('assets/img/wonderful.png') }}" alt="" style="max-width: 80px;margin: 0;
                                        top: 50%;
                                        left: 50%;">
                        </a>
                        <a href="https://www.kemenparekraf.go.id/" target="_blank">
                            <img src="{{ asset('assets/img/baparekraf.png') }}" alt="" style="max-width: 50px">
                        </a>
                    </div>
                </div>
            </header>

            <div class="pre-event-wrapper">
                <div class="pre-event-slider">
                    <div class="image-list" style="background-image: url('assets/img/home.png')"></div>
                </div>
                <div class="inner-container text-center">
                    <div class="main-caption">ASTINDO VIRTUAL <br> TRAVEL FAIR 2022</div>
                    <div class="inner-inner-container">
                        <div class="layout-flex layout-timer">
                            <div class="timer-wrapper">
                                <div>DAYS</div>
                                <div class="timer-box">
                                    <div id="days"></div>
                                </div>
                            </div>
                            <div class="timer-wrapper">
                                <div>HOURS</div>
                                <div class="timer-box">
                                    <div id="hours"></div>
                                </div>
                            </div>
                            <div class="timer-wrapper">
                                <div>MINUTES</div>
                                <div class="timer-box">
                                    <div id="minutes"></div>
                                </div>
                            </div>
                            <div class="timer-wrapper">
                                <div>SECONDS</div>
                                <div class="timer-box">
                                    <div id="seconds"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="layout-flex" style="flex-wrap: wrap;">
                        <div class="card-box-wrapper">
                            <div class="card-box">
                                <div class="card-box-image-wrapper">
                                    <div class="card-box-image" style="background-image: url('img/bg-home02.jpg')"></div>
                                </div>
                                <div class="card-box-detail">
                                    <div class="card-box-content">
                                        <div class="card-box-detail-title">Headline</div>
                                        <p class="card-box-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btnAstindo btnAstindo-darkblue">Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-box-wrapper">
                            <div class="card-box">
                                <div class="card-box-image-wrapper">
                                    <div class="card-box-image" style="background-image: url('img/bg-home03.jpg')"></div>
                                </div>
                                <div class="card-box-detail">
                                    <div class="card-box-content">
                                        <div class="card-box-detail-title">Headline</div>
                                        <p class="card-box-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btnAstindo btnAstindo-darkblue">Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-box-wrapper">
                            <div class="card-box">
                                <div class="card-box-image-wrapper">
                                    <div class="card-box-image" style="background-image: url('img/bg-home04.jpg')"></div>
                                </div>
                                <div class="card-box-detail">
                                    <div class="card-box-content">
                                        <div class="card-box-detail-title">Headline</div>
                                        <p class="card-box-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btnAstindo btnAstindo-darkblue">Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-box-wrapper">
                            <div class="card-box">
                                <div class="card-box-image-wrapper">
                                    <div class="card-box-image" style="background-image: url('img/bg-home05.jpg')"></div>
                                </div>
                                <div class="card-box-detail">
                                    <div class="card-box-content">
                                        <div class="card-box-detail-title">Headline Headline</div>
                                        <p class="card-box-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btnAstindo btnAstindo-darkblue">Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>

            <!-- footer -->
            @livewire('footer-component')

        </div>

    </div>

    {{-- <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/wNumb.js') }}"></script>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"
        integrity="sha512-ZKqmaRVpwWCw7S7mEjC89jDdWRD/oMS0mlfH96mO0u3wrPYoN+lXmqvyptH4P9mY6zkoPTSy5U2SwKVXRY5tYQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"
        integrity="sha512-EnXkkBUGl2gBm/EIZEgwWpQNavsnBbeMtjklwAa7jLj60mJk932aqzXFmdPKCG6ge/i8iOCK0Uwl1Qp+S0zowg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script>
            // countdown
            function makeTimer() {

                //      var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");  
                var endTime = new Date("16 August 2022 18:00:00");         
                endTime = (Date.parse(endTime) / 1000);

                var now = new Date();
                now = (Date.parse(now) / 1000);

                var timeLeft = endTime - now;

                var days = Math.floor(timeLeft / 86400); 
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                if (hours < "10") { hours = "0" + hours; }
                if (minutes < "10") { minutes = "0" + minutes; }
                if (seconds < "10") { seconds = "0" + seconds; }

                $("#days").html(days);
                $("#hours").html(hours);
                $("#minutes").html(minutes);
                $("#seconds").html(seconds);

                if($('.layout-book').length <= 0){
                    if((days == 0 && hours == 0 && minutes == 0 && seconds == 0) || (days < 0)) {
                        location.reload();
                    }
                }
            }

            setInterval(function() { makeTimer(); }, 1000);
        </script>


    @livewireScripts

    @stack('scripts')

    

</body>

</html>
