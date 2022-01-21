<?php

namespace App\Http\Livewire;

use App\Models\Tag;
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
        Tag::create([
            "name"=> $this->name,
            "category" => $this->category
        ]);
        $this->emit('hide');
        $this->emit('tags-changed');
    }

}
