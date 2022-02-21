<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use App\Models\Month;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RailComponent extends Component
{
    use WithPagination;

    public $destination;
    public $agent;
    public $range = 0;
    public $price = 0;
    public $price2;
    public $sku;
    public $month;
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



    // protected $queryString = ['filters'];


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

        $this->resetPage();

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

        $this->resetPage();

        // if (!is_array($this->rangeslider)) return;

        // $this->rangeslider = array_filter(
        //     $this->rangeslider,
        //     function ($rangeslider) {
        //         return $rangeslider != false;
        //     }
        // );
    }


    public function mount()
    {

        $this->fill(request()->only('destination', 'agent', 'range', 'sku', 'cat', 'month','place'));
        // $this->price2 = 1;
        // $this->max_price = 1000000;

    }

    public function updatedListcategory()
    {
        $this->resetPage();
    }

    public function render()
    {

        if ($this->range == 0) $this->range=9999999999;
        
            
            
        // $this->price = $this->range;

        Log::info(print_r($this->rangeslider, true));
        // Log::info(print_r($this->price, true));


        // $this->byAgent = implode(",", array_filter($this->listAgent));
        // $this->bycategory = implode(",", array_filter($this->listcategory));

        

            $query = "(
                SELECT  rails.id, rails.sku, rails.name, 
                rails.summary, rails.price, rails.thumbnail, 
                4 AS category, agents.id as agent_id, rails.dept_month, rails.country
        FROM agent_rails
        JOIN  rails ON agent_rails.id_package = rails.id
        JOIN agents ON agents.id = agent_rails.id_agent
        
        ) AS VIEW_RESULT ";
            $query = str_replace("{dest}", $this->destination, $query);
            $query = str_replace("{range}", $this->range, $query);
            $query = str_replace("{agent}", $this->agent, $query);
            $query = str_replace("{sku}", $this->sku, $query);
            $query = str_replace("{place}", $this->place, $query);

        




        $products = DB::table(DB::raw($query))
        // ->whereBetween('price',[0,$this->rangeslider])
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
            ->when(
                $this->countries,
                function ($query, $countries) {
                    return $query->whereIn('country', $countries);
                }
            )
            ->when($this->rangeslider, function ($query, $rangeslider) {
                return $query->where('price', '<=', $rangeslider);
            })

            ->select('id', 'sku', 'name', 'summary', 'price', 'thumbnail', 'category')
            ->distinct(['id', 'sku', 'name', 'summary', 'price', 'thumbnail', 'category']);
        // Log::debug('products ' . $products);
        // Log::debug('bycategory ' . $this->bycategory);
        // $explode_cat = json_decode($this->bycategory, true);
        // Log::info(print_r($this->categories, true));

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

        // Log::info(print_r($products->get(), true));




        $dataAgents = Agent::all();
        $mastercategories = Category::all();
        $dataMonths = Month::all();
        $dataCategories = Category::all();

        return view(
            'livewire.rail-component',
            [
                'products' => $products
                    // ->distinct(['id', 'sku', 'name', 'summary', 'price', 'thumbnail', 'category'])
                    ->paginate(9),
                'dataAgents' => $dataAgents,
                'dataMonths' => $dataMonths,
                'dataCategories' => $dataCategories
            ]
        )->layout('layouts.base');

        $this->dispatchBrowserEvent('contentChanged');

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


