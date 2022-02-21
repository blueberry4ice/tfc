<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Airticket;
use App\Models\Category;
use App\Models\Month;
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
    public $sku;
    public $month;
    public $cat;
    public $listAgent = [];
    public $byAgent;
    public $listcategory = [];
    public $bycategory;
    public $explode_cat;



    public function mount()
    {
        $this->min_price = 1;
        $this->max_price = 1000000;
        $this->fill(request()->only('destination', 'agent', 'range', 'sku', 'cat', 'month'));
        // $agents = Agent::where('name' ,'LIKE', '%'.$this->agent.'%');
    }

    //     function find(Request $request){
    //         $request->validate([
    //           'query'=>'required|min:2'
    //        ]);

    //        $search_text = $request->input('query');
    //        $countries = DB::table('country')
    //                   ->where('Name','LIKE','%'.$search_text.'%')
    //                 //   ->orWhere('SurfaceArea','<', 10)
    //                 //   ->orWhere('LocalName','like','%'.$search_text.'%')
    //                   ->paginate(2);
    //         return view('search',['countries'=>$countries]);

    // }
    // public function updatedListcategory() {
    //     Log::debug('listCategorya ' .  is_array($this->listcategory));

    //     if (!is_array($this->listcategory)) return;

    //     $this->listcategory = array_filter($this->listcategory,
    //     function ($category) {
    //         return $category != false;

    //     });

    // }

    public function updatedListcategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->byAgent = implode(",", array_filter($this->listAgent));
        $this->bycategory = implode(",", array_filter($this->listcategory));

        // Log::debug('byAgent ' . trim(substr($this->byAgent, -1)));
        // if (trim(substr($this->byAgent, -1)) == ",") {
        //     $this->byAgent = substr($this->byAgent, 0,-1);
        //     Log::debug('if ');

        // }

        // Log::debug('byAgent ' . json_encode($this->byAgent));

        // Log::debug('$this->destination ' . $this->destination);
        // Log::debug('$this->agent ' . $this->agent);

        // if ($this->sku != null) {
        //     $tourpackages = Tourpackage::join('agent_tourpackages', 'tourpackages.id', '=', 'agent_tourpackages.id_package')
        //         ->join('agents', 'agents.id', '=', 'agent_tourpackages.id_agent')
        //         ->select('tourpackages.id', 'tourpackages.sku', 'tourpackages.name', 'tourpackages.summary', 'tourpackages.price', 'tourpackages.thumbnail')
        //         ->where('tourpackages.sku', 'like', '%' . $this->sku . '%');

        //     $products = DB::table('airtickets')
        //         ->join('airlines_airtickets', 'airtickets.id', '=', 'airlines_airtickets.id_airticket')
        //         ->join('airlines', 'airlines.id', '=', 'airlines_airtickets.id_airline')
        //         ->join('agent_airlines', 'agent_airlines.id_airline', '=', 'airlines.id')
        //         ->join('agents', 'agents.id', '=', 'agent_airlines.id_agent')
        //         ->where('airtickets.sku', 'like', '%' . $this->sku . '%')
        //         ->union($tourpackages)
        //         // ->where('airtickets.sku', '=', $this->sku)
        //         ->select('airtickets.id', 'airtickets.sku', 'airtickets.name', 'airtickets.summary', 'airtickets.price', 'airtickets.thumbnail', DB::raw('"airticket" as category'))
        //         // ->distinct(['airtickets.id','airtickets.sku','airtickets.name','airtickets.summary','airtickets.price','airtickets.thumbnail'])
        //         // ->get()
        //         ->paginate(12);
        // } else {
        //     $tourpackages = Tourpackage::join('agent_tourpackages', 'tourpackages.id', '=', 'agent_tourpackages.id_package')
        //         ->join('agents', 'agents.id', '=', 'agent_tourpackages.id_agent')
        //         ->whereBetween('price', ['0', $this->price])
        //         ->select('tourpackages.id', 'tourpackages.sku', 'tourpackages.name', 'tourpackages.summary', 'tourpackages.price', 'tourpackages.thumbnail', DB::raw('"tourpackage" as category'))
        //         ->whereBetween('price', ['0', $this->price])
        //         ->where(function ($query) {
        //             $query->orWhere('destination', 'like', '%' . $this->destination . '%')
        //                 ->orWhere('continent', 'like', '%' . $this->destination . '%')
        //                 ->orWhere('country', 'like', '%' . $this->destination . '%')
        //                 ->orWhere('city', 'like', '%' . $this->destination . '%')
        //                 ->orWhere('agents.name', 'like', '%' . $this->agent . '%');
        //         });

        //     $tickets = Airticket::join('airlines_airtickets', 'airtickets.id', '=', 'airlines_airtickets.id_airticket')
        //         ->join('airlines', 'airlines.id', '=', 'airlines_airtickets.id_airline')
        //         ->join('agent_airlines', 'agent_airlines.id_airline', '=', 'airlines.id')
        //         ->join('agents', 'agents.id', '=', 'agent_airlines.id_agent')
        //         ->whereBetween('airtickets.price', ['0', $this->price])
        //         ->select('airtickets.id', 'airtickets.sku', 'airtickets.name', 'airtickets.summary', 'airtickets.price', 'airtickets.thumbnail', DB::raw('"airticket" as category'))
        //         ->where(function ($query) {
        //             $query->orWhere('airtickets.destination', 'like', '%' . $this->destination . '%')
        //                 ->orWhere('airtickets.continent', 'like', '%' . $this->destination . '%')
        //                 ->orWhere('airtickets.country', 'like', '%' . $this->destination . '%')
        //                 ->orWhere('airtickets.city', 'like', '%' . $this->destination . '%')
        //                 ->orWhere('agents.name', 'like', '%' . $this->agent . '%');
        //         });

        //     $products = DB::query()
        //         ->fromSub($tickets, "query union")->paginate(12);
        // }


        // $products = Airticket::orWhere('airtickets.destination', 'like', '%' . $this->destination . '%')
        //     ->orWhere('airtickets.continent', 'like', '%' . $this->destination . '%')
        //     ->orWhere('airtickets.country', 'like', '%' . $this->destination . '%')
        //     ->orWhere('airtickets.city', 'like', '%' . $this->destination . '%');

        if ($this->sku != null) {

            $query = "(
                UNION
                SELECT airtickets.id, airtickets.sku, airtickets.name, airtickets.summary, 
                airtickets.price, airtickets.thumbnail, 1 AS category, agents.id as agent_id, 
                airtickets.dept_month, airtickets.country
                FROM airtickets
                JOIN airlines_airtickets ON airlines_airtickets.id_airticket = airtickets.id
                JOIN airlines ON airlines.id = airlines_airtickets.id_airline
                JOIN agent_airlines ON agent_airlines.id_airline = airlines.id
                JOIN agents ON agents.id = agent_airlines.id_agent
                where  
                (airtickets.destination like '%{dest}%'
                or airtickets.continent like '%{dest}%'
                or airtickets.country like '%{dest}%'
                or airtickets.city like '%{dest}%'
                )
                and agents.name like '%{agent}%'
                and airtickets.price between '0' and {range}
                and airtickets.sku like '%{sku}%'
                and
                (airtickets.continent like '%{place}%'
                or airtickets.country like '%{place}%'
                or airtickets.city like '%{place}%'
                or airtickets.name like '%{place}%'
                )
        UNION

        SELECT tourpackages.id, tourpackages.sku, tourpackages.name, tourpackages.summary, tourpackages.price, tourpackages.thumbnail, 6 AS category
        FROM tourpackages
        JOIN agent_tourpackages ON agent_tourpackages.id_package = tourpackages.id
        JOIN agents ON agents.id = agent_tourpackages.id_agent
        where tourpackages.sku like '%{sku}%' 

        ) AS VIEW_RESULT";
            $query = str_replace("{sku}", $this->sku, $query);
        } else {

            $query = "(
                
                SELECT tourpackages.id, tourpackages.sku, tourpackages.name, 
                tourpackages.summary, tourpackages.price, tourpackages.thumbnail, 
                6 AS category, agents.id as agent_id, tourpackages.dept_month
        FROM tourpackages
        JOIN agent_tourpackages ON agent_tourpackages.id_package = tourpackages.id
        JOIN agents ON agents.id = agent_tourpackages.id_agent
        where
        (tourpackages.price between {min_price} and {max_price})
        and  tourpackages.destination like '%{dest}%'
        and tourpackages.continent like '%{dest}%'
        and tourpackages.country like '%{dest}%'
        and tourpackages.city like '%{dest}%'
        and agents.name like '%{agent}%'
        and tourpackages.price between '0' and {range} 
        
        UNION
        
        SELECT airtickets.id, airtickets.sku, airtickets.name, airtickets.summary, 
        airtickets.price, airtickets.thumbnail, 1 AS category, agents.id as agent_id, airtickets.dept_month
        FROM airtickets
        JOIN airlines_airtickets ON airlines_airtickets.id_airticket = airtickets.id
        JOIN airlines ON airlines.id = airlines_airtickets.id_airline
        JOIN agent_airlines ON agent_airlines.id_airline = airlines.id
        JOIN agents ON agents.id = agent_airlines.id_agent
        where (airtickets.price between {min_price} and {max_price})
        and  airtickets.destination like '%{dest}%'
        and airtickets.continent like '%{dest}%'
        and airtickets.country like '%{dest}%'
        and airtickets.city like '%{dest}%'
        and agents.name like '%{agent}%'
        and  airtickets.price between '0' and {range}

        ) AS VIEW_RESULT";
            $query = str_replace("{dest}", $this->destination, $query);
            $query = str_replace("{range}", $this->range, $query);
            $query = str_replace("{agent}", $this->agent, $query);
            $query = str_replace("{min_price}", $this->min_price, $query);
            $query = str_replace("{max_price}", $this->max_price, $query);
        }


        $products = DB::table(DB::raw($query));
        // Log::debug('products ' . $products);
        // Log::debug('bycategory ' . $this->bycategory);
        // $explode_cat = json_decode($this->bycategory, true);
        Log::info(print_r($this->bycategory, true));

        $products = $products
            ->when($this->byAgent, function ($query) {
                $query->whereIn('agent_id', $this->byAgent);
            })
            ->when($this->bycategory, function ($query) {
                $query->whereIn('category', [$this->bycategory]);
            })
            ->when($this->month, function ($query) {
                $query->whereIn('dept_month', $this->month);
            });

        Log::info(print_r($products->get(), true));




        $agents = Agent::all();
        $categories = Category::all();
        $months = Month::all();
        return view(
            'livewire.search-component',
            [
                'products' => $products
                    // ->when($this->listcategory, function ($query, $listcategory) {
                    //    return $query->whereIn('category', $listcategory);
                    // })

                    ->distinct(['id', 'sku', 'name', 'summary', 'price', 'thumbnail', 'category'])
                    ->paginate(12),
                'agents' => $agents,
                'categories' => $categories,
                'months' => $months
            ]
        )->layout('layouts.base');
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
