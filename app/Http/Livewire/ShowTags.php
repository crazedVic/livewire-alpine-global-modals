<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShowTags extends Component
{
    public Collection $tags;
    public string $searchTerm = "";
    public bool $show = false;

    public $listeners = ["show"];

    public function render()
    {
        $this->tags = Tag::where('name', 'like', $this->searchTerm != "" ? '%'.$this->searchTerm.'%' : '%')->get();
        return view('livewire.show-tags');
    }

    public function show(){
        error_log('event heard');
        $this->show = !$this->show;
    }
}
