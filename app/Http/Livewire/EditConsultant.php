<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EditConsultant extends Component
{
    public string $name = "";
    public string $company = "";
    public string $phone = "";
    public string $email = "";
    public $rate;
    public string $rate_frequency = "";
    public string $rate_currency = "CAD$";
    public Collection $tags;
    public array $selected_tags =[];
    public string $searchTerm = "";

    public $rules = [
        'name'=> 'required|string|max:256',
        'company'=> 'string|max:256',
        'email'=> 'required|email|max:256',
        'phone'=> 'required|string|min:10',
        'rate' => 'required|numeric|min:1',
        'rate_frequency' => 'required|string',
        'rate_currency' => 'required|string'
    ];

    public function render()
    {
        $this->tags = $this->searchTerm == "" ? Tag::where('category','consultant')->get() : Tag::where("name","like",'%'.$this->searchTerm. '%')->where('category','consultant')->get();
        return view('livewire.edit-consultant');
    }

    public function save(){
        //dd([$this->name,$this->company,$this->email, $this->phone,$this->rate, $this->rate_frequency]);
        $this->validate($this->rules);
    }

    public function toggleTag(Tag $tag){

        if (in_array($tag->id, $this->selected_tags)) {
            unset($this->selected_tags[$tag->id]);
        }
        else{
            $this->selected_tags[$tag->id] = $tag->id;
        }
    }
}
