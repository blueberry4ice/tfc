<header id="header" class="header">
    <div class="clearfix inner-container">
        <div class="pull-left">
            <div class="logo-area">
                <a href="/">
                    <img src="{{ asset('assets/img/logo-astindo-white.png') }}" alt="logo-color">
                </a>
                {{-- <a href="/">
                    <img src="{{asset('assets/img/wonderful.png')}}" alt="logo-color">
                    </a>
                    <a href="/">
                        <img src="{{asset('assets/img/baparekraf.png')}}" alt="logo-color">
                        </a>
                        <a href="/">
                            <img src="{{asset('assets/img/kemenhub.png')}}" alt="logo-color">
                            </a> --}}
            </div>
            {{-- <div class="logo-area">

                <a href="/">
                    <img src="{{ asset('assets/img/wonderful.png') }}" alt="logo-color">
                </a>

            </div> --}}
        </div>
        <div class="pull-right menubar-wrapper">
            <div class="clearfix">
                @livewire('menu-component')
            </div>
            {{-- <div class="search-input-wrapper">
                <div class="clearfix form-group">
                    <input type="text" name="search input" class="pull-left form-control">
                    <div class="pull-left search-button">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="pull-right burger js-burger">
            <div class="burgerpadding-wrapper">
                <div class="burger-wrapper">
                    <div>
                        <div></div>
                    </div>
                    <div>
                        <div></div>
                    </div>
                    <div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('menumobile-component')
</header>
