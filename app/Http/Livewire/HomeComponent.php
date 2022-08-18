<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use App\Models\Month;
use Livewire\Component;

class HomeComponent extends Component
{
    public $favdests;
    public function render()
    {
        $agents = Agent::all();
        $this->favdests = [
            0 => [
                'name' => 'Australia',
                'thumbnail' => 'pref australia.jpg',
            ],
            // 1 => [
            //     'name' => 'Korea',
            //     'thumbnail' => 'Seoul.png',
            // ],
            // 2 => [
            //     'name' => 'Taiwan',
            //     'thumbnail' => 'Taiwan.png',
            // ],
            // 1 => [
            //     'name' => 'Thailand',
            //     'thumbnail' => 'phuket.jpg',
            // ],
            // 3 => [
            //     'name' => 'Malaysia',
            //     'thumbnail' => 'bg-home06.jpg',
            // ],
            // 4 => [
            //     'name' => 'Singapore',
            //     'thumbnail' => 'bg-home07.jpg',
            // ],
            // 5 => [
            //     'name' => 'Raja Ampat',
            //     'thumbnail' => 'bg-home08.jpg',
            // ],
        ];

        $months = Month::all();
            // $this->favdests = array(
            //     0 => array(
            //         'name' => 'John Doe',
            //         'email' => 'john@example.com'
            //     ),
            //     1 => array(
            //         'name' => 'Jane Doe',
            //         'email' => 'jane@example.com'
            //     ),
            // );

// print(date('Y-m-d H:i:s'));

// $now = strtotime("03:00:00");
// $livedt   = strtotime("20:00:00");

        if (date('Y-m-d H:i:s') < '2022-08-19 00:00:00')  {
            // print ('ya');
            return view('livewire.home-component', [
                'agents' => $agents,
                'favdests' => $this->favdests,
                'months' => $months
                ])->layout('livewire.countdown');
        } else {
            // print ('tidak');
            return view('livewire.home-component', [
                'agents' => $agents,
                'favdests' => $this->favdests,
                'months' => $months
                ])->layout('layouts.base');
        }


        // return view('livewire.home-component', [
        //     'agents' => $agents,
        //     'favdests' => $this->favdests,
        //     'months' => $months
        //     // ])->layout('layouts.base');
        //     ])->layout('livewire.countdown');
    }
}
