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

    public $listeners = ["consultants-changed" => '$refresh'];

    public function render()
    {
        $this->consultants = Consultant::whereHas('tags', function (Builder $query) {
           $query->where('name', 'like', $this->searchTerm != "" ? '%'.$this->searchTerm.'%' : '%');
        })->get();
        return view('livewire.show-consultants');
    }
}
