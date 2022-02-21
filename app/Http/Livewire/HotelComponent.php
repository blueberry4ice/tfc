<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class HotelComponent extends Component
{
    public function render()
    {
        $agents = DB::table('agent_hotel')
        ->join('agents', 'agents.id', '=', 'agent_hotel.id_agent')
        ->where('agent_hotel.id_package', '=', 1)
        ->select('agents.*')
        ->distinct(['agents.id'])
        ->paginate(20);
        return view('livewire.hotel-component',['agents' => $agents])->layout("layouts.base");
    }
}
