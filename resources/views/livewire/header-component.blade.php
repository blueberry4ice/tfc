<header id="header" class="header">
    <div class="clearfix inner-container">
        <div class="pull-left header-logo-wrapper">
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
