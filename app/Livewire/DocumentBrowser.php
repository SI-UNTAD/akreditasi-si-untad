<?php

// app/Livewire/DocumentBrowser.php

namespace App\Livewire;

use App\Models\Criteria;
use App\Models\Document;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentBrowser extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';

    #[Url(history: true, except: 'all')]
    public string $selectedCategory = 'all';

    #[Url(history: true, except: 'all')]
    public string $selectedYear = 'all';

    #[Url(history: true, except: 'all')]
    public string $selectedCriteria = 'all';

    #[Url(history: true, except: 'all')]
    public string $selectedType = 'all';

    #[Url(history: true)]
    public string $sortBy = 'sort_order';

    #[Url(history: true)]
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
        $this->reset(['search', 'selectedCategory', 'selectedYear', 'selectedCriteria', 'selectedType']);
        $this->sortBy = 'sort_order';
        $this->sortDir = 'asc';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedCategory()
    {
        $this->resetPage();
    }

    public function updatingSelectedYear()
    {
        $this->resetPage();
    }

    public function updatingSelectedCriteria()
    {
        $this->resetPage();
    }

    public function updatingSelectedType()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function updatingSortDir()
    {
        $this->resetPage();
    }

    public function toggleSort(string $column)
    {
        if ($this->sortBy === $column) {
            $this->sortDir = $this->sortDir === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDir = 'asc';
        }
    }

    public function render()
    {
        $query = Document::published()
            ->with('criteria')
            ->when(
                $this->search !== '',
                fn ($q) => $q->where(fn ($q) => $q->where('title', 'like', "%{$this->search}%")
                    ->orWhere('document_number', 'like', "%{$this->search}%"))
            )
            ->when(
                $this->selectedCategory !== 'all',
                fn ($q) => $q->where('ppepp_category', $this->selectedCategory)
            )
            ->when(
                $this->selectedYear !== 'all',
                fn ($q) => $q->where('year', $this->selectedYear)
            )
            ->when(
                $this->selectedCriteria !== 'all',
                fn ($q) => $q->where('criteria_id', $this->selectedCriteria)
            )
            ->when(
                $this->selectedType !== 'all',
                fn ($q) => $q->where('document_type', $this->selectedType)
            );

        return view('livewire.document-browser', [
            'documents' => $query->orderBy($this->sortBy, $this->sortDir)->paginate(12),
            'criteriaList' => Criteria::active()->get(),
            'criteriaOptions' => Criteria::active()->pluck('name', 'id'),
            'years' => Document::published()->distinct()->pluck('year')->filter()->sort()->values(),
            'types' => Document::published()->distinct()->pluck('document_type')->filter()->values(),
        ]);
    }
}
