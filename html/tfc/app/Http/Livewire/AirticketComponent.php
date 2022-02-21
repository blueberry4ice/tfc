<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Airticket;
use App\Models\Category;
use App\Models\Month;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;

class AirticketComponent extends Component
{
    use WithPagination;

    public $min_price;
    public $max_price;
    public $byAgent = null;

    public function mount(){
        $this->min_price = 1;
        $this->max_price = 1000000;

    }



    public function render()
    {


        // $airtickets = Airticket::paginate(12);
        $airtickets = DB::table('airtickets')
        ->join('airlines_airtickets', 'airtickets.id', '=', 'airlines_airtickets.id_airticket')
        ->join('airlines', 'airlines.id', '=', 'airlines_airtickets.id_airline')
        ->join('agent_airlines', 'agent_airlines.id_airline', '=', 'airlines.id')
        ->join('agents', 'agents.id', '=', 'agent_airlines.id_agent')
        ->whereBetween('airtickets.price',[$this->min_price, $this->max_price])
        ->when($this->byAgent, function($query){
            $query->where('agents.id', $this->byAgent);
        })
        ->select('airtickets.*')
        ->distinct(['airtickets.id'])
        ->paginate(9);

        $agents = Agent::all();
        $categories = Category::all();
        $months = Month::all();

        return view('livewire.airticket-component',
        [
            'products'=>$airtickets,
            'agents'=>$agents,
            'categories'=>$categories,
            'months'=>$months
        ])
        ->layout("layouts.base");
        // return view('livewire.airticket-component',
        // ['airtickets'=>Airticket::when($this->byAgent, function($query){
        //     $query->where('id', $this->byAgent);
        // })->paginate(12)

        // ,'agents'=>$agents])->layout("layouts.base");

    }

    public function setPage($url)
    {

        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
}
