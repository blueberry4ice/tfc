<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use App\Models\Month;
use Livewire\Component;
use App\Models\Tourpackage;
use App\Models\Productmonth;
use App\Models\Productprice;
use Livewire\WithPagination;
use App\Models\Touritinerary;
use Livewire\WithFileUploads;
use App\Models\Agenttourpackage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isEmpty;

class CrudTourpackage extends Component
{
    use WithPagination;
    use WithFileUploads;


    public $sku, $name, $agent,$summary, $continent, $country, $city, $image, $thumbnail, $tourpackageid, $flyer;
    public $agentproductid,$agenttourpackageid, $idagent, $idpackage;
    public $dataproductmonth, $productmonthid, $productpriceid, $productitinid;
    public $deleteId = '';
    public $deletename = '';
    public $monthcheckboxes;
    public $months, $agents;

    public $isModalCreateOpen = 0;
    public $isModalDeleteOpen = 0;

    public $contacts, $pricename, $priceval, $contact_id;
    public $updateMode = false;
    public $priceinputs = [];
    public $iprice = 1;

    public $itinname, $itinval;
    public $updateModeitin = false;
    public $itininputs = [];
    public $iitin = 1;

    public $lastsku;
    public $lastskuvalue;




    public function render()
    {
        $tourpackages = Tourpackage::orderBy("id", "desc")->paginate(10);
        $dataAgents = Agent::all();
        $dataMonths = Month::all();

        return view('livewire.crud-tourpackage', ['tourpackages' => $tourpackages, 'dataAgents' => $dataAgents, 'dataMonths' => $dataMonths])->layout('layouts.base');
    }

    public function create()
    {
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
        return redirect()->back();
    }

    private function resetCreateForm()
    {
        $this->agent = '';
        $this->name = '';
        $this->sku = '';
        $this->summary = '';
        $this->continent = '';
        $this->country = '';
        $this->city = '';
        $this->image = '';
        $this->thumbnail = '';
        $this->monthcheckboxes = '';
        $this->months = '';
        $this->priceinputs = [];
        $this->pricename = '';
        $this->priceval = '';
        $this->itinname = '';
        $this->itinval = '';
    }

    public function store()
    {

        $this->validate([
            'name' => 'required',
            'summary' => 'required',
            'continent' => 'required',
            'country' => 'required',
            'city' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:1500',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:1500',
        ]);


        if (!isEmpty($this->image)){
            $imagename = $this->image->getClientOriginalName();
            $this->image->storeAs('product_image', $imagename);
        } else {
            $imagename = 'DEFAULT.jpg';
        }
        

        if (!isEmpty($this->thumbnail)){
            $thumbnailname = $this->thumbnail->getClientOriginalName();
            $this->thumbnail->storeAs('product_thumbnail', $thumbnailname);
        } else {
            $thumbnailname = 'Thumbnail-DEFAULT.jpg';
        }
        
        if (!isEmpty($this->flyer)){
            $flyername = $this->flyer->getClientOriginalName();
            $this->image->storeAs('file', $flyername);
        } else {
            $flyername = null;
        }

        $lastsku = Tourpackage::orderBy('id', 'desc')->first();
        $lastskuvalue =  (int)substr($lastsku->sku,2);
        // Log::debug($lastskuvalue);

        $lastskuvalue++;
        $lastskuvalue = 'TP'.str_pad($lastskuvalue, 5, "0", STR_PAD_LEFT);


        $dataproduct = Tourpackage::updateOrCreate(
            ['id' => $this->tourpackageid],
            [
                'sku' => $lastskuvalue,
                'name' => $this->name,
                'summary' => $this->summary,
                'continent' => $this->continent,
                'country' => $this->country,
                'city' => $this->city,
                'image' => $imagename,
                'thumbnail' => $thumbnailname,
                'flyer' => $flyername,
            ]
        );
        $dataproduct->save();

        // $dataagenttourpackage = Agenttourpackage::updateOrCreate(
        //     ['id' => $this->agenttourpackageid],
        //     [
        //         'id_agent' => $this->agent,
        //         'id_package' => $dataproduct->id,
        //         'active' => 1,
        //     ]
        // );
        // $dataagenttourpackage->save();
        $i = 1;
        foreach ($this->agents as $agent) {
            $dataagentproduct = Agenttourpackage::updateOrCreate(
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

        $i = 1;
        foreach ($this->months as $month) {
            $dataproductmonth = Productmonth::updateOrCreate(
                ['id' => $this->productmonthid],
                [
                    'id_product' => $dataproduct->id,
                    'category' => 6,
                    'sr' => $i,
                    'id_month' => $month,
                    'active' => 1,
                ]
            );
            $dataproductmonth->save();
            $i++;
        }

        $i = 1;
        foreach ($this->pricename as $key => $value) {
            $dataproductprice = Productprice::updateOrCreate(
                ['id' => $this->productpriceid],
                [
                    'id_product' => $dataproduct->id,
                    'category' => 6,
                    'sr' => $i,
                    'name' => $this->pricename[$key],
                    'price' => $this->priceval[$key],
                    'active' => 1,
                ]
            );
            $dataproductprice->save();
            $i++;
        }

        $i = 1;
        // Log::debug($this->itinname);
        foreach ($this->itinname as $key => $value) {
            

            $dataproductitin = Touritinerary::updateOrCreate(
                ['id' => $this->productitinid],
                [
                    'id_package' => $dataproduct->id,
                    'desc' => $this->itinname[$key],
                    'sr' => $i,
                    'active' => 1,
                ]
            );
            // Log::debug($dataproductitin);
            $dataproductitin->save();
            $i++;
        }

        // 
        // Log::debug($data->id);


        session()->flash('message', $this->tourpackageid ? 'Data updated successfully.' : 'Data added successfully.');

        // $this->closeModalCreate();
        $this->resetCreateForm();
        $this->resetErrorBag();
        // return Redirect::back()->with('message','Operation Successful !');

    }

    public function edit($id)
    {
        // Log::debug($this->id);
        $this->resetErrorBag();
        $tourpackage = Tourpackage::findOrFail($id);
        $selectedagent = Agenttourpackage::where('id_package', $id)->first();
        $selectedmonth = Productmonth::where('id_product', $id)->first();

        
        // dd($agent);
        $this->tourpackageid = $id;
        $this->agent = $selectedagent->id_agent;
        $this->name = $tourpackage->name;
        $this->summary = $tourpackage->summary;
        $this->continent = $tourpackage->continent;
        $this->country = $tourpackage->country;
        $this->city = $tourpackage->city;
        $this->image = $tourpackage->image;
        $this->thumbnail = $tourpackage->thumbnail;
        // $this->months = $selectedmonth->id_month;

        Log::debug($tourpackage->thumbnail);

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
        Log::debug('masuk sini');

        $this->deleteId = $id;
        $this->deletename = $dataname;
        $this->openModalDelete();
    }

    public function delete()
    {
        Tourpackage::find($this->deleteId)->delete();
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
