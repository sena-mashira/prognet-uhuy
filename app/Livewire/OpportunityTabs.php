<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Opportunity;
use App\Models\OpportunityCategory;

class OpportunityTabs extends Component
{
    public $activeCategory = 'all';

    public function setCategory($category)
    {
        $this->activeCategory = $category;
    }

    public function getOpportunitiesProperty()
    {
        if ($this->activeCategory === 'all') {
            return Opportunity::where('status', 'approved')->latest()->get();
        }

        return Opportunity::whereHas('category', function ($q) {
            $q->where('slug', $this->activeCategory);
            $q->where('status', 'approved');
        })->latest()->get();

    }

    public function render()
    {
        return view('livewire.opportunity-tabs', [
            'categories' => OpportunityCategory::all(),
            'opportunities' => $this->opportunities,
        ]);
    }
}

