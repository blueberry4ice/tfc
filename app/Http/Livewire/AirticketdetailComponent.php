<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Airticket;
use Illuminate\Support\Facades\DB;

class AirticketdetailComponent extends Component
{
    public $airticketid;

    public function mount($airticketid)
    {
        $this->id = $airticketid;
    }

    public function render()
    {
        $airticket = Airticket::where('id', $this->id)->first();
        return view('livewire.airticketdetail-component',['airticket' => $airticket])->layout('layouts.base');
    }
}
