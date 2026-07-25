<?php
// app/Http/Controllers/DocumentController.php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class DocumentController extends Controller
{
    /**
     * Halaman utama: tampilkan semua kriteria (tanpa dokumen, lazy)
     */
    public function index(): View
    {
        $criteriaList = Criteria::active()->get();

        return view('documents.index', compact('criteriaList'));
    }

    /**
     * AJAX endpoint: dokumen per kriteria (untuk integrasi non-Livewire)
     * GET /api/criteria/{criteria:slug}/documents
     */
    public function byCriteria(Criteria $criteria): JsonResponse
    {
        $documents = $criteria->documents()
            ->published()
            ->get()
            ->groupBy('ppepp_category')
            ->map(fn ($docs) => $docs->map(fn ($doc) => [
                'id'              => $doc->id,
                'title'           => $doc->title,
                'document_number' => $doc->document_number,
                'preview_url'     => route('documents.preview', $doc),
                'download_url'    => $doc->is_restricted ? null : route('documents.download', $doc),
                'file_size'       => $doc->file_size_human,
            ]));

        return response()->json([
            'criteria'  => [
                'id'         => $criteria->id,
                'full_label' => $criteria->full_label,
                'icon'       => $criteria->icon,
            ],
            'documents' => $documents,
        ]);
    }
}