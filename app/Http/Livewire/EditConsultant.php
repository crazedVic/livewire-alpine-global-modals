<?php

namespace App\Http\Livewire;

use App\Models\Consultant;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EditConsultant extends Component
{
    public $edit_id;
    public Consultant $consultant;
    public string $name = "";
    public string $company = "";
    public string $phone = "";
    public string $email = "";
    public $rate;
    public string $rate_frequency = "";
    public string $rate_currency = "CAD$";
    public $tags;
    public array $selected_tags =[];
    public string $searchTerm = "";
    public string $platform = "None";
    public string $platform_profile = "";
    public string $linkedin = "";
    public string $notes = "";

    public $rules = [
        'name'=> 'required|string|max:256',
        'company'=> 'string|max:256',
        'email'=> 'required|email|max:256',
        'phone'=> 'required|string|min:10',
        'rate' => 'required|numeric|min:1',
        'rate_frequency' => 'required|string',
        'rate_currency' => 'required|string',
        'platform' => 'required|string',
        'platform_profile' => 'string',
        'linkedin' => 'string',
        'notes' => 'string|min:5'
    ];

    public function mount($component=null, $edit_id = null){
        //pass
    }

    public function render()
    {
        error_log($this->edit_id);
        $this->tags = $this->searchTerm == "" ? Tag::where('category','consultant')->get() : Tag::where("name","like",'%'.$this->searchTerm. '%')->where('category','consultant')->get();
        return view('livewire.edit-consultant');
    }

    public function save(){
        //dd([$this->name,$this->company,$this->email, $this->phone,$this->rate, $this->rate_frequency]);
        $this->validate($this->rules);
        $consultant = Consultant::create([
            'name'=> $this->name,
            'company'=> $this->company,
            'email'=> $this->email,
            'phone'=> $this->phone,
            'rate' => $this->rate,
            'rate_frequency' => $this->rate_frequency,
            'rate_currency' => $this->rate_currency,
            'platform' => $this->platform,
            'platform_profile' => $this->platform_profile,
            'linkedin' => $this->linkedin,
            'notes' => $this->notes
        ]);
        $consultant->tags()->attach($this->selected_tags);
        $consultant->save();
        $this->reset();
        $this->emit('hide');
        $this->emit('consultants-changed');
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
