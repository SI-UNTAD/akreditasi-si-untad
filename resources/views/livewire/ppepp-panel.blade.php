<div>
    {{-- PPEPP Tabs --}}
    <div class="flex flex-wrap gap-2 mb-4" role="tablist">
        @foreach ($categories as $key => $label)
            <button
                wire:click="switchTab('{{ $key }}')"
                role="tab"
                @class([
                    'px-4 py-2 rounded-lg text-sm font-medium transition-colors',
                    'bg-primary text-on-primary' => $activeTab === $key,
                    'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' => $activeTab !== $key,
                ])
            >
                {{ $label }}
            </button>
        @endforeach
    </div>

    {{-- Document Table --}}
    @if ($documents->isEmpty())
        <x-empty-state message="Belum ada dokumen di kategori ini." />
    @else
        <x-document-table :documents="$documents" />
    @endif

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $documents->links() }}
    </div>
</div>