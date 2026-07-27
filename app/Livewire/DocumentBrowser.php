<?php

namespace App\Livewire;

use App\Models\Criteria;
use Livewire\Component;

class DocumentBrowser extends Component
{
    public string $search = '';

    public function updatedSearch()
    {
        $this->dispatch('search-updated', search: $this->search);
    }

    public function render()
    {
        return view('livewire.document-browser', [
            'criteriaList' => Criteria::active()->get(),
        ]);
    }
}