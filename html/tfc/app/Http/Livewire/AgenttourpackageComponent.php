<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tourpackage;
use Illuminate\Support\Facades\DB;

class AgenttourpackageComponent extends Component
{
    public $productid;

    public function mount($productid)
    {
        $this->productid = $productid;
    }
    public function render()
    {
        $agents = DB::table('tourpackages')
        ->join('agent_tourpackages', 'agent_tourpackages.id_package', '=', 'tourpackages.id')
        ->join('agents', 'agents.id', '=', 'agent_tourpackages.id_agent')
        ->where('tourpackages.id', '=', $this->productid)
        ->select('agents.*')
        ->distinct(['agents.id'])
        ->paginate(100);

        $product = Tourpackage::where('id','=', $this->productid)->get()->first();

        return view('livewire.agenttourpackage-component',['agents'=>$agents, 'product'=>$product])->layout("layouts.base");
    }

}
