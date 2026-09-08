{{-- resources/views/components/document-actions.blade.php --}}

@props(['document'])

<div class="flex items-center justify-center gap-2">
    @if (!$document->hasDriveFile())
        <span class="px-2 py-1 text-xs rounded-full bg-outline-variant/20 text-on-surface-variant"
            title="File belum diunggah ke Google Drive">
            Belum diunggah
        </span>
    @else
        {{-- Tombol Preview --}}
        @if ($document->preview_url)
            <a href="{{ route('documents.preview', $document) }}" target="_blank" title="Lihat Dokumen" class="p-1.5 text-accent-green hover:bg-accent-green/10 rounded-lg
                              transition-all duration-150 hover:scale-110">
                <span class="material-symbols-outlined text-[20px]">open_in_new</span>
            </a>
        @endif

        {{-- Tombol Download --}}
        @if ($document->download_url && !$document->is_restricted)
            <a href="{{ route('documents.download', $document) }}" title="Unduh Dokumen" class="p-1.5 text-outline hover:bg-surface-container-high rounded-lg
                              transition-all duration-150 hover:scale-110">
                <span class="material-symbols-outlined text-[20px]">download</span>
            </a>
        @endif
    @endif
</div>