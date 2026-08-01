<?php

namespace App\Livewire;

use App\Models\Criteria;
use Livewire\Component;
use App\Models\Document;

class DocumentBrowser extends Component
{

    public string $search = '';
    public string $selectedCategory = 'all';
    public string $selectedYear = 'all';
    public string $selectedCriteria = 'all';
    public string $selectedType = 'all';
    public string $sortBy = 'sort_order';
    public string $sortDir = 'asc';

    public function getIsFilteringProperty(): bool
    {
        return $this->search !== ''
            || $this->selectedCategory !== 'all'
            || $this->selectedYear !== 'all'
            || $this->selectedCriteria !== 'all'
            || $this->selectedType !== 'all';
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->selectedCategory = 'all';
        $this->selectedYear = 'all';
        $this->selectedCriteria = 'all';
        $this->selectedType = 'all';
        $this->sortBy = 'sort_order';
        $this->sortDir = 'asc';
    }

    public function render()
    {
        return view('livewire.document-browser', [
            'criteriaList' => Criteria::active()->get(),
            'years' => Document::where('is_published', true)
                ->distinct()
                ->pluck('year')
                ->filter()
                ->sort()
                ->values(),
            'types' => Document::where('is_published', true)
                ->distinct()
                ->pluck('document_type')
                ->filter()
                ->values(),
            'criteriaOptions' => Criteria::active()->pluck('name', 'id'),
        ]);
    }
}