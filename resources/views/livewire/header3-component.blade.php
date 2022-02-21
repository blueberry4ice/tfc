<header id="header" class="header header-black2">
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
            <div class="search-input-wrapper">
                <div class="clearfix form-group">
                    <form action="{{ route('product.search', ['menu' => 0]) }}" id="form-search-top"
                        name="form-search-top">
                        <input type="text" name="place" placeholder="" class="pull-left form-control">
                        <button type="submit" form="form-search-top" class="pull-left search-button fa fa-search">
                    </form>
                </div>
            </div>
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
