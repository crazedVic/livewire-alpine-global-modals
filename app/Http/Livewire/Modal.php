<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $component;
    public $show = false;
    public $listeners = ['show'];

   public function render()
    {
        return view('livewire.modal');
    }

    public function show($component){
       error_log("here");
        $this->component = $component;
        $this->show = true;
    }

}
