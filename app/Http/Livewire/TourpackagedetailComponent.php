<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tourpackage;
use Illuminate\Support\Facades\Log;

class TourpackagedetailComponent extends Component
{
    public $productid;

    public function mount($productid)
    {
        $this->id = $productid;
    }

    public function render()
    {
        $product = Tourpackage::where('id', $this->id)->first();

        $itineraries = Tourpackage::join('tour_itineraries','tour_itineraries.id_package','=','tourpackages.id')
        ->join('itineraries', 'itineraries.id', '=', 'tour_itineraries.id_itinerary')
        ->where('tourpackages.id', $this->id)
        ->select('itineraries.*')
        ->orderBy('itineraries.sr', 'asc')
        ->get();

        $routes = Tourpackage::join('tour_routes','tour_routes.id_package','=','tourpackages.id')
        ->join('routes', 'routes.id', '=', 'tour_routes.id_route')
        ->where('tourpackages.id', $this->id)
        ->select('routes.*')
        ->orderBy('routes.sr', 'asc')
        ->get();

        // Log::debug('$itineraries ' . $itineraries->id);

        return view('livewire.tourpackagedetail-component',['product' => $product, 'itineraries'=>$itineraries, 'routes'=>$routes])->layout('layouts.base');
    }
}
