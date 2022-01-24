<?php

namespace App\Http\Livewire;

use App\Models\Consultant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShowConsultants extends Component
{

    public Collection $consultants;
    public string $searchTerm = "";
    public $new_id;

    public $listeners = ["consultants-changed" => "consultantsChanged"];

    public function render()
    {
        $this->consultants = Consultant::whereHas('tags', function (Builder $query) {
           $query->where('name', 'like', $this->searchTerm != "" ? '%'.$this->searchTerm.'%' : '%');
        })->get();
        return view('livewire.show-consultants');
    }

    public function consultantsChanged($new_id = null){
        $this->new_id = $new_id;
        $this->emitSelf('$refresh');
    }
}
