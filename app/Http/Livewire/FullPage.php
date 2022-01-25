<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class FullPage extends Component
{
    use WireToast;

    public $originURL;
    public $component;
    public $edit_id = null;

    public $listeners = ['hide'];

    public function mount(){
        $this->originURL = request()->query('originURL') ?? null;
    }

    public function render()
    {
        return view('livewire.full-page');
    }

    public function hide($message = null){

        if ($message) {
            toast()
                ->success($message)
                ->pushOnNextPage();
        }
        //$this->component = null;
        return redirect($this->originURL);

    }

    public function returnToIndex(){
       error_log($this->originURL);
       //$this->component = "";
       return redirect($this->originURL);
    }
}
