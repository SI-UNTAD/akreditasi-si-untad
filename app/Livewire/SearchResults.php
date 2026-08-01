<?php

namespace App\Livewire;

use App\Models\Criteria;
use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class SearchResults extends Component
{
    use WithPagination;

    public string $search = '';
    public string $selectedCategory = 'all';
    public string $selectedYear = 'all';
    public string $selectedCriteria = 'all';
    public string $selectedType = 'all';
    public string $sortBy = 'sort_order';
    public string $sortDir = 'asc';

    protected $listeners = [
        'filterChanged' => '$refresh',
    ];
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
                fn($q) => $q->where(fn($q) =>
                    $q->where('title', 'like', "%{$this->search}%")
                        ->orWhere('document_number', 'like', "%{$this->search}%"))
            )
            ->when(
                $this->selectedCategory !== 'all',
                fn($q) =>
                $q->where('ppepp_category', $this->selectedCategory)
            )
            ->when(
                $this->selectedYear !== 'all',
                fn($q) =>
                $q->where('year', $this->selectedYear)
            )
            ->when(
                $this->selectedCriteria !== 'all',
                fn($q) =>
                $q->where('criteria_id', $this->selectedCriteria)
            )
            ->when(
                $this->selectedType !== 'all',
                fn($q) =>
                $q->where('document_type', $this->selectedType)
            );
        $total = $query->count();
        $documents = $query->orderBy($this->sortBy, $this->sortDir)
            ->paginate(12);

        return view('livewire.search-results', [
            'documents' => $documents,
            'total' => $total,
            'years' => Document::published()->distinct()->pluck('year')->filter()->sort()->values(),
            'types' => Document::published()->distinct()->pluck('document_type')->filter()->values(),
            'criteriaList' => Criteria::active()->pluck('name', 'id'),
        ]);
    }
}