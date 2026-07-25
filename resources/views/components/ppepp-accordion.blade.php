{{-- resources/views/components/ppepp-accordion.blade.php --}}

@props([
    'criteria',   // Model Criteria
    'category',   // string: "penetapan", "pelaksanaan", dll.
    'label',      // string: "Penetapan", "Pelaksanaan", dll.
    'documents' => collect(), // Collection of Document models
])

<details class="border border-outline-variant/30 rounded-xl overflow-hidden"
         data-ppepp="{{ $category }}">
    <summary class="flex items-center justify-between p-4 cursor-pointer list-none
                    bg-surface-container-low hover:bg-surface-container transition-colors">
        <div class="flex items-center gap-3">
            <h3 class="text-[20px] font-semibold text-on-surface">{{ $label }}</h3>
            {{-- Badge jumlah dokumen --}}
            @if ($documents->isNotEmpty())
                <span class="px-2 py-0.5 bg-primary/10 text-primary rounded-full
                             font-label-sm text-label-sm">
                    {{ $documents->count() }}
                </span>
            @endif
        </div>
        <span class="material-symbols-outlined expand-icon text-sm text-outline
                     transition-transform duration-200">
            chevron_right
        </span>
    </summary>

    {{-- Konten: Tabel dokumen atau empty state --}}
    <div class="overflow-hidden">
        @if ($documents->isEmpty())
            <x-empty-state message="Belum ada dokumen di kategori ini." />
        @else
            <x-document-table :documents="$documents" />
        @endif
    </div>
</details>