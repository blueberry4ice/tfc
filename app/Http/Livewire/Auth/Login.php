<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Login extends Component
{
    public $email;
    public $password;
    
    /**
     * login
     *
     * @return void
     */
    public function login()
    {
        Log::info($this->email);
        $this->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(Auth::attempt(['email' => $this->email, 'password'=> $this->password])) {
// if ($this->email == 'admin@atibusinessgroup.com') {
            // return redirect()->route('admin.home');
            return redirect()->to('/');

        } else {
            session()->flash('error', 'Alamat Email atau Password Anda salah!.');
            return redirect()->route('auth.login');
        }
    }
    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.base');
    }

}
