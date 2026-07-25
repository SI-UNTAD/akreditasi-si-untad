{{-- resources/views/components/document-actions.blade.php --}}

@props(['document'])

<div class="flex items-center justify-center gap-2">
    {{-- Tombol Preview --}}
    @if ($document->preview_url)
        <a href="{{ route('documents.preview', $document) }}"
           target="_blank"
           title="Lihat Dokumen"
           class="p-1.5 text-primary hover:bg-primary/10 rounded-lg
                  transition-all duration-150 hover:scale-110">
            <span class="material-symbols-outlined text-[20px]">open_in_new</span>
        </a>
    @endif

    {{-- Tombol Download --}}
    @if ($document->download_url && !$document->is_restricted)
        <a href="{{ route('documents.download', $document) }}"
           title="Unduh Dokumen"
           class="p-1.5 text-outline hover:bg-surface-container-high rounded-lg
                  transition-all duration-150 hover:scale-110">
            <span class="material-symbols-outlined text-[20px]">download</span>
        </a>
    @endif
</div>