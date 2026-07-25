<?php
// app/Livewire/PpeppPanel.php

namespace App\Livewire;

use App\Models\Criteria;
use App\Models\Document;
use Livewire\Component;

class PpeppPanel extends Component
{
    public Criteria $criteria;
    public bool $loaded = false;

    // Dipanggil saat accordion di-expand (via Alpine.js event)
    public function loadDocuments(): void
    {
        $this->loaded = true;
    }

    public function render()
    {
        $documentsByCategory = [];

        if ($this->loaded) {
            // Query efisien: satu query untuk semua kategori PPEPP
            $documents = $this->criteria
                ->documents()
                ->published()
                ->get()
                ->groupBy('ppepp_category');

            foreach (Document::PPEPP_CATEGORIES as $key => $label) {
                $documentsByCategory[$key] = [
                    'label' => $label,
                    'documents' => $documents->get($key, collect()),
                ];
            }
        }

        return view('livewire.ppepp-panel', [
            'documentsByCategory' => $documentsByCategory,
        ]);
    }
}