<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Opportunity;

class SaveOpportunity extends Component
{
    public Opportunity $opportunity;
    public bool $isSaved = false;

    public function mount(Opportunity $opportunity)
    {
        $this->opportunity = $opportunity;
        $this->isSaved = Auth::user()
            ->savedOpportunities()
            ->where('opportunity_id', $opportunity->id)
            ->exists();
    }

    public function toggleSave()
    {
        $user = Auth::user();

        if ($this->isSaved) {
            $user->savedOpportunities()->detach($this->opportunity->id);
            $this->isSaved = false;
        } else {
            $user->savedOpportunities()->attach($this->opportunity->id);
            $this->isSaved = true;
        }
    }

    public function render()
    {
        return view('livewire.save-opportunity');
    }
}

