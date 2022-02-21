<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CarComponent extends Component
{
    public function render()
    {
        return view('livewire.car-component')->layout('layouts.base');
    }
}
