<div class="mobile-menu-wrapper">
    <ul>
        <li>
            <a href="https://www.astindovirtualtravelfair.com/exhibitor" target=”_blank” title="">Air Ticket</a>
        </li>
        <li>
            <a href="{{ route('product.search', ['menu' => 6]) }}" title="">Tour Package</a>
        </li>
        <li class="has-sub">
            <a href="#" title="">Rail and Cruise</a>
            <div class="mobile-menu-sub">
                <ul>
                    <li>
                        <a href="{{ route('product.search', ['menu' => 4]) }}" title="">Rails</a>
                    </li>
                    <li>
                        <a href="{{ route('product.search', ['menu' => 3]) }}" title="">Cruises</a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <a href="/hotel" title="">Hotel</a>
        </li>
        <li class="has-sub">
            <a href="#" title="">Things to do</a>
            <div class="mobile-menu-sub">
                <ul>

                    <li>
                        <a href="{{ route('product.search', ['menu' => 2]) }}" title="">Attractions</a>
                    </li>
                    <li>
                        <a href="{{ route('product.search', ['menu' => 5]) }}" title="">Sightseeing</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="has-sub">
            <a href="#" title="">Travel add ons</a>
            <div class="mobile-menu-sub">
                <ul>
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
            </div>
        </li>
        <li>
            <div class="clearfix menu-search-wrapper">
                <form action="{{ route('product.search', ['menu' => 0]) }}" id="form-search-sku-mobile" name="form-search-sku-mobile">
                    <input type="text" name="sku" placeholder="Enter Product Code" class="pull-left">
                    <button type="submit" form="form-search-sku-mobile" class="addon fa fa-search pull-left">
                </form>

            </div>
        </li>
    </ul>
</div>
