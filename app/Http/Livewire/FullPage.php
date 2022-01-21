<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FullPage extends Component
{
    public $originURL;
    public $component;

    public $listeners = ['hide'];

    public function mount($component){
        $this->originURL = request()->query('originURL') ?? null;
    }

    public function render()
    {
        error_log($this->originURL);
        return view('livewire.full-page');
    }

    public function hide(){
        error_log("fullpage - hide");
        return redirect($this->originURL);
    }
}
