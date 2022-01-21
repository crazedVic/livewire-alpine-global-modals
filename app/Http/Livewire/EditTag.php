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
        error_log("Save");
        $this->validate($this->rules);
        $this->emit('hide');
    }

}
