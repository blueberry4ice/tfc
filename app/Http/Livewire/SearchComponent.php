<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Agent;
use App\Models\Month;
use Livewire\Component;
use App\Models\Category;
use App\Models\Airticket;
use App\Models\Tourpackage;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;


class SearchComponent extends Component
{
    use WithPagination;

    public $destination;
    public $agent;
    public $range = 0;
    public $price = 0;
    public $price2;
    public $sku;
    public $month;
    public $magent;
    public $mdestination;
    public $cat;
    public $place;
    public $listAgent = [];
    public $byAgent;
    public $listcategory = [];
    public $bycategory;
    public $explode_cat;

    public $categories;
    public $agents;
    public $months;
    public $countries;
    public $ranges;
    public $rangeslider;

    public $menu;
    public $component;

    public $assets;
    protected $listeners = [
        'getassets' => 'passtobrowser'
    ];

    public function updatedCategories()
    {
        $this->resetPage();

        if (!is_array($this->categories)) return;

        $this->categories = array_filter(
            $this->categories,
            function ($category) {
                return $category != false;
            }
        );
    }

    public function updatedAgents()
    {

        // $this->resetPage();
        //         $this->reset($this->search);
        //    $this->goToPage(1);

        if (!is_array($this->agents)) return;

        $this->agents = array_filter(
            $this->agents,
            function ($agent) {
                return $agent != false;
            }
        );
    }

    public function updatedMonths()
    {

        $this->resetPage();

        if (!is_array($this->months)) return;

        $this->months = array_filter(
            $this->months,
            function ($month) {
                return $month != false;
            }
        );
    }

    public function updatedCountries()
    {

        $this->resetPage();

        if (!is_array($this->countries)) return;

        $this->countries = array_filter(
            $this->countries,
            function ($country) {
                return $country != false;
            }
        );
    }

    public function updatedRangeslider()
    {
        // Log::debug('jalan di updatedRangeslider ');

        $this->resetPage();
    }




    public function mount($menu)
    {
        $this->menu = $menu;
        $this->fill(request()->only('destination', 'agent', 'range', 'sku', 'cat', 'month', 'place', 'magent', 'mdestination'));
        // $this->price2 = 1;
        // $this->max_price = 1000000;

    }

    public function updatedListcategory()
    {
        // Log::debug('jalan di updatedListcategory ');

        // $this->resetPage();
    }

    public function passtobrowser(){
        $this->dispatchBrowserEvent('changeassets', ['agent' => $this->agent]);
    }

    public function render()
    {
        // $this->dispatchBrowserEvent('contentChanged');
// dd($this->agent);
        // Log::debug("countries" . print_r($this->countries, true));

        if ($this->range == 0) $this->range = 9999999999;

        if ($this->destination == null) {
            $this->destination = $this->mdestination;
        }

        if ($this->agent == null) {
            $this->agent = $this->magent;
        }
        


        switch ($this->menu) {
            case '0':
                $component = 'livewire.search-component';
                $query = "(
                    SELECT  tourpackages.id, tourpackages.sku, tourpackages.name,
                    tourpackages.summary, MIN(product_price.price) AS price, tourpackages.thumbnail,
                    6 AS category, agents.id as agent_id, product_month.id_month as dept_month, tourpackages.country, 'tourpackages' AS tablename
            FROM agent_tourpackages
            JOIN  tourpackages ON agent_tourpackages.id_package = tourpackages.id
            JOIN agents ON agents.id = agent_tourpackages.id_agent
            JOIN product_price ON product_price.id_product = tourpackages.id AND product_price.category = 6 and product_price.price <> 0
            JOIN product_month on product_month.id_product = tourpackages.id AND product_month.category = 6
            where
            (tourpackages.destination like '%{dest}%'
            or tourpackages.continent like '%{dest}%'
            or tourpackages.country like '%{dest}%'
            or tourpackages.city like '%{dest}%'
            )
            and
            agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and tourpackages.sku like '%{sku}%'
            and
            (tourpackages.continent like '%{place}%'
            or tourpackages.country like '%{place}%'
            or tourpackages.city like '%{place}%'
            or tourpackages.name like '%{place}%'
            )
            {filtercountry}
            {filtercountry}
            group by tourpackages.id, tourpackages.sku, tourpackages.name,
            tourpackages.summary,  tourpackages.thumbnail,
            category, agent_id,  product_month.id_month, tourpackages.country, tablename

            UNION
            SELECT  rails.id, rails.sku, rails.name,
                    rails.summary, MIN(product_price.price), rails.thumbnail,
                    4 AS category, agents.id as agent_id, product_month.id_month as dept_month, rails.country, 'rails' AS tablename
            FROM agent_rails
            JOIN  rails ON agent_rails.id_package = rails.id
            JOIN agents ON agents.id = agent_rails.id_agent
            JOIN product_price ON product_price.id_product = rails.id AND product_price.category = 4 and product_price.price <> 0
            JOIN product_month on product_month.id_product = rails.id AND product_month.category = 4
            where
            (rails.destination like '%{dest}%'
            or rails.continent like '%{dest}%'
            or rails.country like '%{dest}%'
            or rails.city like '%{dest}%'
            )
            and agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and rails.sku like '%{sku}%'
            and
            (rails.continent like '%{place}%'
            or rails.country like '%{place}%'
            or rails.city like '%{place}%'
            or rails.name like '%{place}%'
            )
            {filtercountry}
            group by rails.id, rails.sku, rails.name,
            rails.summary,  rails.thumbnail,
            category, agent_id,  product_month.id_month, rails.country, tablename

            UNION
            SELECT  cruise.id, cruise.sku, cruise.name,
                    cruise.summary, MIN(product_price.price), cruise.thumbnail,
                    3 AS category, agents.id as agent_id, product_month.id_month as dept_month, cruise.country, 'cruise' AS tablename
            FROM agent_cruise
            JOIN  cruise ON agent_cruise.id_package = cruise.id
            JOIN agents ON agents.id = agent_cruise.id_agent
            JOIN product_price ON product_price.id_product = cruise.id AND product_price.category = 3 and product_price.price <> 0
            JOIN product_month on product_month.id_product = cruise.id AND product_month.category = 3
            where
            (cruise.destination like '%{dest}%'
            or cruise.continent like '%{dest}%'
            or cruise.country like '%{dest}%'
            or cruise.city like '%{dest}%'
            )
            and agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and cruise.sku like '%{sku}%'
            and
            (cruise.continent like '%{place}%'
            or cruise.country like '%{place}%'
            or cruise.city like '%{place}%'
            or cruise.name like '%{place}%'
            )
            {filtercountry}
            group by cruise.id, cruise.sku, cruise.name,
            cruise.summary,  cruise.thumbnail,
            category, agent_id,  product_month.id_month, cruise.country, tablename


            UNION
            SELECT  attractions.id, attractions.sku, attractions.name,
                    attractions.summary, MIN(product_price.price), attractions.thumbnail,
                    2 AS category, agents.id as agent_id, product_month.id_month as dept_month, attractions.country, 'attractions' AS tablename
            FROM agent_attractions
            JOIN  attractions ON agent_attractions.id_package = attractions.id
            JOIN agents ON agents.id = agent_attractions.id_agent
            JOIN product_price ON product_price.id_product = attractions.id AND product_price.category = 2 and product_price.price <> 0
            JOIN product_month on product_month.id_product = attractions.id AND product_month.category = 2
            where
            (attractions.destination like '%{dest}%'
            or attractions.continent like '%{dest}%'
            or attractions.country like '%{dest}%'
            or attractions.city like '%{dest}%'
            )
            and agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and attractions.sku like '%{sku}%'
            and
            (attractions.continent like '%{place}%'
            or attractions.country like '%{place}%'
            or attractions.city like '%{place}%'
            or attractions.name like '%{place}%'
            )
            {filtercountry}
            group by attractions.id, attractions.sku, attractions.name,
            attractions.summary,  attractions.thumbnail,
            category, agent_id,  product_month.id_month, attractions.country, tablename

            UNION
            SELECT  sightseeing.id, sightseeing.sku, sightseeing.name,
                    sightseeing.summary, MIN(product_price.price), sightseeing.thumbnail,
                    5 AS category, agents.id as agent_id, product_month.id_month as dept_month, sightseeing.country, 'sightseeing' AS tablename
            FROM agent_sightseeing
            JOIN  sightseeing ON agent_sightseeing.id_package = sightseeing.id
            JOIN agents ON agents.id = agent_sightseeing.id_agent
            JOIN product_price ON product_price.id_product = sightseeing.id AND product_price.category = 5 and product_price.price <> 0
            JOIN product_month on product_month.id_product = sightseeing.id AND product_month.category = 5
            where
            (sightseeing.destination like '%{dest}%'
            or sightseeing.continent like '%{dest}%'
            or sightseeing.country like '%{dest}%'
            or sightseeing.city like '%{dest}%'
            )
            and agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and sightseeing.sku like '%{sku}%'
            and
            (sightseeing.continent like '%{place}%'
            or sightseeing.country like '%{place}%'
            or sightseeing.city like '%{place}%'
            or sightseeing.name like '%{place}%'
            )
            {filtercountry}
            group by sightseeing.id, sightseeing.sku, sightseeing.name,
            sightseeing.summary,  sightseeing.thumbnail,
            category, agent_id,  product_month.id_month, sightseeing.country, tablename

            UNION
            SELECT  travelinsurance.id, travelinsurance.sku, travelinsurance.name,
                    travelinsurance.summary, MIN(product_price.price), travelinsurance.thumbnail,
                    7 AS category, agents.id as agent_id, product_month.id_month as dept_month, travelinsurance.country, 'travelinsurance' AS tablename
            FROM agent_travelinsurance
            JOIN  travelinsurance ON agent_travelinsurance.id_package = travelinsurance.id
            JOIN agents ON agents.id = agent_travelinsurance.id_agent
            JOIN product_price ON product_price.id_product = travelinsurance.id AND product_price.category = 7 and product_price.price <> 0
            JOIN product_month on product_month.id_product = travelinsurance.id AND product_month.category = 7
            where
            (travelinsurance.destination like '%{dest}%'
            or travelinsurance.continent like '%{dest}%'
            or travelinsurance.country like '%{dest}%'
            or travelinsurance.city like '%{dest}%'
            )
            and agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and travelinsurance.sku like '%{sku}%'
            and
            (travelinsurance.continent like '%{place}%'
            or travelinsurance.country like '%{place}%'
            or travelinsurance.city like '%{place}%'
            or travelinsurance.name like '%{place}%'
            )
            {filtercountry}
            group by travelinsurance.id, travelinsurance.sku, travelinsurance.name,
            travelinsurance.summary,  travelinsurance.thumbnail,
            category, agent_id,  product_month.id_month, travelinsurance.country, tablename

            UNION
            SELECT  cars.id, cars.sku, cars.name,
                    cars.summary, MIN(product_price.price), cars.thumbnail,
                    8 AS category, agents.id as agent_id, product_month.id_month as dept_month, cars.country, 'cars' AS tablename
            FROM agent_cars
            JOIN  cars ON agent_cars.id_package = cars.id
            JOIN agents ON agents.id = agent_cars.id_agent
            JOIN product_price ON product_price.id_product = cars.id AND product_price.category = 8 and product_price.price <> 0
            JOIN product_month on product_month.id_product = cars.id AND product_month.category = 8
            where
            (cars.destination like '%{dest}%'
            or cars.continent like '%{dest}%'
            or cars.country like '%{dest}%'
            or cars.city like '%{dest}%'
            )
            and agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and cars.sku like '%{sku}%'
            and
            (cars.continent like '%{place}%'
            or cars.country like '%{place}%'
            or cars.city like '%{place}%'
            or cars.name like '%{place}%'
            )
            {filtercountry}
            group by cars.id, cars.sku, cars.name,
            cars.summary,  cars.thumbnail,
            category, agent_id,  product_month.id_month, cars.country, tablename

            UNION
            SELECT  visa.id, visa.sku, visa.name,
                    visa.summary, MIN(product_price.price), visa.thumbnail,
                    10 AS category, agents.id as agent_id, product_month.id_month as dept_month, visa.country, 'visa' AS tablename
            FROM agent_visa
            JOIN  visa ON agent_visa.id_package = visa.id
            JOIN agents ON agents.id = agent_visa.id_agent
            JOIN product_price ON product_price.id_product = visa.id AND product_price.category = 10 and product_price.price <> 0
            JOIN product_month on product_month.id_product = visa.id AND product_month.category = 10
            where
            (visa.destination like '%{dest}%'
            or visa.continent like '%{dest}%'
            or visa.country like '%{dest}%'
            or visa.city like '%{dest}%'
            )
            and agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and visa.sku like '%{sku}%'
            and
            (visa.continent like '%{place}%'
            or visa.country like '%{place}%'
            or visa.city like '%{place}%'
            or visa.name like '%{place}%'
            )
            {filtercountry}
            group by visa.id, visa.sku, visa.name,
            visa.summary,  visa.thumbnail,
            category, agent_id,  product_month.id_month, visa.country, tablename

            UNION
            SELECT  roaming.id, roaming.sku, roaming.name,
                    roaming.summary, MIN(product_price.price), roaming.thumbnail,
                    11 AS category, agents.id as agent_id, product_month.id_month as dept_month, roaming.country, 'roaming' AS tablename
            FROM agent_roaming
            JOIN  roaming ON agent_roaming.id_package = roaming.id
            JOIN agents ON agents.id = agent_roaming.id_agent
            JOIN product_price ON product_price.id_product = roaming.id AND product_price.category = 11 and product_price.price <> 0
            JOIN product_month on product_month.id_product = roaming.id AND product_month.category = 11
            where
            (roaming.destination like '%{dest}%'
            or roaming.continent like '%{dest}%'
            or roaming.country like '%{dest}%'
            or roaming.city like '%{dest}%'
            )
            and agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and roaming.sku like '%{sku}%'
            and
            (roaming.continent like '%{place}%'
            or roaming.country like '%{place}%'
            or roaming.city like '%{place}%'
            or roaming.name like '%{place}%'
            )
            {filtercountry}
            group by roaming.id, roaming.sku, roaming.name,
            roaming.summary,  roaming.thumbnail,
            category, agent_id,  product_month.id_month, roaming.country, tablename

            UNION
            SELECT  hotel.id, hotel.sku, hotel.name,
                    hotel.summary, MIN(product_price.price), hotel.thumbnail,
                    12 AS category, agents.id as agent_id, product_month.id_month as dept_month, hotel.country, 'hotel' AS tablename
            FROM agent_hotel
            JOIN  hotel ON agent_hotel.id_package = hotel.id
            JOIN agents ON agents.id = agent_hotel.id_agent
            JOIN product_price ON product_price.id_product = hotel.id AND product_price.category = 12 and product_price.price <> 0
            JOIN product_month on product_month.id_product = hotel.id AND product_month.category = 12
            where
            (hotel.destination like '%{dest}%'
            or hotel.continent like '%{dest}%'
            or hotel.country like '%{dest}%'
            or hotel.city like '%{dest}%'
            )
            and agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and hotel.sku like '%{sku}%'
            and
            (hotel.continent like '%{place}%'
            or hotel.country like '%{place}%'
            or hotel.city like '%{place}%'
            or hotel.name like '%{place}%'
            )
            {filtercountry}
            group by hotel.id, hotel.sku, hotel.name,
            hotel.summary,  hotel.thumbnail,
            category, agent_id,  product_month.id_month, hotel.country, tablename

            UNION
            SELECT  flight.id, flight.sku, flight.name,
                    flight.summary, MIN(product_price.price), flight.thumbnail,
                    13 AS category, agents.id as agent_id, product_month.id_month as dept_month, flight.country, 'flight' AS tablename
            FROM agent_flight
            JOIN  flight ON agent_flight.id_package = flight.id
            JOIN agents ON agents.id = agent_flight.id_agent
            JOIN product_price ON product_price.id_product = flight.id AND product_price.category = 13 and product_price.price <> 0
            JOIN product_month on product_month.id_product = flight.id AND product_month.category = 13
            where
            (flight.destination like '%{dest}%'
            or flight.continent like '%{dest}%'
            or flight.country like '%{dest}%'
            or flight.city like '%{dest}%'
            )
            and agents.name like '%{agent}%'
            and product_price.price between '0' and {range}
            and flight.sku like '%{sku}%'
            and
            (flight.continent like '%{place}%'
            or flight.country like '%{place}%'
            or flight.city like '%{place}%'
            or flight.name like '%{place}%'
            )
            {filtercountry}
            group by flight.id, flight.sku, flight.name,
            flight.summary,  flight.thumbnail,
            category, agent_id,  product_month.id_month, flight.country, tablename

            ) AS VIEW_RESULT ";
                $query = str_replace("{dest}", $this->destination, $query);
                $query = str_replace("{range}", $this->range, $query);
                $query = str_replace("{agent}", $this->agent, $query);
                $query = str_replace("{sku}", $this->sku, $query);
                $query = str_replace("{place}", $this->place, $query);


                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    // Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            // Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }

                $queryContinent = "(SELECT DISTINCT continent, 0 as tablename FROM (
                    SELECT  continent FROM attractions
                    UNION
                    SELECT  continent FROM cruise
                    UNION
                    SELECT  continent FROM rails
                    UNION
                    SELECT  continent FROM sightseeing
                    UNION
                    SELECT  continent FROM tourpackages
                    UNION
                    SELECT  continent FROM travelinsurance
                    UNION
                    SELECT  continent FROM hotel
                    UNION
                    SELECT  continent FROM flight
                    ) AS tablecontinent
                                                ) AS VIEW_RESULT ";

                break;

            case '2':
                $component = 'livewire.search-component';
                $query = "(
                    SELECT   attractions.id, attractions.sku, attractions.name,
                    attractions.summary, MIN(product_price.price) AS price, attractions.thumbnail,
                    2 AS category, agents.id AS agent_id, product_month.id_month as dept_month, attractions.country, 'attractions' AS tablename
            FROM agent_attractions
            JOIN  attractions ON agent_attractions.id_package = attractions.id
            JOIN agents ON agents.id = agent_attractions.id_agent
            JOIN product_price ON product_price.id_product = attractions.id AND product_price.category = '$this->menu' and product_price.price <> 0
            JOIN product_month on product_month.id_product = attractions.id AND product_month.category = '$this->menu'
            {filtercountry}   
            GROUP BY attractions.id, attractions.sku, attractions.name,
                    attractions.summary, attractions.thumbnail,
                    category, agent_id, product_month.id_month, attractions.country
                           
            ) AS VIEW_RESULT ";

                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'attractions' as tablename FROM attractions
                                                ) AS VIEW_RESULT ";
                break;
            case '3':
                $component = 'livewire.search-component';
                $query = "(
                    SELECT cruise.id, cruise.sku, cruise.name,
                    cruise.summary, MIN(product_price.price) AS price, cruise.thumbnail,
                    3 AS category, agents.id AS agent_id, product_month.id_month as dept_month, cruise.country, 'cruise' AS tablename
            FROM agent_cruise
            JOIN  cruise ON agent_cruise.id_package = cruise.id
            JOIN agents ON agents.id = agent_cruise.id_agent
            JOIN product_price ON product_price.id_product = cruise.id AND product_price.category = '$this->menu' and product_price.price <> 0
            JOIN product_month on product_month.id_product = cruise.id AND product_month.category = '$this->menu'
            {filtercountry}
                       GROUP BY cruise.id, cruise.sku, cruise.name,
                    cruise.summary,  cruise.thumbnail,
                    category, agent_id, product_month.id_month, cruise.country
                    
            ) AS VIEW_RESULT ";
                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'cruise' as tablename FROM cruise
                                                ) AS VIEW_RESULT ";
                break;
            case '4':
                $component = 'livewire.search-component';
                $query = "(
                    SELECT  rails.id, rails.sku, rails.name,
                    rails.summary, MIN(product_price.price) AS price, rails.thumbnail,
                    4 AS category, agents.id AS agent_id,product_month.id_month as dept_month, rails.country, 'rails' AS tablename
            FROM agent_rails
            JOIN  rails ON agent_rails.id_package = rails.id
            JOIN agents ON agents.id = agent_rails.id_agent
            JOIN product_price ON product_price.id_product = rails.id AND product_price.category = '$this->menu' and product_price.price <> 0
            JOIN product_month on product_month.id_product = rails.id AND product_month.category = '$this->menu'
            {filtercountry}
                       GROUP BY rails.id, rails.sku, rails.name,
                    rails.summary,  rails.thumbnail,
                    category, agent_id, product_month.id_month, rails.country
                    
            ) AS VIEW_RESULT ";
                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'rails' as tablename FROM rails
                                                ) AS VIEW_RESULT ";
                break;
            case '5':
                $component = 'livewire.search-component';
                $query = "(
                    SELECT  sightseeing.id, sightseeing.sku, sightseeing.name,
                    sightseeing.summary, MIN(product_price.price) AS price, sightseeing.thumbnail,
                    5 AS category, agents.id AS agent_id, product_month.id_month as dept_month, sightseeing.country, 'sightseeing' AS tablename
            FROM agent_sightseeing
            JOIN  sightseeing ON agent_sightseeing.id_package = sightseeing.id
            JOIN agents ON agents.id = agent_sightseeing.id_agent
            JOIN product_price ON product_price.id_product = sightseeing.id AND product_price.category = '$this->menu' and product_price.price <> 0
            JOIN product_month on product_month.id_product = sightseeing.id AND product_month.category = '$this->menu'
            {filtercountry}
                        GROUP BY sightseeing.id, sightseeing.sku, sightseeing.name,
                    sightseeing.summary, sightseeing.thumbnail,
                    category, agent_id, product_month.id_month, sightseeing.country
                    
            ) AS VIEW_RESULT ";
                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'sightseeing' as tablename FROM sightseeing
                                                ) AS VIEW_RESULT ";
                break;
            case '6':
                $component = 'livewire.search-component';
                $query = "(SELECT  tourpackages.id, tourpackages.sku, tourpackages.name,
                tourpackages.summary, MIN(product_price.price) AS price, tourpackages.thumbnail,
                6 AS category, agents.id AS agent_id, tourpackages.country, 'tourpackages' AS tablename
                ,product_month.id_month as dept_month
            FROM agent_tourpackages
            JOIN  tourpackages ON agent_tourpackages.id_package = tourpackages.id
            JOIN agents ON agents.id = agent_tourpackages.id_agent
            JOIN product_price ON product_price.id_product = tourpackages.id AND product_price.category = '$this->menu' and product_price.price <> 0
            JOIN product_month on product_month.id_product = tourpackages.id AND product_month.category = '$this->menu'
            {filtercountry}
            GROUP BY tourpackages.id, tourpackages.sku, tourpackages.name,
                tourpackages.summary,  tourpackages.thumbnail,
                category, agent_id, tourpackages.dept_month, tourpackages.country, product_month.id_month
                
                                ) AS VIEW_RESULT ";

                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'tourpackages' as tablename FROM tourpackages
                                                ) AS VIEW_RESULT ";
                break;
            case '7':
                $component = 'livewire.search-component';
                $query = "(
                    SELECT  travelinsurance.id, travelinsurance.sku, travelinsurance.name,
                    travelinsurance.summary, MIN(product_price.price) AS price, travelinsurance.thumbnail,
                    7 AS category, agents.id AS agent_id,  travelinsurance.country, 'travelinsurance' AS tablename
                    ,product_month.id_month as dept_month
            FROM agent_travelinsurance
            JOIN  travelinsurance ON agent_travelinsurance.id_package = travelinsurance.id
            JOIN agents ON agents.id = agent_travelinsurance.id_agent
            JOIN product_price ON product_price.id_product = travelinsurance.id AND product_price.category = '$this->menu' and product_price.price <> 0
            JOIN product_month on product_month.id_product = travelinsurance.id AND product_month.category = '$this->menu'
            {filtercountry}
                      GROUP BY travelinsurance.id, travelinsurance.sku, travelinsurance.name,
                    travelinsurance.summary,  travelinsurance.thumbnail,
                    category, agent_id, product_month.id_month, travelinsurance.country
                    
            ) AS VIEW_RESULT ";
                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'travelinsurance' as tablename FROM travelinsurance
                                                ) AS VIEW_RESULT ";
                break;

            case '8':
                $component = 'livewire.search-component';
                $query = "(
                        SELECT  cars.id, cars.sku, cars.name,
                        cars.summary, MIN(product_price.price) AS price, cars.thumbnail,
                        8 AS category, agents.id AS agent_id,  cars.country, 'cars' AS tablename
                        ,product_month.id_month as dept_month
                FROM agent_cars
                JOIN  cars ON agent_cars.id_package = cars.id
                JOIN agents ON agents.id = agent_cars.id_agent
                JOIN product_price ON product_price.id_product = cars.id AND product_price.category = '$this->menu' and product_price.price <> 0
                JOIN product_month on product_month.id_product = cars.id AND product_month.category = '$this->menu'
                {filtercountry}
                          GROUP BY cars.id, cars.sku, cars.name,
                        cars.summary,  cars.thumbnail,
                        category, agent_id, product_month.id_month, cars.country
                        
                        ) AS VIEW_RESULT ";
                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'cars' as tablename FROM cars
                                                    ) AS VIEW_RESULT ";
                break;

            case '10':
                $component = 'livewire.search-component';
                $query = "(
                            SELECT  visa.id, visa.sku, visa.name,
                            visa.summary, MIN(product_price.price) AS price, visa.thumbnail,
                            10 AS category, agents.id AS agent_id,  visa.country, 'visa' AS tablename
                            ,product_month.id_month as dept_month
                    FROM agent_visa
                    JOIN  visa ON agent_visa.id_package = visa.id
                    JOIN agents ON agents.id = agent_visa.id_agent
                    JOIN product_price ON product_price.id_product = visa.id AND product_price.category = '$this->menu' and product_price.price <> 0
                    JOIN product_month on product_month.id_product = visa.id AND product_month.category = '$this->menu'
                    {filtercountry}
                               GROUP BY visa.id, visa.sku, visa.name,
                            visa.summary,  visa.thumbnail,
                            category, agent_id, product_month.id_month, visa.country
                            
                            ) AS VIEW_RESULT ";
                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'visa' as tablename FROM visa
                                                        ) AS VIEW_RESULT ";
                break;
            case '11':
                $component = 'livewire.search-component';
                $query = "(
                                SELECT  roaming.id, roaming.sku, roaming.name,
                                roaming.summary, MIN(product_price.price) AS price, roaming.thumbnail,
                                11 AS category, agents.id AS agent_id,  roaming.country, 'roaming' AS tablename
                                ,product_month.id_month as dept_month
                        FROM agent_roaming
                        JOIN  roaming ON agent_roaming.id_package = roaming.id
                        JOIN agents ON agents.id = agent_roaming.id_agent
                        JOIN product_price ON product_price.id_product = roaming.id AND product_price.category = '$this->menu' and product_price.price <> 0
                        JOIN product_month on product_month.id_product = roaming.id AND product_month.category = '$this->menu'
                        {filtercountry}
                                  GROUP BY roaming.id, roaming.sku, roaming.name,
                                roaming.summary,  roaming.thumbnail,
                                category, agent_id, product_month.id_month, roaming.country
                                
                                ) AS VIEW_RESULT ";
                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'roaming' as tablename FROM roaming
                                                            ) AS VIEW_RESULT ";
                break;
            case '12':
                $component = 'livewire.search-component';
                $query = "(
                        SELECT   hotel.id, hotel.sku, hotel.name,
                        hotel.summary, MIN(product_price.price) AS price, hotel.thumbnail,
                        12 AS category, agents.id AS agent_id, product_month.id_month as dept_month, hotel.country, 'hotel' AS tablename
                FROM agent_hotel
                JOIN  hotel ON agent_hotel.id_package = hotel.id
                JOIN agents ON agents.id = agent_hotel.id_agent
                JOIN product_price ON product_price.id_product = hotel.id AND product_price.category = '$this->menu' and product_price.price <> 0
                JOIN product_month on product_month.id_product = hotel.id AND product_month.category = '$this->menu'
                {filtercountry}   
                GROUP BY hotel.id, hotel.sku, hotel.name,
                        hotel.summary, hotel.thumbnail,
                        category, agent_id, product_month.id_month, hotel.country
                               
                ) AS VIEW_RESULT ";

                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    // Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'hotel' as tablename FROM hotel
                                                    ) AS VIEW_RESULT ";
                break;
            case '13':
                $component = 'livewire.search-component';
                $query = "(
                            SELECT   flight.id, flight.sku, flight.name,
                            flight.summary, MIN(product_price.price) AS price, flight.thumbnail,
                            13 AS category, agents.id AS agent_id, product_month.id_month as dept_month, flight.country, 'flight' AS tablename
                    FROM agent_flight
                    JOIN  flight ON agent_flight.id_package = flight.id
                    JOIN agents ON agents.id = agent_flight.id_agent
                    JOIN product_price ON product_price.id_product = flight.id AND product_price.category = '$this->menu' and product_price.price <> 0
                    JOIN product_month on product_month.id_product = flight.id AND product_month.category = '$this->menu'
                    {filtercountry}   
                    GROUP BY flight.id, flight.sku, flight.name,
                            flight.summary, flight.thumbnail,
                            category, agent_id, product_month.id_month, flight.country
                                   
                    ) AS VIEW_RESULT ";

                if ($this->countries) {
                    $sr = 1;
                    $lncountries = count($this->countries);
                    Log::debug("panjang countries " . $lncountries);
                    foreach ($this->countries as $country) {
                        if ($lncountries == 1) {
                            Log::debug("panjang countries sama dengan 1");
                            $query =  str_replace("{filtercountry}", " and (country like '%" . $country . "%')", $query);
                        } else {
                            if ($sr == 1) {
                                $query =  str_replace("{filtercountry}", "and (country like '%" . $country . "%' {filtercountry}", $query);
                            } else {
                                if ($sr != $lncountries) {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%' {filtercountry}", $query);
                                } else {
                                    $query =  str_replace("{filtercountry}", "or country like '%" . $country . "%')", $query);
                                }
                            }
                        }

                        $sr++;
                    }
                } else {
                    $query =  str_replace("{filtercountry}", " ", $query);
                }
                $queryContinent = "(SELECT DISTINCT continent, 'flight' as tablename FROM flight
                                                        ) AS VIEW_RESULT ";
                break;
            default:
                # code...
                break;
        }
        $this->dispatchBrowserEvent('say-goodbye', ['agent' => $this->agents]);
        // $this->dispatchBrowserEvent('update-agent-from-home', ['agent' => $this->agents]);
        $this->emit('agent',  $this->agents);
        
        


        $products = DB::table(DB::raw($query))
            ->when(
                $this->agents,
                function ($query, $agents) {
                    return $query->whereIn('agent_id', $agents);
                }
            )
            ->when(
                $this->categories,
                function ($query, $categories) {
                    return $query->whereIn('category', $categories);
                }
            )
            ->when(
                $this->months,
                function ($query, $months) {
                    return $query->whereIn('dept_month', $months);
                }
            )
            // ->when(
            //     $this->countries,
            //     function ($query, $countries) {
            //         // Log::info(print_r($countries, true));
            //         Log::debug("countris2 ".print_r($countries, true));
            //         foreach($countries as $country) {
            //             $query->orWhere('country', 'LIKE', "%$country%");
            //         }

            //         // return $query->whereIn('country', $countries);
            //     }
            // )
            ->when($this->rangeslider, function ($query, $rangeslider) {
                return $query->where('price', '<=', $rangeslider);
            })
            // orderBy(DB::raw('RAND()'))
            ->inRandomOrder()
            ->select('id', 'sku', 'name', 'summary', 'price', 'thumbnail', 'category')
            ->distinct(['id', 'sku', 'name', 'summary', 'price', 'thumbnail', 'category']);



        // Log::info(print_r($this->rangeslider, true));
        // $this->byAgent = implode(",", array_filter($this->listAgent));
        // $this->bycategory = implode(",", array_filter($this->listcategory));


        // Log::debug('products ' . $products);
        // Log::debug('bycategory ' . $this->bycategory);
        // $explode_cat = json_decode($this->bycategory, true);
        // Log::info(print_r($products, true));

        // $products = $products
        //     // ->when($this->byAgent, function ($query) {
        //     //     $query->whereIn('agent_id', $this->byAgent);
        //     // })
        //     // ->when($this->bycategory, function ($query) {
        //     //     $query->whereIn('category', [$this->bycategory]);
        //     // })
        //     // ->when($this->month, function ($query) {
        //     //     $query->whereIn('dept_month', $this->month);
        //     // })
        //     ->when($this->categories,
        //         function ($query, $categories){
        //             return $query->whereIn('category', $categories);
        //         })
        //         ->distinct(['id', 'sku', 'name', 'summary', 'price', 'thumbnail', 'category'])
        //     ;

        $continents = DB::table(DB::raw($queryContinent))->distinct()->orderByRaw('continent ASC')->get();
        // Log::info(json_encode($continents));

        $dataAgents = Agent::all();
        $mastercategories = Category::all()->where('as_filter', '=', '1');
        $dataMonths = Month::all();
        $dataCategories = Category::all()->where('as_filter', '=', '1');
        DB::table('temp_country')->truncate();
        DB::table('temp_country2')->truncate();





        // Log::debug('dataAgents ' . $dataAgents);





        switch ($this->menu) {
                // case '8':
                //     return view('livewire.agentproductitin-component', ['agents' => $dataAgents, 'product' => $products])->layout("layouts.base");
                //     break;
                // case '10':
                //     return view('livewire.agentproductitin-component', ['agents' => $dataAgents, 'product' => $products])->layout("layouts.base");
                //     break;
            default:
                return view(
                    $component,
                    [
                        'products' => $products
                            // ->distinct(['id', 'sku', 'name', 'summary', 'price', 'thumbnail', 'category'])
                            ->paginate(9),
                        'dataAgents' => $dataAgents,
                        'dataMonths' => $dataMonths,
                        'dataCategories' => $dataCategories,
                        'continents' => $continents,
                    ]
                )->layout('layouts.base');

                break;
        }
    }



    // public function setPage($url)
    // {
    //     Log::info(print_r($url, true));
    // //     // $this->currentPage = explode('page=', $url)[0];



    // //     Paginator::currentPageResolver(function () {
    // //         return $this->currentPage;
    // //     });
    // }
}
