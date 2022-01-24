<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FullPage extends Component
{
    public $originURL;
    public $component;
    public $edit_id = null;

    public $listeners = ['hide'];

    public function mount($component, $edit_id = null){
        $this->originURL = request()->query('originURL') ?? null;
    }

    public function render()
    {
        return view('livewire.full-page');
    }

    public function hide(){
        error_log("fullpage - hide");
        return redirect($this->originURL);
    }
}
