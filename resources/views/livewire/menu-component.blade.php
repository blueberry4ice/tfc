<ul class="menubar">
    <li>
        <div class="clearfix menu-search-wrapper">
            <form action="{{ route('product.search', ['menu' => 0]) }}" id="form-search-sku" name="form-search-sku">
                <input type="text" name="sku" placeholder="Enter Product Code" class="pull-left">
                <button type="submit" form="form-search-sku" class="addon fa fa-search pull-left">
            </form>
        </div>
    </li>
    @auth
    <li class="has-sub">
        <a href="#" title="">List</a>
        <ul class="menusub-wrapper">
            <li>
                <a href="{{ route('manage.tourpackage') }}" title="">Tour Package</a>
            </li>
            <li>
                <a href="{{ route('manage.cruise') }}" title="">Cruise</a>
            </li>
            <li>
                <a href="{{ route('manage.rail') }}" title="">Rail</a>
            </li>
            <li>
                <a href="{{ route('manage.sightseeing') }}" title="">Sightseeing</a>
            </li>
            <li>
                <a href="{{ route('manage.attraction') }}" title="">Attraction</a>
            </li>
            <li>
                <a href="{{ route('manage.travelinsurance') }}" title="">Travel Insurance</a>
            </li>
            <li>
                <a href="{{ route('manage.car') }}" title="">Car Rental</a>
            </li>
            <li>
                <a href="{{ route('manage.visa') }}" title="">Visa Application</a>
            </li>
            <li>
                <a href="{{ route('manage.roaming') }}" title="">Roaming</a>
            </li>
            <li>
                <a href="{{ route('manage.hotel') }}" title="">Hotel</a>
            </li>
            <li>
                <a href="{{ route('manage.flight') }}" title="">Flight</a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            </li>
        </ul>
    </li>
    @endauth
    <li class="has-sub">
        <a href="#" title="">Travel add on</a>
        <ul class="menusub-wrapper">
            <li>
                <a href="{{ route('product.search', ['menu' => 7]) }}" title="">Travel Insurance</a>
            </li>
            <li>
                <a href="{{ route('product.search', ['menu' => 8]) }}" title="">Car Rental</a>
            </li>
            <li>
                <a href="{{ route('product.search', ['menu' => 11]) }}" title="">Roaming</a>
            </li>
            <li>
                <a href="{{ route('product.search', ['menu' => 10]) }}" title="">Visa Application</a>
            </li>
            {{-- <li>
                <a href="{{ route('productitin.detail', ['productid' => 1,'category' => 8]) }}" title="">Car Rental</a>
            </li>
            <li>
                <a href="{{ route('productitin.detail', ['productid' => 1,'category' => 11]) }}" title="">Roaming</a>
            </li>
            <li>
                <a href="{{ route('productitin.detail', ['productid' => 1, 'category' => 10]) }}" title="">Visa Application</a>
            </li> --}}
        </ul>
    </li>
    <li class="has-sub">
        <a href="#" title="">Things to do</a>
        <ul class="menusub-wrapper">
            <li>
                <a href="{{ route('product.search', ['menu' => 5]) }}" title="">Sightseeing</a>
            </li>
            <li>
                <a href="{{ route('product.search', ['menu' => 2]) }}" title="">Attractions</a>
            </li>

        </ul>
    </li>
    <li>
        {{-- <a href="/hotel" title="">Hotel</a> --}}
        <a href="{{ route('product.search', ['menu' => 12]) }}" title="">Hotel</a>

    </li>
    <li class="has-sub">
        <a href="#" title="">Rail and Cruise</a>
        <ul class="menusub-wrapper">
            <li>
                <a href="{{ route('product.search', ['menu' => 4]) }}" title="">Rail Passes</a>
            </li>
            <li>
                <a href="{{ route('product.search', ['menu' => 3]) }}" title="">Cruises</a>
            </li>

        </ul>
    </li>
    <li>
        <a href="{{ route('product.search', ['menu' => 6]) }}" title="">Tour Package</a>
    </li>
    <li>
        {{-- <a href="https://www.astindovirtualtravelfair.com/exhibitor" target=”_blank” title="">Air Ticket</a> --}}
        <a href="{{ route('product.search', ['menu' => 13]) }}" title="">Flight</a>

    </li>
</ul>
