<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Agentairticket;
use App\Models\Airticket;
use Illuminate\Support\Facades\DB;

class AgentairticketComponent extends Component
{
    public $productid;

    public function mount($productid)
    {
        $this->productid = $productid;
    }
    public function render()
    {
        // $agents = Agentairticket::where('id_product', $this->productid)->first();
        $agents = DB::table('airtickets')
        ->join('airlines_airtickets', 'airtickets.id', '=', 'airlines_airtickets.id_airticket')
        ->join('airlines', 'airlines.id', '=', 'airlines_airtickets.id_airline')
        ->join('agent_airlines', 'agent_airlines.id_airline', '=', 'airlines.id')
        ->join('agents', 'agents.id', '=', 'agent_airlines.id_agent')
        ->where('airtickets.id', '=', $this->productid)
        ->select('agents.*')
        // ->where(function($q) use ($productid){
        //     $q->where('airtickets.id','=',$productid);
        // })
        ->distinct(['agents.id'])
        // ->get()
        ->paginate(12);

        $product = Airticket::where('id','=', $this->productid)->get()->first();

        return view('livewire.agentairticket-component',['agents'=>$agents, 'product'=>$product])->layout("layouts.base");
    }
}
