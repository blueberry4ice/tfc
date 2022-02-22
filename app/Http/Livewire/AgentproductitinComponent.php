<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Rail;
use App\Models\Visa;
use App\Models\Cruise;
use Livewire\Component;
use App\Models\Attraction;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\Roaming;
use App\Models\Sightseeing;
use App\Models\Tourpackage;
use App\Models\Travelinsurance;
use Illuminate\Support\Facades\DB;

class AgentproductitinComponent extends Component
{
    public $productid;

    public function mount($productid, $category)
    {
        $this->id = $productid;
        $this->cat = $category;
    }

    public function render()
    {
        switch ($this->cat) {
            case '11':
                $agents = DB::table('roaming')
                    ->join('agent_roaming', 'agent_roaming.id_package', '=', 'roaming.id')
                    ->join('agents', 'agents.id', '=', 'agent_roaming.id_agent')
                    ->where('roaming.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Roaming::where('id', '=', $this->productid)->get()->first();
                break;
            case '10':
                $agents = DB::table('visa')
                    ->join('agent_visa', 'agent_visa.id_package', '=', 'visa.id')
                    ->join('agents', 'agents.id', '=', 'agent_visa.id_agent')
                    ->where('visa.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Visa::where('id', '=', $this->productid)->get()->first();
                break;
            case '8':
                $agents = DB::table('cars')
                    ->join('agent_cars', 'agent_cars.id_package', '=', 'cars.id')
                    ->join('agents', 'agents.id', '=', 'agent_cars.id_agent')
                    ->where('cars.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Car::where('id', '=', $this->productid)->get()->first();
                break;
            case '7':
                $agents = DB::table('travelinsurance')
                    ->join('agent_travelinsurance', 'agent_travelinsurance.id_package', '=', 'travelinsurance.id')
                    ->join('agents', 'agents.id', '=', 'agent_travelinsurance.id_agent')
                    ->where('travelinsurance.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Travelinsurance::where('id', '=', $this->productid)->get()->first();
                break;
            case '6':
                $agents = DB::table('tourpackages')
                    ->join('agent_tourpackages', 'agent_tourpackages.id_package', '=', 'tourpackages.id')
                    ->join('agents', 'agents.id', '=', 'agent_tourpackages.id_agent')
                    ->where('tourpackages.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Tourpackage::where('id', '=', $this->productid)->get()->first();
                break;
            case '5':
                $agents = DB::table('sightseeing')
                    ->join('agent_sightseeing', 'agent_sightseeing.id_package', '=', 'sightseeing.id')
                    ->join('agents', 'agents.id', '=', 'agent_sightseeing.id_agent')
                    ->where('sightseeing.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Sightseeing::where('id', '=', $this->productid)->get()->first();
                break;
            case '4':
                $agents = DB::table('rails')
                    ->join('agent_rails', 'agent_rails.id_package', '=', 'rails.id')
                    ->join('agents', 'agents.id', '=', 'agent_rails.id_agent')
                    ->where('rails.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Rail::where('id', '=', $this->productid)->get()->first();
                break;

            case '3':
                $agents = DB::table('cruise')
                    ->join('agent_cruise', 'agent_cruise.id_package', '=', 'cruise.id')
                    ->join('agents', 'agents.id', '=', 'agent_cruise.id_agent')
                    ->where('cruise.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Cruise::where('id', '=', $this->productid)->get()->first();
                break;
            case '2':
                $agents = DB::table('attractions')
                    ->join('agent_attractions', 'agent_attractions.id_package', '=', 'attractions.id')
                    ->join('agents', 'agents.id', '=', 'agent_attractions.id_agent')
                    ->where('attractions.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Attraction::where('id', '=', $this->productid)->get()->first();
                break;
            case '12':
                $agents = DB::table('hotel')
                    ->join('agent_hotel', 'agent_hotel.id_package', '=', 'hotel.id')
                    ->join('agents', 'agents.id', '=', 'agent_hotel.id_agent')
                    ->where('hotel.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Hotel::where('id', '=', $this->productid)->get()->first();
                break;
            case '13':
                $agents = DB::table('flight')
                    ->join('agent_flight', 'agent_flight.id_package', '=', 'flight.id')
                    ->join('agents', 'agents.id', '=', 'agent_flight.id_agent')
                    ->where('flight.id', '=', $this->productid)
                    ->select('agents.*')
                    ->distinct(['agents.id'])
                    ->paginate(100);

                $product = Flight::where('id', '=', $this->productid)->get()->first();
                break;
            default:
                # code...
                break;
        }


        return view('livewire.agentproductitin-component', ['agents' => $agents, 'product' => $product, 'category' => $this->cat])->layout("layouts.base");
    }
}
