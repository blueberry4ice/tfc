<?php

use App\Http\Controllers\DownloadFileController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\RailComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CruiseComponent;
use App\Http\Livewire\AirticketComponent;
use App\Http\Livewire\ChooseagentComponent;
use App\Http\Livewire\SightseeingComponent;
use App\Http\Livewire\TourpackageComponent;
use App\Http\Livewire\AccommodationComponent;
use App\Http\Livewire\AgentairticketComponent;
use App\Http\Livewire\AgentproductitinComponent;
use App\Http\Livewire\AgenttourpackageComponent;
use App\Http\Livewire\AirticketdetailComponent;
use App\Http\Livewire\AllproductComponent;
use App\Http\Livewire\AttractionComponent;
use App\Http\Livewire\HotelComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\TravelinsuranceComponent;
use App\Http\Livewire\TourpackagedetailComponent;
use App\Http\Livewire\VisaComponent;
use App\Http\Livewire\CarComponent;
use App\Http\Livewire\ProductdetailitinComponent;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);

Route::get('/sku', AllproductComponent::class)->name('sku.search');

Route::get('/search/{menu}', SearchComponent::class)->name('product.search');

Route::get('/shop', ShopComponent::class);

Route::get('/airticket', AirticketComponent::class);

Route::get('/hotel', HotelComponent::class);

Route::get('/airticket/{airticketid}', AirticketdetailComponent::class)->name('airticket.detail');

Route::get('/tourpackage', TourpackageComponent::class);

Route::get('/tourpackage/{productid}', TourpackagedetailComponent::class)->name('tourpackage.detail');

Route::get('/cruise', CruiseComponent::class);

Route::get('/attraction', AttractionComponent::class);

Route::get('/sightseeing', SightseeingComponent::class);

Route::get('/accommodation', AccommodationComponent::class);

Route::get('/rail', RailComponent::class);

Route::get('/car', CarComponent::class);

Route::get('/travelinsurance', TravelinsuranceComponent::class);

Route::get('/visa', VisaComponent::class);

Route::get('/chooseagent/{productid}', ChooseagentComponent::class)->name('chooseagent.pick');

Route::get('/agentairticket/{productid}', AgentairticketComponent::class)->name('agentairticket.pick');

Route::get('/agenttourpackage/{productid}', AgenttourpackageComponent::class)->name('agenttourpackage.pick');

Route::get('/product2/{category}/{productid}', ProductdetailitinComponent::class)->name('productitin.detail');

Route::get('/agent/{category}/{productid}', AgentproductitinComponent::class)->name('agentproductitin.pick');

// Route::get('/download/{productid}/{categoryid}',DownloadFileController::class)->name('downloadfile');

