<?php
// app/Livewire/PpeppPanel.php

namespace App\Livewire;

use App\Models\Criteria;
use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;


class PpeppPanel extends Component
{
    use WithPagination;
    public Criteria $criteria;
    public string $activeTab = 'penetapan';
    public int $perPage = 12;

    protected $queryString = [];


    // public function updateSearch($search)
    // {
    //     $this->search = $search;
    //     $this->resetPage();
    // }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }

    public function render()
    {
        // $query = $this->criteria->documents()
        //     ->published()
        //     ->where('ppepp_category', $this->activeTab);

        // if (strlen($this->search) > 0) {
        //     $query->where(function ($q) {
        //         $q->where('title', 'like', "%{$this->search}%")
        //             ->orWhere('document_number', 'like', "%{$this->search}%");
        //     });
        // }

        // return view('livewire.ppepp-panel', [
        //     'documents' => $query->orderBy('sort_order')->paginate($this->perPage),
        //     'categories' => Document::PPEPP_CATEGORIES,
        // ]);

        $documents = $this->criteria->documents()
            ->published()
            ->where('ppepp_category', $this->activeTab)
            ->orderBy('sort_order')
            ->paginate($this->perPage);

        return view('livewire.ppepp-panel', [
            'documents' => $documents,
            'categories' => Document::PPEPP_CATEGORIES,
        ]);
    }
    public function placeholder()
    {
        return view('livewire.ppepp-panel-placeholder');
    }
}