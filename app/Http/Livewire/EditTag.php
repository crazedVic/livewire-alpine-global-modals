<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditTag extends Component
{

    public $name;
    public $category;

    public $rules = [
        'name' => 'required|string|min:3|max:255',
        'category' => 'required|string'
    ];

    public function render()
    {
        return view('livewire.edit-tag');
    }

    public function save(){
        $this->validate($this->rules);
        dd([$this->name,$this->category]);
    }

    public function cancel(){
        error_log('show');
        $this->emit('show');
    }
}
