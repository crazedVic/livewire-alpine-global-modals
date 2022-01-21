<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FullWrap extends Component
{
    public $originURL;
    public $component;

    public function mount($component){
        $this->originURL = request()->query('originURL') ?? null;
    }

    public function render()
    {
        error_log($this->originURL);
        return view('livewire.full-wrap');
    }
}
