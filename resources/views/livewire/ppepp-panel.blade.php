{{-- resources/views/livewire/ppepp-panel.blade.php --}}

<div
    x-data="{ expanded: false }"
    x-init="
        $el.closest('details')?.addEventListener('toggle', (e) => {
            if (e.target.open && !expanded) {
                expanded = true;
                $wire.loadDocuments();
            }
        })
    ">

    {{-- Loading skeleton --}}
    @if (!$loaded)
        <div class="flex flex-col gap-3 animate-pulse">
            @foreach (range(1, 5) as $_)
                <div class="h-14 bg-surface-container rounded-xl"></div>
            @endforeach
        </div>
    @else
        <div class="flex flex-col gap-3">
            @foreach ($documentsByCategory as $key => $data)
                <x-ppepp-accordion
                    :criteria="$criteria"
                    :category="$key"
                    :label="$data['label']"
                    :documents="$data['documents']"
                />
            @endforeach
        </div>
    @endif
</div>