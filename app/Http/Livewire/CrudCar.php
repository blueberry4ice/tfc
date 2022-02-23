<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use App\Models\Month;
use Livewire\Component;
use App\Models\Attraction;
use App\Models\Tourpackage;
use App\Models\Productmonth;
use App\Models\Productprice;
use Livewire\WithPagination;
use App\Models\Touritinerary;
use Livewire\WithFileUploads;
use App\Models\Agentattraction;
use App\Models\Agentcar;
use App\Models\Agenttourpackage;
use App\Models\Car;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Redirect;

class CrudCar extends Component
{
    use WithPagination;
    use WithFileUploads;


    public $sku, $name, $agent,$summary, $continent, $country, $city, $image, $thumbnail, $flyer, $productid, $detail,$imagename,$thumbnailname;
    public $agentproductid, $idagent, $idpackage;
    public $dataproductmonth, $productmonthid, $productpriceid, $productitinid;
    public $deleteId = '';
    public $deletename = '';
    public $monthcheckboxes, $checkedagent;
    public $months, $agents, $prices;

    public $isModalCreateOpen = 0;
    public $isModalDeleteOpen = 0;

    public $contacts, $contact_id;
    public $updateMode = false;
    public $priceinputs = [];
    public $pricename = [];
    public $priceval = [];
    public $iprice = 0;

    public $itinname, $itinval;
    public $updateModeitin = false;
    public $itininputs = [];
    public $iitin = 1;

    public $lastsku;
    public $lastskuvalue;

    public $category = 8;
    public $isedit;





    public function render()
    {
        $products = Car::orderBy("id", "desc")->paginate(10);
        $dataAgents = Agent::all();
        $dataMonths = Month::all();
        return view('livewire.crud-car', ['products' => $products, 'dataAgents' => $dataAgents, 'dataMonths' => $dataMonths])->layout('layouts.base');
    }

    public function create()
    {
        $this->isedit = false;
        $this->resetCreateForm();
        $this->openModalCreate();
    }

    public function openModalCreate()
    {
        $this->isModalCreateOpen = true;
    }

    public function closeModalCreate()
    {
        // $this->isModalCreateOpen = false;
        // return redirect()->back();
        return redirect()->to('manage/car');
    }

    private function resetCreateForm()
    {
        $this->agent = '';
        $this->name = '';
        $this->sku = '';
        $this->summary = '';
        $this->detail = '';
        $this->continent = '';
        $this->country = '';
        $this->city = '';
        $this->image = null;
        $this->thumbnail = null;
        $this->flyer = null;
        $this->monthcheckboxes = '';
        $this->priceinputs = [];
        $this->pricename = '';
        $this->priceval = '';
        $this->itinname = '';
        $this->itinval = '';
        $this->agents = [];
        $this->months = [];
        $this->resetErrorBag();


    }

    public function store()
    {

        if ($this->isedit) {
            $this->validate([
                'name' => 'required',
                'summary' => 'required',
                'detail' => 'required', 
                'continent' => 'required',
                'country' => 'required',
                'city' => 'required',
            ]);
        } else {
            $this->validate([
                'name' => 'required',
                'summary' => 'required',
                'detail' => 'required', 
                'continent' => 'required',
                'country' => 'required',
                'city' => 'required',
                'image' => 'nullable|mimes:jpeg,png,jpg|max:1500',
                'thumbnail' => 'nullable|mimes:jpeg,png,jpg|max:1500',
                'flyer' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:1500',
                'pricename.0' => 'required',
                'priceval.0' => 'required|numeric',
                'agents' => 'required',
                'months' => 'required',
            ],
            [
                'pricename.0.required' => 'The Price Name field cannot be empty.',
                'priceval.0.required' => 'The Price Value field cannot be empty.',
                'priceval.0.numeric' => 'The Price Value field should be numeric only.',
            ]);
        }

        $isupload=0;
        if (!$this->isedit) {
            if ($this->image) {
                $imagename = $this->image->getClientOriginalName();
                $this->image->storeAs('product_image', $imagename);
            } else {
                $imagename = 'DEFAULT.jpg';
            }
        } else {
            try {
                if ($this->image->getClientOriginalName()){
                    $isupload=1;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            if ($isupload) {
                $imagename = $this->image->getClientOriginalName();
                $this->image->storeAs('product_image', $imagename);
            } else {
                $imagename = $this->image;
            }
        }
        $isupload=0;

        if (!$this->isedit) {
            if ($this->thumbnail) {
                $thumbnailname = $this->thumbnail->getClientOriginalName();
                $this->thumbnail->storeAs('product_thumbnail', $thumbnailname);
            } else {
                $thumbnailname = 'Thumbnail-DEFAULT.jpg';
            }
        } else {
            try {
                if ($this->thumbnail->getClientOriginalName()){
                    $isupload=1;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            if ($isupload) {
                $thumbnailname = $this->thumbnail->getClientOriginalName();
                $this->thumbnail->storeAs('product_thumbnail', $thumbnailname);
            } else {
                $thumbnailname = $this->thumbnail;
            }
        }
        $isupload=0;

        if (!$this->isedit) {
            if ($this->flyer) {
                $flyername = $this->flyer->getClientOriginalName();
                $this->flyer->storeAs('file', $flyername);
            } else {
                $flyername = null;
            }
        } else {
            try {
                if ($this->flyer->getClientOriginalName()){
                    $isupload=1;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            if ($isupload) {
                $flyername = $this->flyer->getClientOriginalName();
                $this->flyer->storeAs('file', $flyername);
            } else {
                $flyername = $this->flyer;
            }
        }
        $isupload=0;
       
        if (!$this->isedit) {
            $lastsku = Car::orderBy('id', 'desc')->first();
            if ($lastsku) {
                $lastskuvalue =  (int)substr($lastsku->sku,2);
            } else {
                $lastskuvalue =  0;
            }        
            $lastskuvalue++;
            $lastskuvalue = 'CA'.str_pad($lastskuvalue, 5, "0", STR_PAD_LEFT);
        } else {
            $lastskuvalue=$this->sku;
        }


        $dataproduct = Car::updateOrCreate(
            ['id' => $this->productid],
            [
                'sku' => $lastskuvalue,
                'name' => $this->name,
                'summary' => $this->summary,
                'detail' => $this->detail,
                'continent' => $this->continent,
                'country' => $this->country,
                'city' => $this->city,
                'image' => $imagename,
                'thumbnail' => $thumbnailname,
                'flyer' => $flyername,
                
            ]
        );
        $dataproduct->save();

        // $dataagentproduct = Agentattraction::updateOrCreate(
        //     ['id' => $this->agentproductid],
        //     [
        //         'id_agent' => $this->agent,
        //         'id_package' => $dataproduct->id,
        //         'active' => 1,
        //     ]
        // );
        // $dataagentproduct->save();
        DB::table('agent_cars')->where('id_package', $this->productid)->delete();

        $i = 1;
        foreach ($this->agents as $agent) {
            $dataagentproduct = Agentcar::updateOrCreate(
                ['id' => $this->agentproductid],
                [
                'id_agent' => $agent,
                'id_package' => $dataproduct->id,
                'active' => 1,
                ]
            );
            $dataagentproduct->save();
            $i++;
        }

        DB::table('product_month')->where('id_product', $this->productid)->where('category', $this->category)->delete();
        $i = 1;
        foreach ($this->months as $month) {
            $dataproductmonth = Productmonth::updateOrCreate(
                ['id' => $this->productmonthid],
                [
                    'id_product' => $dataproduct->id,
                    'category' => $this->category,
                    'sr' => $i,
                    'id_month' => $month,
                    'active' => 1,
                ]
            );
            $dataproductmonth->save();
            $i++;
        }
        // dd($this->pricename);


        DB::table('product_price')->where('id_product', $this->productid)->where('category', $this->category)->delete();
        $i = 1;
        foreach ($this->pricename as $key => $value) {
            $dataproductprice = Productprice::updateOrCreate(
                ['id' => $this->productpriceid],
                [
                    'id_product' => $dataproduct->id,
                    'category' => $this->category,
                    'sr' => $i,
                    'name' => $this->pricename[$key],
                    'price' => $this->priceval[$key],
                    'active' => 1,
                ]
            );
            $dataproductprice->save();
            $i++;
        }

        // $i = 1;
        // // Log::debug($this->itinname);
        // foreach ($this->itinname as $key => $value) {
        //     $dataproductitin = Cruiseitinerary::updateOrCreate(
        //         ['id' => $this->productitinid],
        //         [
        //             'id_package' => $dataproduct->id,
        //             'desc' => $this->itinname[$key],
        //             'sr' => $i,
        //             'active' => 1,
        //         ]
        //     );
        //     // Log::debug($dataproductitin);
        //     $dataproductitin->save();
        //     $i++;
        // }

        // 
        // Log::debug($data->id);


        session()->flash('message', $this->productid ? 'Data updated successfully.' : 'Data added successfully.');
        return redirect()->to('manage/car');

        // $this->closeModalCreate();
        $this->resetCreateForm();
        // $this->reset();

        // $this->image = null;
        // return Redirect::back()->with('message','Operation Successful !');

    }

    public function edit($id, $isedit)
    {
        // Log::debug($this->id);
        $this->resetErrorBag();
        $this->isedit = $isedit;
        $product = Car::findOrFail($id);
        $agents = Agentcar::where('id_package', $id)->get();
        $this->agents = json_decode($agents->pluck('id_agent'));
        // Log::debug($id);

        $months = Productmonth::where('id_product', $id)->where('category', $this->category)->get();
        $this->months = json_decode($months->pluck('id_month'));
        Log::debug($this->months);

        $prices = Productprice::where('id_product', $id)->where('category', $this->category)->get();
        Log::debug($this->pricename);
        // dd($prices->count());
        
        $row = $prices->count();
        $row--;
        for ($i=0; $i < $row; $i++) { 
            $this->iprice = $i;
            array_push($this->priceinputs ,$i);        
        }

        // $i = 0;
        // foreach ($prices as $key => $value) {
        //     $i = $i + 1;
        //     $this->iprice = $i;
        //     array_push($this->priceinputs ,$i);

        // } 
        $this->pricename = json_decode($prices->pluck('name'));
        $this->priceval = json_decode($prices->pluck('price'));



        
        
        // $this->prices = json_decode($prices->pluck('sr'));


                // dd($product->image);

        $this->productid = $id;
        $this->sku = $product->sku;
        // $this->agent = $selectedagent->id_agent;
        $this->name = $product->name;
        $this->summary = $product->summary;
        $this->detail = $product->detail;
        $this->continent = $product->continent;
        $this->country = $product->country;
        $this->city = $product->city;
        $this->image = $product->image;
        $this->thumbnail = $product->thumbnail;
        $this->flyer = $product->flyer;
        // $this->months = $selectedmonth->id_month;

        // dd($this->image);


        $this->openModalCreate();
    }

    public function openModalDelete()
    {
        $this->isModalDeleteOpen = true;
    }

    public function closeModalDelete()
    {
        $this->isModalDeleteOpen = false;
    }

    public function deleteId($id, $dataname)
    {

        $this->deleteId = $id;
        $this->deletename = $dataname;
        $this->openModalDelete();
    }

    public function delete()
    {
        Car::find($this->deleteId)->delete();
        session()->flash('message', 'Data deleted successfully.');
        $this->closeModalDelete();
    }

    public function add($iprice)
    {
        $iprice = $iprice + 1;
        $this->iprice = $iprice;
        array_push($this->priceinputs ,$iprice);
    }

    public function remove($iprice)
    {
        // dd($iprice);
        unset($this->pricename[$iprice+1]);
        unset($this->priceinputs[$iprice]);
    }

    private function resetInputFields(){
        $this->pricename = '';
        $this->priceval = '';
    }

    public function additin($iitin)
    {
        $iitin = $iitin + 1;
        $this->iitin = $iitin;
        array_push($this->itininputs ,$iitin);
    }

    public function removeitin($iitin)
    {
        unset($this->itininputs[$iitin]);
    }

    private function resetInputFieldsitin(){
        $this->itinname = '';
        $this->itinval = '';
    }
}
