<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Rail;
use App\Models\Visa;
use App\Models\Price;
use App\Models\Cruise;
use App\Models\Roaming;
use Livewire\Component;
use App\Models\Attraction;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\Productprice;
use App\Models\Sightseeing;
use App\Models\Tourpackage;
use App\Models\Travelinsurance;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductdetailitinComponent extends Component
{
    public $productid;
    public $category;



    public function mount($productid, $category)
    {
        $this->productid = $productid;
        $this->cat = $category;
    }

    public function render()
    {
        switch ($this->cat) {
            case '6':
                $product = Tourpackage::where('id', $this->productid)->first();

                $itineraries = Tourpackage::join('tour_itineraries', 'tour_itineraries.id_package', '=', 'tourpackages.id')
                    ->where('tourpackages.id', $this->productid)
                    ->select('tour_itineraries.*')
                    ->orderBy('tour_itineraries.sr', 'asc')
                    ->get();

                $routes = Tourpackage::join('tour_routes', 'tour_routes.id_package', '=', 'tourpackages.id')
                    ->where('tourpackages.id', $this->productid)
                    ->select('tour_routes.*')
                    ->orderBy('tour_routes.sr', 'asc')
                    ->get();
                $prices = Productprice::join('tourpackages', 'product_price.id_product', '=', 'tourpackages.id')
                    ->where('product_price.category', $this->cat)
                    ->where('tourpackages.id', $this->productid)
                    ->select('product_price.*')
                    ->orderBy('product_price.sr', 'asc')
                    ->get();
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

                break;

            case '4':
                $product = Rail::where('id', $this->productid)->first();

                $itineraries = null;
                $routes = null;
                $prices = Productprice::join('rails', 'product_price.id_product', '=', 'rails.id')
                    ->where('product_price.category', $this->cat)
                    ->where('rails.id', $this->productid)
                    ->select('product_price.*')
                    // ->orderBy('product_price.sr', 'asc')
                    ->get();
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

                break;

            case '3':
                $product = Cruise::where('id', $this->productid)->first();

                $itineraries = Cruise::join('cruise_itineraries', 'cruise_itineraries.id_package', '=', 'cruise.id')
                    ->where('cruise.id', $this->productid)
                    ->select('cruise_itineraries.*')
                    ->orderBy('cruise_itineraries.sr', 'asc')
                    ->get();

                $routes = Cruise::join('cruise_routes', 'cruise_routes.id_package', '=', 'cruise.id')
                    ->where('cruise.id', $this->productid)
                    ->select('cruise_routes.*')
                    ->orderBy('cruise_routes.sr', 'asc')
                    ->get();
                $prices = Productprice::join('cruise', 'product_price.id_product', '=', 'cruise.id')
                    ->where('product_price.category', $this->cat)
                    ->where('cruise.id', $this->productid)
                    ->select('product_price.*')
                    ->orderBy('product_price.sr', 'asc')
                    ->get();
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

                break;
            case '2':
                // $product = Attraction::where('id', $this->productid)->first();
                // return view('livewire.productdetailitin-component', ['product' => $product, 'category' => $this->cat])->layout('layouts.base');

                // break;
                $product = Attraction::where('id', $this->productid)->first();
                $itineraries = null;
                $routes = null;
                $prices = Productprice::join('attractions', 'product_price.id_product', '=', 'attractions.id')
                    ->where('product_price.category', $this->cat)
                    ->where('attractions.id', $this->productid)
                    ->select('product_price.*')
                    ->orderBy('product_price.sr', 'asc')
                    ->get();
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

            case '5':
                $product = Sightseeing::where('id', $this->productid)->first();
                $itineraries = null;
                $routes = null;
                $prices = Productprice::join('sightseeing', 'product_price.id_product', '=', 'sightseeing.id')
                    ->where('product_price.category', $this->cat)
                    ->where('sightseeing.id', $this->productid)
                    ->select('product_price.*')
                    ->orderBy('product_price.sr', 'asc')
                    ->get();
                // return view('livewire.productdetailitin-component', ['product' => $product, 'category' => $this->cat])->layout('layouts.base');
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

                break;
            case '7':
                $product = Travelinsurance::where('id', $this->productid)->first();
                $itineraries = null;
                $routes = null;
                $prices = Productprice::join('travelinsurance', 'product_price.id_product', '=', 'travelinsurance.id')
                    ->where('product_price.category', $this->cat)
                    ->where('travelinsurance.id', $this->productid)
                    ->select('product_price.*')
                    ->orderBy('product_price.sr', 'asc')
                    ->get();
                // return view('livewire.productdetailitin-component', ['product' => $product, 'category' => $this->cat])->layout('layouts.base');
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

                break;
            case '8':
                $product = Car::where('id', $this->productid)->first();
                $itineraries = null;
                $routes = null;
                $prices = Productprice::join('cars', 'product_price.id_product', '=', 'cars.id')
                    ->where('product_price.category', $this->cat)
                    ->where('cars.id', $this->productid)
                    ->select('product_price.*')
                    ->orderBy('product_price.sr', 'asc')
                    ->get();
                // return view('livewire.productdetailitin-component', ['product' => $product, 'category' => $this->cat])->layout('layouts.base');
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

                break;
            case '10':

                $product = Visa::where('id', $this->productid)->first();
                $itineraries = null;
                $routes = null;
                $prices = Productprice::join('visa', 'product_price.id_product', '=', 'visa.id')
                    ->where('product_price.category', $this->cat)
                    ->where('visa.id', $this->productid)
                    ->select('product_price.*')
                    ->orderBy('product_price.sr', 'asc')
                    ->get();
                // return view('livewire.productdetailitin-component', ['product' => $product, 'category' => $this->cat])->layout('layouts.base');
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

                break;
            case '11':
                $product = Roaming::where('id', $this->productid)->first();
                $itineraries = null;
                $routes = null;
                $prices = Productprice::join('roaming', 'product_price.id_product', '=', 'roaming.id')
                    ->where('product_price.category', $this->cat)
                    ->where('roaming.id', $this->productid)
                    ->select('product_price.*')
                    ->orderBy('product_price.sr', 'asc')
                    ->get();
                // return view('livewire.productdetailitin-component', ['product' => $product, 'category' => $this->cat])->layout('layouts.base');
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

                break;
            case '12':
                $product = Hotel::where('id', $this->productid)->first();
                $itineraries = null;
                $routes = null;
                $prices = Productprice::join('hotel', 'product_price.id_product', '=', 'hotel.id')
                    ->where('product_price.category', $this->cat)
                    ->where('hotel.id', $this->productid)
                    ->select('product_price.*')
                    ->orderBy('product_price.sr', 'asc')
                    ->get();
                // return view('livewire.productdetailitin-component', ['product' => $product, 'category' => $this->cat])->layout('layouts.base');
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

                break;
            case '13':
                $product = Flight::where('id', $this->productid)->first();
                $itineraries = null;
                $routes = null;
                $prices = Productprice::join('flight', 'product_price.id_product', '=', 'flight.id')
                    ->where('product_price.category', $this->cat)
                    ->where('flight.id', $this->productid)
                    ->select('product_price.*')
                    ->orderBy('product_price.sr', 'asc')
                    ->get();
                // return view('livewire.productdetailitin-component', ['product' => $product, 'category' => $this->cat])->layout('layouts.base');
                return view('livewire.productdetailitin-component', ['product' => $product, 'itineraries' => $itineraries, 'routes' => $routes, 'category' => $this->cat, 'prices' => $prices])->layout('layouts.base');

                break;
            default:
                # code...
                break;
        }
    }

    public function export()
    {
        // return Storage::disk('exports')->download('export.csv');
        // $file = Tourpackage::all()->where('id','=',$this->productid)->first();
        // return response()->download(storage_path('file/'.$file->file));
        Log::debug('products ' . $this->productid);
        Log::debug('cat ' . $this->cat);
        switch ($this->cat) {
            case '2':
                $file = Attraction::all()->where('id', '=', $this->productid)->first();
                break;
            case '3':
                $file = Cruise::all()->where('id', '=', $this->productid)->first();
                break;
            case '4':
                $file = Rail::all()->where('id', '=', $this->productid)->first();
                break;
            case '5':
                $file = Sightseeing::all()->where('id', '=', $this->productid)->first();
                break;
            case '6':
                $file = Tourpackage::all()->where('id', '=', $this->productid)->first();
                break;
            case '7':
                $file = Travelinsurance::all()->where('id', '=', $this->productid)->first();
                break;
            case '8':
                $file = Car::all()->where('id', '=', $this->productid)->first();
                break;
            case '10':
                $file = Visa::all()->where('id', '=', $this->productid)->first();
                break;
            case '11':
                $file = Roaming::all()->where('id', '=', $this->productid)->first();
                break;
            case '12':
                $file = Hotel::all()->where('id', '=', $this->productid)->first();
                break;
            case '13':
                $file = Flight::all()->where('id', '=', $this->productid)->first();
                break;

            default:
                # code...
                break;
        }
        return response()->download(storage_path('app/file/' . $file->flyer));
    }

    // function downloadfile($productid, $category){
    //     Log::info(print_r($productid, true));
    // }
}
