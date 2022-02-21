<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccommodationComponent extends Component
{
    public function render()
    {
        return view('livewire.accommodation-component')->layout("layouts.base");
    }
}
