<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AllproductComponent extends Component
{
    public $destination;
    public $agent;
    public $sku;

    public function mount()
    {
        $this->min_price = 1;
        $this->max_price = 1000000;
        $this->fill(request()->only('sku', 'agent', 'destination'));

    }

    public function render()
    {
        $products = DB::table('airtickets')
        ->join('airlines_airtickets', 'airtickets.id', '=', 'airlines_airtickets.id_airticket')
        ->join('airlines', 'airlines.id', '=', 'airlines_airtickets.id_airline')
        ->join('agent_airlines', 'agent_airlines.id_airline', '=', 'airlines.id')
        ->join('agents', 'agents.id', '=', 'agent_airlines.id_agent')
        ->whereBetween('airtickets.price',[$this->min_price, $this->max_price])
        ->where('airtickets.sku', '=', $this->sku)
        ->select('airtickets.*')
        ->distinct(['airtickets.id'])
        // ->get()
        ->paginate(12);
        return view('livewire.allproduct-component',['products'=>$products])->layout('layouts.base');
    }
}
