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
    public $new_id;

    public $listeners = ["tags-changed" => "tagsChanged"];

    public function render()
    {
        $this->tags = Tag::where('name', 'like', $this->searchTerm != "" ? '%'.$this->searchTerm.'%' : '%')
            ->orderBy('name')->get();
        return view('livewire.show-tags');
    }

    public function show(){
        error_log('event heard');
        $this->show = !$this->show;
    }

    public function tagsChanged($new_id = null){
        error_log('tags changed - ' .$new_id);
        $this->new_id = $new_id;
        $this->emitSelf('$refresh');
    }

}
