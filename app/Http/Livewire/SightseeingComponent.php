<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SightseeingComponent extends Component
{
    public function render()
    {
        return view('livewire.sightseeing-component')->layout("layouts.base");
    }
}
