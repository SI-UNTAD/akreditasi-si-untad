<?php

// app/Http/Controllers/DocumentController.php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\View\View;

class DocumentController extends Controller
{
    /**
     * Halaman utama: tampilkan semua kriteria (tanpa dokumen, lazy)
     */
    public function index(): View
    {
        $criteriaList = Criteria::active()->get();

        return view('documents.index');
    }
}
