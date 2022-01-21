<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $component;
    public $show = false;
    public $listeners = ['show','hide'];

   public function render()
    {
        return view('livewire.modal');
    }

    public function show($component)
    {
        error_log("modal - show");
        $this->component = $component;
        $this->show = true;
    }

    public function hide(){
       error_log("modal - hide");
       $this->component = null;
       $this->show = false;
    }

}
