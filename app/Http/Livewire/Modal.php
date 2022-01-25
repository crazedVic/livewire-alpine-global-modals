<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Modal extends Component
{

    use WireToast;

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

    public function hide($message = null){
        $this->component = null;
        $this->show = false;
        if ($message) {
            toast()
                ->success($message)
                ->push();
        }
    }

    public function updatedShow($value){
        if(!$value){
            $this->component = null;
        }
    }

}
