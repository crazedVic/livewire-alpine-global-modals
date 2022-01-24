<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $edit_id;
    public $component;
    public bool $show = false;
    public $listeners = ['show','hide'];

   public function render()
    {
        return view('livewire.modal');
    }

    public function show($component, $edit_id = null)
    {
        $this->component = $component;
        $this->edit_id = $edit_id;
        $this->show = true;
    }

    public function hide(){
       error_log("modal - hide");
       $this->component = null;
       $this->show = false;
    }

    public function updatedShow($value){
        if(!$value){
            $this->component = null;

        }
    }

}
