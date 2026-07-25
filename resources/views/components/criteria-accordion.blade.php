{{-- resources/views/components/criteria-accordion.blade.php --}}

@props([
    'criteria',       // Instance Model Criteria
    'lazy' => true,   // Apakah load dokumen via AJAX/Livewire?
])

<x-glass-card tag="details" class="group" data-criteria-id="{{ $criteria->id }}">

    {{-- Summary / Header --}}
    <summary class="flex items-center justify-between p-6 cursor-pointer list-none
                    hover:bg-white/40 dark:hover:bg-white/5 transition-colors">
        <div class="flex items-center gap-4">
            {{-- Icon --}}
            <div class="p-3 bg-primary/10 rounded-xl text-primary flex-shrink-0">
                <span class="material-symbols-outlined">{{ $criteria->icon }}</span>
            </div>
            {{-- Label --}}
            <h2 class="font-h3 text-h3 text-on-surface">
                {{ $criteria->full_label }}
            </h2>
        </div>
        {{-- Expand icon --}}
        <span class="material-symbols-outlined expand-icon transition-transform
                     duration-300 text-outline flex-shrink-0">
            expand_more
        </span>
    </summary>

    {{-- Body: PPEPP Sub-Accordions --}}
    <div class="p-6 pt-0 flex flex-col gap-4">
        @if ($lazy)
            {{-- Placeholder: digantikan oleh Livewire --}}
            <div wire:ignore>
                <livewire:ppepp-panel :criteria="$criteria" :key="'criteria-'.$criteria->id" />
            </div>
        @else
            {{-- Server-side render langsung --}}
            @foreach (\App\Models\Document::PPEPP_CATEGORIES as $key => $label)
                <x-ppepp-accordion
                    :criteria="$criteria"
                    :category="$key"
                    :label="$label"
                />
            @endforeach
        @endif
    </div>

</x-glass-card>