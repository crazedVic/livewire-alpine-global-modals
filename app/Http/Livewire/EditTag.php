<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class EditTag extends Component
{
    public $edit_id;
    public $tag;

    public $rules = [
        'tag.name' => 'required|string|min:3|max:255',
        'tag.category' => 'required|string'
    ];

    public function mount($edit_id= null){
        if ($edit_id) {
            $this->tag = Tag::findOrFail($edit_id);
        }
        else{
            $this->tag = new Tag();
        }
    }
    public function render()
    {
        return view('livewire.edit-tag');
    }

    public function save(){
        error_log("Save");
        $this->validate($this->rules);

        $values = [
            "name"=> $this->tag->name,
            "category" => $this->tag->category
        ];

        if($this->tag->exists){
            // if exists we want to softdelete existing
            // and create new!
            $this->tag->delete();
        }

        $tag = Tag::create($values);

        $this->emitUp('hide', 'Saved successfully');
        $this->emit('tags-changed', $tag->id);
    }

}
