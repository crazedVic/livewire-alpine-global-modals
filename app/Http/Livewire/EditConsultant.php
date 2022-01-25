<?php

namespace App\Http\Livewire;

use App\Models\Consultant;
use App\Models\Tag;
use Livewire\Component;


class EditConsultant extends Component
{
    public $edit_id;
    public $consultant;
    public $tags;
    public array $selected_tags =[];
    public string $searchTerm = "";

    public $rules = [
        'consultant.name'=> 'required|string|max:256',
        'consultant.company'=> 'string|max:256',
        'consultant.email'=> 'required|email|max:256',
        'consultant.phone'=> 'required|string|min:10',
        'consultant.rate' => 'required|numeric|min:1',
        'consultant.rate_frequency' => 'required|string',
        'consultant.rate_currency' => 'required|string',
        'consultant.platform' => 'required|string',
        'consultant.platform_profile' => 'string|nullable|min:15',
        'consultant.linkedin' => 'string|nullable|min:15',
        'consultant.notes' => 'string|min:5|nullable'
    ];

    public function mount($edit_id = null)
    {
        if ($edit_id) {
            $this->consultant = Consultant::findOrFail($edit_id);
            $this->selected_tags = $this->consultant->tags()->withTrashed()->pluck('id')->toArray();
        }
        else{
            $this->consultant = new Consultant();
        }
    }

    public function render()
    {
        $this->tags = $this->searchTerm == "" ?
            Tag::where('category','consultant')->withTrashed()->get() :
            Tag::where("name","like",'%'.$this->searchTerm. '%')
                ->where('category','consultant')->get();
        return view('livewire.edit-consultant');
    }

    public function save(){

        $this->validate($this->rules);
        error_log('valid?');
        $values = [
            'name'=> $this->consultant->name,
            'company'=> $this->consultant->company,
            'email'=> $this->consultant->email,
            'phone'=> $this->consultant->phone,
            'rate' => $this->consultant->rate,
            'rate_frequency' => $this->consultant->rate_frequency,
            'rate_currency' => $this->consultant->rate_currency,
            'platform' => $this->consultant->platform,
            'platform_profile' => $this->consultant->platform_profile,
            'linkedin' => $this->consultant->linkedin,
            'notes' => $this->consultant->notes
        ];

        if($this->consultant->exists){
            $consultant = $this->consultant;
            $this->consultant->update($values);
            $this->consultant->tags()->sync($this->selected_tags);
            $this->consultant->save();
        }
        else{
            $consultant = Consultant::create($values);
            $consultant->tags()->attach($this->selected_tags);
            $consultant->save();
        }

        $this->emitUp('hide', "Saved Successfully!");
        $this->emit('consultants-changed', $consultant->id);
    }

    public function toggleTag($id){
        error_log($id);
        $tag = Tag::withTrashed()->find($id);
        $id_to_remove = array_search($id, $this->selected_tags,true);

        if ($id_to_remove) {
            unset($this->selected_tags[$id_to_remove]);
            if($tag->trashed()){
                // remove relationship in db as well
                $this->consultant->tags()->detach($id);
            }
        }
        else{
            $this->selected_tags[] = $id;
        }
    }

}
